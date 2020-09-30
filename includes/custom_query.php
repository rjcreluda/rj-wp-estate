<?php
/**
 * Create Custom Query Vars
 * https://codex.wordpress.org/Function_Reference/get_query_var#Custom_Query_Vars
 */
function jind_register_query_vars( $vars ) {
    $vars[] = 'theme';
    $vars[] = 'type';
    $vars[] = 'address';
    return $vars;
}
add_filter( 'query_vars', 'jind_register_query_vars' );

function sm_pre_get_posts( $query ) {
    // check if the user is requesting an admin page
    // or current query is not the main query
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }

    // edit the query only when post type is 'accommodation'
    // if it isn't, return
    if ( !is_post_type_archive( 'property' ) ){
        return;
    }

    $meta_query = array();

    // add meta_query elements
    if( !empty( get_query_var( 'city' ) ) ){
        $meta_query[] = array( 'key' => 'type', 'value' => get_query_var( 'type' ), 'compare' => 'LIKE' );
    }

    if( !empty( get_query_var( 'address' ) ) ){
        $meta_query[] = array( 'key' => 'address', 'value' => get_query_var( 'address' ), 'compare' => 'LIKE' );
    }

    if( count( $meta_query ) > 1 ){
        $meta_query['relation'] = 'AND';
    }

    if( count( $meta_query ) > 0 ){
        $query->set( 'meta_query', $meta_query );
    }
}
add_action( 'pre_get_posts', 'sm_pre_get_posts', 1 );

?>