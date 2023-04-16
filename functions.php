/**
  * Add a shortcode to display the current year
  *
*/

add_shortcode( 'year', 'my_current_year' );
function my_current_year(){
    // Return the current year. We are using the WordPress get_the_time() function here but you can also use the PHP data() function with the same 'Y' parameter
    return get_the_time( 'Y' );
}

// Add filters to display the date in the title using the function below the filters
add_filter( 'single_post_title', 'my_shortcode_title' );
add_filter( 'the_title', 'my_shortcode_title' ); 

// add_filter( 'wpseo_title', 'my_shortcode_title' ); // Use this if you are using Yoast SEO. Simply remove the // at the start of this line and add // to the add_filter directly above

// The function to display the shortcode in the title
function my_shortcode_title( $title ){

    // Here we simply run the WP do_shortcode() function with the $title atribute
    return do_shortcode( $title );
}


/**
 * Update the slug to remove the year shortcode from the slug
 *
 * Hook into the transition post status function 
 *
*/
add_action( 'transition_post_status', 'my_slug_update', 10, 3 );
function my_slug_update( $new_status, $old_status, $post ){
    // Check the value of the new and old status
    if ( 'publish' !== $new_status or 'publish' === $old_status )
        return;

    // Define the slug based on the post title stripping special characters
    $new_slug = sanitize_title( $post->post_title );

    // Set the year (shortcode name) as the needle to find
    $needle   = 'year';

    // Check if the new slug contains the year
    if (strpos($new_slug, $needle) !== false) {

        // Here we replace the year shortcode with an empty value. You can modify as needed but read the readme for the reasoning behing an empty value
        $new_slug = str_replace($needle, '', $new_slug);
    }

    // If the current slug does not match the new slug update the post on publish with the new slug
    if ( $post->post_name != $new_slug ){
        wp_update_post(
            array (
                'ID'        => $post->ID,
                'post_name' => $new_slug
            )
        );
    }
}
