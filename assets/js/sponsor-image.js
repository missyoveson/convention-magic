jQuery(document).ready(function($){

    // Instantiates the variable that holds the media library frame.
    var sponsor_image_frame;

    // Runs when the image button is clicked.
    $('#sponsor-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sponsor_image_frame ) {
            sponsor_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sponsor_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: speaker_image.title,
            button: { text:  speaker_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sponsor_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sponsor_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sponsor-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sponsor_image_frame.open();
    });
});
