<?php

/**
 * Plugin Name: ALLOWEBP
 * Plugin URI:  https://github.com/mbrughi/allowebp/
 * Description: Allow Wordpress to upload .webp media files format.
 * Version:     1.1.0
 * Author:      Marco Brughi
 * Author URI:  https://marcobrughi.com
 * License:     GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

// Enable upload for webp image files.
function mb_webp_upload($addmimetype) {
    $addmimetype['webp'] = 'image/webp';
    return $addmimetype;
}
add_filter('mime_types', 'mb_webp_upload');

// Enable preview / thumbnail for webp image files. 
function display_webp($result, $path) {
    if ($result === false) {
        $webp_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $webp_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
}

