<?php


class guest
{
    function convention_magic_map_primary_meta_caps( $caps = array(), $cap = '', $user_id = 0, $args = array() ) {

        // What capability is being checked?
        switch ( $cap ) {
            case 'attendee'     :
            case 'volunteer'    :
            case 'speaker'      :
            case 'organizer'    :


                    $caps = array( $cap );

                break;
        }

        return apply_filters( 'convention_magic_map_primary_meta_caps', $caps, $cap, $user_id, $args );
    }

    /**
     * Return a user's main role
     *
     * @since bbPress (r3860)
     *
     * @param int $user_id
     * @uses bbp_get_user_id() To get the user id
     * @uses get_userdata() To get the user data
     * @uses apply_filters() Calls 'bbp_set_user_role' with the role and user id
     * @return string
     */
    function convention_magic_set_user_role( $user_id = 0, $new_role = '' ) {

        // Validate user id
        $user_id = convention_magic_get_user_id( $user_id, false, false );
        $user    = get_userdata( $user_id );

        // User exists
        if ( !empty( $user ) ) {

            // Get users forum role
            $role = convention_magic_get_user_role( $user_id );

            // User already has this role so no new role is set
            if ( $new_role === $role ) {
                $new_role = false;

                // Users role is different than the new role
            } else {

                // Remove the old role
                if ( ! empty( $role ) ) {
                    $user->remove_role( $role );
                }

                // Add the new role
                if ( !empty( $new_role ) ) {

                    // Make sure guest roles are added
                    convention_magic_add_guest_roles();

                    $user->add_role( $new_role );
                }
            }

            // User does don exist so return false
        } else {
            $new_role = false;
        }

        return apply_filters( 'convention_magic_set_user_role', $new_role, $user_id, $user );
    }

    /**
     * Return a user's forums role
     *
     * @since bbPress (r3860)
     *
     * @param int $user_id
     * @uses bbp_get_user_id() To get the user id
     * @uses get_userdata() To get the user data
     * @uses apply_filters() Calls 'bbp_get_user_role' with the role and user id
     * @return string
     */
    function convention_magic_get_user_role( $user_id = 0 ) {

        // Validate user id
        $user_id = convention_magic_get_user_id( $user_id );
        $user    = get_userdata( $user_id );
        $role    = false;

        // User has roles so look for a bbPress one
        if ( ! empty( $user->roles ) ) {

            // Look for a bbPress role
            $roles = array_intersect(
                array_values( $user->roles ),
                array_keys( convention_magic_get_dynamic_roles() )
            );

            // If there's a role in the array, use the first one. This isn't very
            // smart, but since roles aren't exactly hierarchical, and bbPress
            // does not yet have a UI for multiple user roles, it's fine for now.
            if ( !empty( $roles ) ) {
                $role = array_shift( $roles );
            }
        }

        return apply_filters( 'convention_magic_get_user_role', $role, $user_id, $user );
    }

    /**
     * Return a user's blog role
     *
     * @since bbPress (r4446)
     *
     * @param int $user_id
     * @uses bbp_get_user_id() To get the user id
     * @uses get_userdata() To get the user data
     * @uses apply_filters() Calls 'bbp_get_user_blog_role' with the role and user id
     * @return string
     */
    function convention_get_user_blog_role( $user_id = 0 ) {

        // Add bbPress roles (returns $wp_roles global)
        convention_magic_add_guest_roles();

        // Validate user id
        $user_id = convention_magic_get_user_id( $user_id );
        $user    = get_userdata( $user_id );
        $role    = false;

        // User has roles so lets
        if ( ! empty( $user->roles ) ) {

            // Look for a non bbPress role
            $roles     = array_intersect(
                array_values( $user->roles ),
                array_keys( convention_magic_get_blog_roles() )
            );

            // If there's a role in the array, use the first one. This isn't very
            // smart, but since roles aren't exactly hierarchical, and WordPress
            // does not yet have a UI for multiple user roles, it's fine for now.
            if ( !empty( $roles ) ) {
                $role = array_shift( $roles );
            }
        }

        return apply_filters( 'convention_magic_get_user_blog_role', $role, $user_id, $user );
    }

    /**
     * Helper function hooked to 'bbp_profile_update' action to save or
     * update user roles and capabilities.
     *
     * @since bbPress (r4235)
     *
     * @param int $user_id
     * @uses bbp_reset_user_caps() to reset caps
     * @usse bbp_save_user_caps() to save caps
     */
    function convention_magic_profile_update_role( $user_id = 0 ) {

        // Bail if no user ID was passed
        if ( empty( $user_id ) )
            return;

        // Bail if no role
        if ( ! isset( $_POST['convention-magic-guest-role'] ) )
            return;

        // Guest role we want the user to have
        $new_role    = sanitize_text_field( $_POST['convention-magic-guest-role'] );
        $forums_role = convention_magic_get_user_role( $user_id );

        // Bail if no role change
        if ( $new_role === $forums_role )
            return;

        // Bail if trying to set their own role
        if ( convention_magic_is_user_home_edit() )
            return;

        // Bail if current user cannot promote the passing user
        if ( ! current_user_can( 'promote_user', $user_id ) )
            return;

        // Set the new forums role
        convention_magic_set_user_role( $user_id, $new_role );
    }

    /**
     * Add the default role to the current user if needed
     *
     * This function will bail if the convention is not global in a multisite
     * installation of WordPress, or if the user is deleted.
     *
     * @return If not multisite, not global, or user is deleted
     */
    function convention_magic_set_current_user_default_role() {

        /** Sanity ****************************************************************/

        // Bail if deactivating Convention Magic
        if ( convention_magic_is_deactivation() )
            return;

        // Catch all, to prevent premature user initialization
        if ( ! did_action( 'set_current_user' ) )
            return;

        // Bail if not logged in or already a member of this site
        if ( ! is_user_logged_in() )
            return;

        // Get the current user ID
        $user_id = convention_magic_get_current_user_id();

        // Bail if user already has a role
        if ( convention_magic_get_user_role( $user_id ) )
            return;


        /** Ready *****************************************************************/

        // Load up convention magic once
        $cm         = convention_magic();

        // Get whether or not to add a role to the user account
        $add_to_site = convention_magic_allow_global_access();

        // Get the current user's WordPress role. Set to empty string if none found.
        $user_role   = convention_magic_get_user_blog_role( $user_id );

        // Get the role map
        $role_map    = convention_magic_get_user_role_map();

        /** Convention Role ************************************************************/

        // Use a mapped role
        if ( isset( $role_map[$user_role] ) ) {
            $new_role = $role_map[$user_role];

            // Use the default role
        } else {
            $new_role = convention_magic_get_default_role();
        }

        /** Add or Map ************************************************************/

        // Add the user to the site
        if ( true === $add_to_site ) {

            // Make sure bbPress roles are added
            convention_magic_add_guest_roles();

            $cm->current_user->add_role( $new_role );

            // Don't add the user, but still give them the correct caps dynamically
        } else {
            $cm->current_user->caps[$new_role] = true;
            $cm->current_user->get_role_caps();
        }
    }

    /**
     * Map Convention Magic roles to roles in WordPress and make sure that admins have organizer abilities */
    function convention_magic_get_user_role_map() {

        // Get the default role once here
        $default_role = convention_magic_get_default_role();

        // Return filtered results, forcing admins to organizers.
        return (array) apply_filters( 'convention_magic_get_user_role_map', array (
            'administrator' => convention_magic_get_organizer_role(),
            'editor'        => $default_role,
            'author'        => $default_role,
            'contributor'   => $default_role,
            'subscriber'    => $default_role
        ) );
    }

    /** User Status ***************************************************************/

    /**
     * Checks if the user has been marked as deleted.
     *
     * @param int $user_id int The ID for the user.
     * @return bool True if deleted, False if not.
     */
    function convention_magic_is_user_deleted( $user_id = 0 ) {

        // Default to current user
        if ( empty( $user_id ) && is_user_logged_in() )
            $user_id = convention_magic_get_current_user_id();

        // No user to check
        if ( empty( $user_id ) )
            return false;

        // Assume user is not deleted
        $is_deleted = false;

        // Get user data
        $user = get_userdata( $user_id );

        // No user found
        if ( empty( $user ) ) {
            $is_deleted = true;

            // Check if deleted
        } elseif ( !empty( $user->deleted ) ) {
            $is_deleted = true;
        }

        return (bool) apply_filters( 'convention_magic_is_user_deleted', $is_deleted );
    }

    /**
     * Checks if user is an organizer
     *
     * @param int $user_id
     * @return bool True if organizer, false if not
     */
    function convention_magic_is_user_organizer( $user_id = 0 ) {

        // Default to current user ID if none is passed
        $_user_id = (int) ! empty( $user_id ) ? $user_id : convention_magic_get_current_user_id();

        // Filter and return
        return (bool) apply_filters( 'convention_magic_is_user_organizer', user_can( $_user_id, 'keep_gate' ), $_user_id, $user_id );
    }

    /**
     * Does a user have a profile for the current site
     *
     * @return boolean Whether or not the user has a profile on this blog_id
     */
    function convention_magic_user_has_profile( $user_id = 0 ) {

        // Assume every user has a profile
        $retval  = true;

        // Validate user ID, default to displayed or current user
        $user_id = convetion_magic_get_user_id( $user_id, true, true );

        // Try to get this user's data
        $user    = get_userdata( $user_id );

        // No user found, return false
        if ( empty( $user ) ) {
            $retval = false;

            // User is inactive, and current user is not a keymaster
        } elseif ( ! convetion_magic_is_user_organizer()) {
            $retval = false;
        }

        // Filter and return
        return (bool) apply_filters( 'convention_magic_show_user_profile', $retval, $user_id );
    }
}