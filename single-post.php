<?php

/**

 * The template for displaying all single posts and attachments

 *

 * @package WordPress

 * @subpackage Twenty_Fifteen

 * @since Twenty Fifteen 1.0

 */

  

get_header(); ?>

  

    <section class="blog-title-section">

        <div class="container">

          <div class="row">

            <div class="col-md-7">

              <div class="blog-date">

                <img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png" alt="Calender Icon">

                <span>27 Dec, 2022</span>

              </div>

              <h1><?php the_title();?></h1>

            </div>



            <div class="col-md-5 blog-social">

              <ul>

                <li><a href=""><img src="<?php echo get_theme_file_uri();?>/assets/single-blog/facebook_icon.png"> <span>Share</span></a></li>

                <li><a href=""><img src="<?php echo get_theme_file_uri();?>/assets/single-blog/twitter_icon.png"> <span>Tweet</span></a></li>

                <li><a href=""><img src="<?php echo get_theme_file_uri();?>/assets/single-blog/copy_icon.png"> <span>Copy link</span></a></li>

              </ul>

            </div>

          </div>

        </div>

      </section>



      <section class="blog-banner-section">

        <div class="container">

          <div class="row">

            <div class="col-md-12">

                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );?>" alt="<?php the_title();?>" class="blog-banner">

                <img src="<?php echo get_field('hover_image');?>" alt="<?php the_title();?>" class="blog-banner-hide">

            </div>

          </div>

        </div>

      </section>

    <div class="blog-content-section">

        <div class="container">

            <div class="row">

                <div class="col-md-9 mx-auto">

                    <?php the_content(); ?> 

                </div>  

            </div>

        </div>

    </div>

       

       <section class="blog-content-section socialmediablog">

        <div class="container">

          <div class="row">

            <div class="col-md-9 mx-auto">

                <div class="blog-bottom-social blog-social">

                    <ul>

                      <li><a href=""><img src="<?php echo get_theme_file_uri();?>/assets/single-blog/facebook_icon.png"> <span>Share</span></a></li>

                      <li><a href=""><img src="<?php echo get_theme_file_uri();?>/assets/single-blog/twitter_icon.png"> <span>Tweet</span></a></li>

                      <li><a href=""><img src="<?php echo get_theme_file_uri();?>/assets/single-blog/copy_icon.png"> <span>Copy link</span></a></li>

                    </ul>

                </div>

            </div>

        </div>

        </div>

        </section>

    <section class="related-blog">

        <div class="container">

          <div class="blog-list">

            <div class="row">

              <div class="col-md-8"><h3 class="mainrelaetdgtitle">Related blog we write</h3></div>

              <div class="col-md-4 viewallblogs"><a><span class="show-buttons">View all blog</span> <span class="hide-elore">Explore now!</span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">

                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>

              </svg></a></div>

            </div>

            <div class="row">

              <div id="1" class="col-md-4 mb-4">

                <img class="img-fluid" src="<?php echo get_theme_file_uri();?>/assets/blog/takeadeep.png" alt="Card image cap">

                <div class="card-block bloglist-det">

                    <p class="date-blog"><img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png"> <span>27 Dec, 2022</span></p>

                    <h4 class="card-title">Take a deep dive and try our list of over 40 unique generators</h4>

                    <a>Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>

                    </svg></a>

                </div>

              </div>

              <div id="2" class="col-md-4 mb-4">

                <img class="img-fluid" src="<?php echo get_theme_file_uri();?>/assets/blog/takeadeep.png" alt="Card image cap">

                <div class="card-block bloglist-det">

                  <p class="date-blog"><img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png"> <span>27 Dec, 2022</span></p>

                  <h4 class="card-title">Take a deep dive and try our list of over 40 unique generators</h4>

                  <a>Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>

                  </svg></a>

                </div>

              </div>

              <div id="3" class="col-md-4 mb-4">

                <img class="img-fluid" src="<?php echo get_theme_file_uri();?>/assets/blog/takeadeep.png" alt="Card image cap">

                <div class="card-block bloglist-det">

                  <p class="date-blog"><img src="<?php echo get_theme_file_uri();?>/assets/blog/calender-icon.png"> <span>27 Dec, 2022</span></p>

                  <h4 class="card-title">Take a deep dive and try our list of over 40 unique generators</h4>

                  <a>Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>

                  </svg></a>

                </div>

              </div>

            </div>

          </div>

        </div>

      </section>

<?php get_footer(); ?>