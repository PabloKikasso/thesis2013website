<?php
/*
Plugin Name: Thesis Project Post Type
Plugin URI: http://wp.tutsplus.com/
Description: Declares a plugin that will create a custom post type displaying Thesis Projects.
Version: 1.0

License: GPLv2
*/

/*Register custom function*/
add_action( 'init', 'create_thesis_project' );

function create_thesis_project() {
    register_post_type( 'thesis_projects',
        array(
            'labels' => array(
                'name' => 'Thesis Projects',
                'singular_name' => 'Thesis Project',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Thesis Project',
                'edit' => 'Edit',
                'edit_item' => 'Edit Thesis Project',
                'new_item' => 'New Thesis Project',
                'view' => 'View',
                'view_item' => 'View Thesis Project',
                'search_items' => 'Search Thesis Projects',
                'not_found' => 'No Thesis Projects found',
                'not_found_in_trash' => 'No Thesis Projects found in Trash',
                'parent' => 'Parent Thesis Project'
            ),
 
            'public' => true,
            'description'   => 'Holds our projects and project specific data',
            'menu_position' => 5,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'taxonomies' => array( /* 'category',  */'post_tag' ),
            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => true
        )
    );
}

add_action( 'init', 'project_filter', 0 );
// function: project_filter BEGIN  
function project_filter()  
{  
    register_taxonomy(  
        __( "filter" ),  
        array(__( "thesis_projects" )),  
        array(  
            "hierarchical" => true,  
            "label" => __( "Filter" ),  
            "singular_label" => __( "Filter" ),  
            "rewrite" => array(  
                'slug' => 'filter',  
                'hierarchical' => true  
            )  
        )  
    );  
} // function: project_filter END  


/*Register Student Meta Boxes*/
add_action( 'admin_init', 'my_admin' );

function my_admin() {
    add_meta_box( 
    	'student_meta_box',
        'Student Details',
        'display_student_meta_box',
        'thesis_projects', 
        'normal', 
        'high'
    );
    

}


function display_student_meta_box( $student_details ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $student_name = esc_html( get_post_meta( $student_details->ID, 'student_name', true ) );
    
    $student_thesis_fall = esc_html( get_post_meta( $student_details->ID, 'student_thesis_fall', true ) );
    $student_thesis_spring = esc_html( get_post_meta( $student_details->ID, 'student_thesis_spring', true ) );
    
    $student_writing_fall = esc_html( get_post_meta( $student_details->ID, 'student_writing_fall', true ) );
    $student_writing_spring = esc_html( get_post_meta( $student_details->ID, 'student_writing_spring', true ) );
    
    $student_bio = esc_html( get_post_meta( $student_details->ID, 'student_bio', true ) );
    
    $student_url = esc_html( get_post_meta( $student_details->ID, 'student_url', true ) );
    $student_thesisurl = esc_html( get_post_meta( $student_details->ID, 'student_thesisurl', true ) );
    $student_linked = esc_html( get_post_meta( $student_details->ID, 'student_linked', true ) );
    $student_twitter = esc_html( get_post_meta( $student_details->ID, 'student_twitter', true ) );
    
    ?>
    <table>
        <tr>
            <td style="width: 100%">Student Name</td>
            <td><input type="text" size="80" name="thesis_project_student_name" value="<?php echo $student_name; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Thesis Faculty</td>
            <td><input style="width: 200px;" type="text" size="80" placeholder="Fall" name="thesis_project_thesis_fall" value="<?php echo $student_thesis_fall; ?>" /><input type="text" placeholder="Spring" style="width: 200px;"  size="80" name="thesis_project_thesis_spring" value="<?php echo $student_thesis_spring; ?>" /></td>
        </tr>
        <tr>
        <tr>
            <td style="width: 150px">Writing Faculty</td>
            <td><input style="width: 200px;" type="text" size="80" placeholder="Fall" name="thesis_project_writing_fall" value="<?php echo $student_writing_fall; ?>" /><input type="text" placeholder="Spring" style="width: 200px;"  size="80" name="thesis_project_writing_spring" value="<?php echo $student_writing_spring; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Student Bio</td>
            <td><textarea name="thesis_project_student_bio" rows="5" cols="81"><?php echo $student_bio ?></textarea></td>
        </tr>
        <tr>
            <td style="width: 150px">Student Web</td>
            <td><input style="width: 200px;" type="text" size="80" placeholder="Personal Website" name="thesis_project_student_url" value="<?php echo $student_url; ?>" /><input type="text" placeholder="Thesis Website" style="width: 200px;"  size="80" name="thesis_project_student_thesisurl" value="<?php echo $student_thesisurl; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 150px">Student Social</td>
            <td><input style="width: 200px;" type="text" size="80" placeholder="LinkedIn" name="thesis_project_student_linked" value="<?php echo $student_linked; ?>" /><input type="text" placeholder="Twitter" style="width: 200px;"  size="80" name="thesis_project_student_twitter" value="<?php echo $student_twitter; ?>" /></td>
        </tr>
    </table>
    <?php
}





/*Register Save Post*/
add_action( 'save_post', 'add_student_details_fields', 10, 2 );

function add_student_details_fields( $student_details_id, $student_details ) {
    // Check post type for  reviews
    if ( $student_details->post_type == 'thesis_projects' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['thesis_project_student_name'] ) && $_POST['thesis_project_student_name'] != '' ) {
            update_post_meta( $student_details_id, 'student_name', $_POST['thesis_project_student_name'] );
        }
        
        if ( isset( $_POST['thesis_project_thesis_fall'] ) && $_POST['thesis_project_thesis_fall'] != '' ) {
            update_post_meta( $student_details_id, 'student_thesis_fall',$_POST['thesis_project_thesis_fall'] );
        }
        if ( isset( $_POST['thesis_project_thesis_spring'] ) && $_POST['thesis_project_thesis_spring'] != '' ) {
            update_post_meta( $student_details_id, 'student_thesis_spring',$_POST['thesis_project_thesis_spring'] );
        }
        
        
        
        if ( isset( $_POST['thesis_project_writing_fall'] ) && $_POST['thesis_project_writing_fall'] != '' ) {
            update_post_meta( $student_details_id, 'student_writing_fall',$_POST['thesis_project_writing_fall'] );
        }
        if ( isset( $_POST['thesis_project_writing_spring'] ) && $_POST['thesis_project_writing_spring'] != '' ) {
            update_post_meta( $student_details_id, 'student_writing_spring',$_POST['thesis_project_writing_spring'] );
        }
        
        if ( isset( $_POST['thesis_project_student_url'] ) && $_POST['thesis_project_student_url'] != '' ) {
            update_post_meta( $student_details_id, 'student_url',$_POST['thesis_project_student_url'] );
        }
        if ( isset( $_POST['thesis_project_student_thesisurl'] ) && $_POST['thesis_project_student_thesisurl'] != '' ) {
            update_post_meta( $student_details_id, 'student_thesisurl',$_POST['thesis_project_student_thesisurl'] );
        }
        if ( isset( $_POST['thesis_project_student_linked'] ) && $_POST['thesis_project_student_linked'] != '' ) {
            update_post_meta( $student_details_id, 'student_linked',$_POST['thesis_project_student_linked'] );
        }
        if ( isset( $_POST['thesis_project_student_twitter'] ) && $_POST['thesis_project_student_twitter'] != '' ) {
            update_post_meta( $student_details_id, 'student_twitter',$_POST['thesis_project_student_twitter'] );
        }
        
        
        
        if ( isset( $_POST['thesis_project_student_bio'] ) && $_POST['thesis_project_student_bio'] != '' ) {
            update_post_meta( $student_details_id, 'student_bio', $_POST['thesis_project_student_bio'] );
        }
    }
}


?>