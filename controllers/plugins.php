<?php
require_once(PLUGIN_DIR . 'assets/inc/class-tgm-plugin-activation.php');

class plugins
{
    /**
     * Register the required plugins for this plugin
     *
     * In this example, we register five plugins:
     * - one included with the TGMPA library
     * - two from an external source, one from an arbitrary source, one from a GitHub repository
     * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
     *
     * The variables passed to the `tgmpa()` function should be:
     * - an array of plugin arrays;
     * - optionally a configuration array.
     * If you are not changing anything in the configuration array, you can remove the array and remove the
     * variable from the function call: `tgmpa( $plugins );`.
     * In that case, the TGMPA default settings will be used.
     *
     * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
     */
    function convention_magic_register_required_plugins() {

        $plugins = array(
            array(
                'name'      => 'WP Rest API (WP API)',
                'slug'      => 'json-rest-api',
                'required'  => true
            ),
            array(
                'name' => 'Basic Auth',
                'slug' => 'basic-auth',
                'source' => 'https://github.com/WP-API/Basic-Auth/archive/master.zip',
                'required' => false
            )
        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           => 'convention-magic',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'plugins.php',            // Parent menu slug.
            'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.

            /*
            'strings'      => array(
                'page_title'                      => __( 'Install Required Plugins', 'convention-magic' ),
                'menu_title'                      => __( 'Install Plugins', 'convention-magic' ),
                /* translators: %s: plugin name. * /
                'installing'                      => __( 'Installing Plugin: %s', 'convention-magic' ),
                /* translators: %s: plugin name. * /
                'updating'                        => __( 'Updating Plugin: %s', 'convention-magic' ),
                'oops'                            => __( 'Something went wrong with the plugin API.', 'convention-magic' ),
                'notice_can_install_required'     => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'convention-magic'
                ),
                'notice_can_install_recommended'  => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'convention-magic'
                ),
                'notice_ask_to_update'            => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'convention-magic'
                ),
                'notice_ask_to_update_maybe'      => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'convention-magic'
                ),
                'notice_can_activate_required'    => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'convention-magic'
                ),
                'notice_can_activate_recommended' => _n_noop(
                    /* translators: 1: plugin name(s). * /
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'convention-magic'
                ),
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'convention-magic'
                ),
                'update_link' 					  => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'convention-magic'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'convention-magic'
                ),
                'return'                          => __( 'Return to Required Plugins Installer', 'convention-magic' ),
                'plugin_activated'                => __( 'Plugin activated successfully.', 'convention-magic' ),
                'activated_successfully'          => __( 'The following plugin was activated successfully:', 'convention-magic' ),
                /* translators: 1: plugin name. * /
                'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'convention-magic' ),
                /* translators: 1: plugin name. * /
                'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'convention-magic' ),
                /* translators: 1: dashboard link. * /
                'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'convention-magic' ),
                'dismiss'                         => __( 'Dismiss this notice', 'convention-magic' ),
                'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'convention-magic' ),
                'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'convention-magic' ),

                'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
            ),
            */
        );

        tgmpa( $plugins, $config );
    }

}