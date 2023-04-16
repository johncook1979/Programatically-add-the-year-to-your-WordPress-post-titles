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
