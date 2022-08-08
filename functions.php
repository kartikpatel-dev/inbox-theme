<?php

function bootstrapstarter_wp_setup() {

    add_theme_support( 'title-tag' );

}

function wds_frontend_form_register() {
    $cmb = new_cmb2_box( array(
        'id'           => 'front-end-post-form',
        'object_types' => array( 'post' ),
        'hookup'       => false,
        'save_fields'  => false,
    ) );

    $cmb->add_field( array(
        'name'    => __( 'New Post Title', 'wds-post-submit' ),
        'id'      => 'submitted_post_title',
        'type'    => 'text',
        'default' => __( 'New Post', 'wds-post-submit' ),
    ) );

    $cmb->add_field( array(
        'name'    => __( 'New Post Content', 'wds-post-submit' ),
        'id'      => 'submitted_post_content',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 12,
            'media_buttons' => false,
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Featured Image for New Post', 'wds-post-submit' ),
        'id'         => 'submitted_post_thumbnail',
        'type'       => 'text',
        'attributes' => array(
            'type' => 'file', // Let's use a standard file upload field
        ),
    ) );

    $cmb->add_field( array(
        'name' => __( 'Your Name', 'wds-post-submit' ),
        'desc' => __( 'Please enter your name for author credit on the new post.', 'wds-post-submit' ),
        'id'   => 'submitted_author_name',
        'type' => 'text',
    ) );

    $cmb->add_field( array(
        'name' => __( 'Your Email', 'wds-post-submit' ),
        'desc' => __( 'Please enter your email so we can contact you if we use your post.', 'wds-post-submit' ),
        'id'   => 'submitted_author_email',
        'type' => 'text_email',
    ) );

}
add_action( 'cmb2_init', 'wds_frontend_form_register' );

function wds_handle_frontend_new_post_form_submission( $cmb, $post_data = array() ) {

    // If no form submission, bail
    if ( empty( $_POST ) ) {
        return false;
    }

    // check required $_POST variables and security nonce
    if (
        ! isset( $_POST['submit-cmb'], $_POST['object_id'], $_POST[ $cmb->nonce() ] )
        || ! wp_verify_nonce( $_POST[ $cmb->nonce() ], $cmb->nonce() )
    ) {
        return new WP_Error( 'security_fail', __( 'Security check failed.' ) );
    }

    if ( empty( $_POST['submitted_post_title'] ) ) {
        return new WP_Error( 'post_data_missing', __( 'New post requires a title.' ) );
    }

    // Do WordPress insert_post stuff

    return $new_submission_id;
}

// Prevent WP from adding <p> tags on all post types

function disable_wp_auto_p( $content ) {

    remove_filter( 'the_content', 'wpautop' );

    remove_filter( 'the_excerpt', 'wpautop' );

    return $content;

  }

  add_filter( 'the_content', 'disable_wp_auto_p', 0 );

add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );

function my_custom_theme_setup() {

    add_theme_support( 'menus' );

    add_theme_support( 'post-thumbnails' );

    // other options

}

add_action( 'after_setup_theme', 'my_custom_theme_setup' );

function themename_custom_logo_setup() {

    $defaults = array(

        'height'               => 100,

        'width'                => 400,

        'flex-height'          => true,

        'flex-width'           => true,

        'header-text'          => array( 'site-title', 'site-description' ),

        'unlink-homepage-logo' => true, 

    );

 

    add_theme_support( 'custom-logo', $defaults );

}

 

add_action( 'after_setup_theme', 'themename_custom_logo_setup' );



function wpb_custom_new_menu() {

    register_nav_menu('ar-menu',__( 'Ar Menu' ));

}

add_action( 'init', 'wpb_custom_new_menu' );



function project() {

  

    // Set UI labels for Custom Post Project

        $labels = array(

            'name'                => _x( 'Projects', 'Post Project General Name', 'inboxtech' ),

            'singular_name'       => _x( 'Project', 'Post Project Singular Name', 'inboxtech' ),

            'menu_name'           => __( 'Projects', 'inboxtech' ),

            'parent_item_colon'   => __( 'Parent Project', 'inboxtech' ),

            'all_items'           => __( 'All Projects', 'inboxtech' ),

            'view_item'           => __( 'View Project', 'inboxtech' ),

            'add_new_item'        => __( 'Add New Project', 'inboxtech' ),

            'add_new'             => __( 'Add New', 'inboxtech' ),

            'edit_item'           => __( 'Edit Project', 'inboxtech' ),

            'update_item'         => __( 'Update Project', 'inboxtech' ),

            'search_items'        => __( 'Search Project', 'inboxtech' ),

            'not_found'           => __( 'Not Found', 'inboxtech' ),

            'not_found_in_trash'  => __( 'Not found in Trash', 'inboxtech' ),

        );

          

    // Set other options for Custom Post Project

          

        $args = array(

            'label'               => __( 'Projects', 'inboxtech' ),

            'description'         => __( 'Project news and reviews', 'inboxtech' ),

            'labels'              => $labels,

            // Features this CPT supports in Post Editor

            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),

            // You can associate this CPT with a taxonomy or custom taxonomy. 

            'taxonomies'          => array( 'genres' ),

            /* A hierarchical CPT is like Pages and can have

            * Parent and child items. A non-hierarchical CPT

            * is like Posts.

            */

            'hierarchical'        => false,

            'public'              => true,

            'show_ui'             => true,

            'show_in_menu'        => true,

            'show_in_nav_menus'   => true,

            'show_in_admin_bar'   => true,

            'menu_position'       => 5,

            'can_export'          => true,

            'has_archive'         => true,

            'exclude_from_search' => false,

            'publicly_queryable'  => true,

            'capability_Project'     => 'post',

            'show_in_rest' => true,

      

        );

          

        // Registering your Custom Post Project

    register_post_type( 'projects', $args );

   



}

      

/* Hook into the 'init' action so that the function

    * Containing our post Project registration is not 

    * unnecessarily executed. 

*/

      

add_action( 'init', 'project', 0 );





// Let us create project Taxonomy for Custom Post Project

add_action( 'init', 'project_taxonomy', 0 );

 

//create a custom project taxonomy name it "Project" for your posts

function project_taxonomy() {

 

  $labels = array(

    'name' => _x( 'Projects', 'taxonomy general name' ),

    'singular_name' => _x( 'Project', 'taxonomy singular name' ),

    'search_items' =>  __( 'Search Projects' ),

    'all_items' => __( 'All Projects' ),

    'parent_item' => __( 'Parent Project' ),

    'parent_item_colon' => __( 'Parent Project:' ),

    'edit_item' => __( 'Edit Project' ), 

    'update_item' => __( 'Update Project' ),

    'add_new_item' => __( 'Add New Category' ),

    'new_item_name' => __( 'New category Name' ),

    'menu_name' => __( 'Categories' ),

  ); 	

 

  register_taxonomy('project',array('projects'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'project-categories' ),

  ));

}



function aboutsliderblog(){

    ob_start();

    

        $blogArgs = array(

          'post_type' => 'post',

          'posts_per_page' => '-1', 

          'orderby'=> 'date', 

          'order' => 'DESC'

        );

        $the_query = new WP_Query($blogArgs); 

        

        $totalBlog = $the_query->found_posts;

        $i = 1;

      ?>

      <div class="row">

        <div class="col-md-12">

          <?php

          if ( $the_query->have_posts() ) :

          ?>

            <div id="carouselInsideControls" class="carousel slide inside-ar-desktop" data-bs-ride="carousel">

              <div class="carousel-inner inside-ar-slider" id="inside-ar-slider">

                <div class="carousel-item active">

                  <div class="row">

                    <?php

                    while( $the_query->have_posts() ) : $the_query->the_post();  

                      $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

                      $hover_image = get_field('hover_image');

                    ?>

                      <div class="col-md-4">

                        <div class="blog-img">

                            <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>" class="blog-img-show"> 

                          <?php if($hover_image){ ?>

                            <img src="<?php echo $hover_image;?>" alt="<?php the_title();?>" class="blog-img-hide">

                          <?php }else{ ?>

                            <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>" class="blog-img-hide"> 

                          <?php } ?>

                        </div>

                        <div class="blog-date">

                          <img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png" alt="<?php the_title();?>" >

                          <span><?php echo date('d M, Y', strtotime(get_the_date())); ?></span>

                        </div>

                        <h4><?php echo get_the_title(); ?></h4>

                        <a href="<?php echo get_the_permalink(); ?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>

                        </svg></a>

                      </div>

                    <?php

                    if($i % 3 === 0)

                    {

                      if($i < $totalBlog)

                      {

                        echo '</div> </div>';

                      }

                      else

                      {

                        echo '</div>';

                      }

                      

                      if($i < $totalBlog)

                      {

                        echo '<div class="carousel-item"> <div class="row">';

                      }

                    }

                    $i++;

                    endwhile;

                    ?>

                  </div>

                </div>

              </div>



              <div class="carousel-indicators">

                <span class="inside-start-number">01</span>

                <?php

                for( $i=0; $i<ceil($totalBlog/3); $i++ )

                {

                ?>

                  <button type="button" data-bs-target="#carouselInsideControls" data-bs-slide-to="<?php echo $i; ?>" class="<?php if( $i == 0 ) { echo ' active'; } ?>" aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>

                <?php 

                }

                ?>

                <span class="inside-end-number">0<?php echo ceil($totalBlog/3); ?></span>

              </div>

            </div>

            <div id="carouselInsideControlsMobile" class="carousel slide inside-ar-mobile" data-bs-ride="carousel">
              <div class="carousel-inner inside-ar-slider" id="inside-ar-slider">
                    <?php
                    $m = 0;
                    while( $the_query->have_posts() ) : $the_query->the_post();  
                      $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                      $hover_image = get_field('hover_image');
                    ?>
                      <div class="carousel-item <?php if( $m==0 ) { echo 'active'; } ?>">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="blog-img">
                              <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>" class="blog-img-show"> 
                              <?php if($hover_image){ ?>
                                <img src="<?php echo $hover_image;?>" alt="<?php the_title();?>" class="blog-img-hide">
                              <?php }else{ ?>
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>" class="blog-img-hide"> 
                              <?php } ?>
                            </div>
                            <div class="blog-date">
                              <img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png" alt="Calender Icon">
                              <span><?php echo date('d M, Y', strtotime(get_the_date())); ?></span>
                            </div>
                            <h4><?php echo get_the_title(); ?></h4>
                            <a href="<?php echo get_the_permalink(); ?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg></a>
                          </div>
                        </div>
                      </div>
                    <?php
                    $m++;
                    endwhile;
                    ?>
              </div>

              <div class="carousel-indicators">
                <span class="inside-start-number">01</span>
                <?php
                for( $i=0; $i<$totalBlog; $i++ )
                {
                ?>
                  <button type="button" data-bs-target="#carouselInsideControlsMobile" data-bs-slide-to="<?php echo $i; ?>" class="<?php if( $i == 0 ) { echo ' active'; } ?>" aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
                <?php 
                }
                ?>
                <span class="inside-end-number"><?php echo $totalBlog<=9 ? '0'.$totalBlog : $totalBlog; ?></span>
              </div>
            </div>

          <?php endif; ?>



        </div>

      </div>

    <?php

    return ob_get_clean();

}

add_shortcode('About_Blog_Slider','aboutsliderblog');