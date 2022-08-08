<?php
/*
Template Name: Work Page
*/

get_header();
?>

<section class="page-title-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Recent work</h1>
      </div>
    </div>
  </div>
</section>

<section class="about-content-section">
  <div class="interior container clearfix">
    <div class="row">
      <?php 
      $args = array(
        'post_type' => 'projects',
        'posts_per_page' => '-1',
      );
     
      $the_query = new WP_Query ( $args );
      $totalProj = $the_query->found_posts;

      $count = 1;

      if ( $the_query->have_posts() ) :
        while( $the_query->have_posts() ) : $the_query->the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
            $work_categories = get_the_terms($post->ID, 'project');
            $work_cats = array_column($work_categories, 'name');
      ?>
            <div class="col-xs-12 col-sm-6 col-md-4 blogBox moreBox" <?php if( $count>9 )  {echo 'style="display: none;"'; } ?>>
                <div class="itemdata">
                    <div class="slider-img">
                        <img src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>"> 
                    </div>
                    <div class="item">
                        <div class="blogTxt">
                            <h2><?php echo get_the_title(); ?></h2>
                            <p class="post_intro hidden-xs"><?php echo wp_trim_words( get_the_content(), 11, '...' ); ?></p>
                            <b><?php echo implode(' | ', $work_cats); ?></b>
                        </div>
                        <div class="view-more-btns">
                            <a href="<?php echo get_the_permalink(); ?>">View case study <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                            </svg></a>
                        </div>
                    </div>
                </div>
            </div>
      <?php
        $count++;
        endwhile;
      ?>

      <?php
        if( $totalProj > 9 )
        {
      ?>
          <div id="loadMore" style="">
            <a href="#"><img src="<?php echo get_theme_file_uri();?>/assets/recentwork/icn-arrow.png">Load more work?</a>
          </div>
      <?php
        }
      endif;
      ?>
    </div>
  </div>
</section>

<?php
get_footer();