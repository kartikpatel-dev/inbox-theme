<?php
/*
Template Name: Blog Page
*/

get_header();

echo do_shortcode(['cmb-frontend-form']);
?>

<section class="page-title-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Blog we write too</h1>
      </div>
    </div>
  </div>
</section>

<section class="blog-content-section">
  <div class="container">
    <?php 
      $topArgs = array(
        'post_type' => 'post',
        'posts_per_page' => '1', 
        'orderby'=> 'date', 
        'order' => 'DESC'
      );

      $the_query_top = new WP_Query($topArgs);

      $topBlogID = array_column($the_query_top->posts, 'ID');

      if( $the_query_top->have_posts() ) :

        while( $the_query_top->have_posts() ) : $the_query_top->the_post();  
          $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
          $hover_image = get_field('hover_image');
    ?>
        <style>
            .topblog{
                <?php if($featured_img_url!='' ) { ?>
                background-image: url(<?php echo $featured_img_url; ?>);
                <?php } ?>
            }
            .topblog:hover{
                <?php if($hover_image!='' ) { ?>
                background-image: url(<?php echo $hover_image; ?>);
                <?php }else{ ?>
                background-image: url(<?php echo $featured_img_url; ?>);
                <?php } ?>
            }
        </style>

          <div class="topblog" >
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6 blogdetails">
                <p class="date-blog"><img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png"> <span><?php echo date('d M, Y', strtotime(get_the_date())); ?></span></p>
                <h2><?php echo get_the_title(); ?></h2>
                <p><?php echo wp_trim_words( get_the_content(), 25, '...' );?></p>
                <a href="<?php echo get_the_permalink(); ?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                </svg></a>
                <p class="border-bottoms"></p>
              </div>
            </div>
          </div>
    <?php
        endwhile;
      endif;
    ?>

    <?php
      // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $current_page = get_query_var('paged');
      $current_page = max( 1, $current_page );

      $per_page = 9;
      $offset_start = 0;
      $offset = ( $current_page - 1 ) * $per_page + $offset_start;

      $blogArgs = array(
        'post_type' => 'post',
        'posts_per_page' => $per_page, 
        'orderby'=> 'date', 
        'order' => 'DESC',
        'post__not_in' => $topBlogID,
        'paged' => $current_page,
        'offset' => $offset,
      );

      $the_query = new WP_Query($blogArgs);

      $total_rows = max( 0, $the_query->found_posts - $offset_start );
      $total_pages = ceil( $total_rows / $per_page );

      if( $the_query->have_posts() ) :
        $count=1;
    ?>
      <div class="blog-list">
        <div class="row">
          <?php
          while( $the_query->have_posts() ) : $the_query->the_post();  
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
            $hover_image = get_field('hover_image');
          ?>
            <div id="<?php echo $count; ?>" class="col-md-4 mb-4 blogsimages ">
              <?php
              if( !empty($featured_img_url) )
              {
              ?>
                <img class="img-fluid blog-img-fluid blog-img-show" src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>">
              <?php
              }
              ?>
              
                          <?php if($hover_image){ ?>
                            <img src="<?php echo $hover_image;?>" alt="<?php the_title();?>" class="blog-img-hide">
                          <?php }else{ ?>
                            <img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_title(); ?>" class="blog-img-hide"> 
                          <?php } ?>
              <div class="card-block bloglist-det">
                  <p class="date-blog"><img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png"> <span><?php echo date('d M, Y', strtotime(get_the_date())); ?></span></p>
                  <h4 class="card-title"><?php echo wp_trim_words( get_the_title(), 9, '...' );//echo get_the_title(); ?></h4>
                  <a href="<?php echo get_the_permalink(); ?>">Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                  </svg></a>
              </div>
            </div>
          <?php
          $count++;
          endwhile;
          ?>

          <div id="pagination"></div>
        </div>
      </div>
    <?php
      endif;
      wp_reset_query();
    ?>
  </div>
</section>

<script>
  let pages = '<?php echo $total_pages; ?>';
  let page = '<?php echo $current_page; ?>'

  document.getElementById('pagination').innerHTML = createPagination(pages, page);

  function createPagination(pages, page) {
    let str = '<ul>';
    let active;
    let pageCutLow = page - 1;
    let pageCutHigh = page + 1;
    // Show the Previous button only if you are on a page other than the first
    if (page > 1) {
      str += '<li class="page-item previous no leftarrow"><a href="<?php echo home_url().'/blog/page/'; ?>'+(page-1)+'" onclick="createPagination(pages, '+(page-1)+')"><img src="<?php echo get_theme_file_uri();?>/assets/blog/icn-arrow.png"></a></li>';
    }
    // Show all the pagination elements if there are less than 6 pages total
    if (pages < 6) {
      for (let p = 1; p <= pages; p++) {
        active = page == p ? "active" : "no";
        str += '<li class="'+active+'"><a href="<?php echo home_url().'/blog/page/'; ?>'+p+'" onclick="createPagination(pages, '+p+')">'+ p +'</a></li>';
      }
    }
    // Use "..." to collapse pages outside of a certain range
    else {
      // Show the very first page followed by a "..." at the beginning of the
      // pagination section (after the Previous button)
      if (page > 2) {
        str += '<li class="no page-item"><a href="<?php echo home_url().'/blog/'; ?>" onclick="createPagination(pages, 1)">1</a></li>';
        if (page > 3) {
            str += '<li class="out-of-range"><a href="<?php echo home_url().'/blog/page/'; ?>'+(page-1)+'" onclick="createPagination(pages,'+(page-1)+')">...</a></li>';
        }
      }
      // Determine how many pages to show after the current page index
      if (page === 1) {
        pageCutHigh += 2;
      } else if (page === 2) {
        pageCutHigh += 1;
      }
      // Determine how many pages to show before the current page index
      if (page === pages) {
        pageCutLow -= 2;
      } else if (page === pages-1) {
        pageCutLow -= 1;
      }
      // Output the indexes for pages that fall inside the range of pageCutLow
      // and pageCutHigh
      for (let p = pageCutLow; p <= pageCutHigh; p++) {
        if (p === 0) {
          p += 1;
        }
        if (p > pages) {
          continue
        }
        active = page == p ? "active" : "no";
        str += '<li class="page-item '+active+'"><a href="<?php echo home_url().'/blog/page/'; ?>'+(p)+'" onclick="createPagination(pages, '+p+')">'+ p +'</a></li>';
      }
      // Show the very last page preceded by a "..." at the end of the pagination
      // section (before the Next button)
      if (page < pages-1) {
        if (page < pages-2) {
          str += '<li class="out-of-range"><a href="<?php echo home_url().'/blog/page/'; ?>'+(parseInt(page)+1)+'" onclick="createPagination(pages,'+(parseInt(page)+1)+')">...</a></li>';
        }
        str += '<li class="page-item no"><a href="<?php echo home_url().'/blog/page/'; ?>'+(pages)+'" onclick="createPagination(pages, pages)">'+pages+'</a></li>';
      }
    }
    // Show the Next button only if you are on a page other than the last
    if (page < pages) {
      str += '<li class="page-item next no rihgtarrows"><a href="<?php echo home_url().'/blog/page/'; ?>'+(parseInt(page) + 1)+'" onclick="createPagination(pages, '+(parseInt(page) + 1)+')"><img src="<?php echo get_theme_file_uri();?>/assets/blog/icn-arrow-r.png"></a></li>';
    }
    str += '</ul>';
    // Return the pagination string to be outputted in the pug templates
    document.getElementById('pagination').innerHTML = str;
    return str;
  }
</script>
<?php
get_footer();