</main>
<footer class="mainfooter" id="mainfooters">
  <div class="containers">
    <div class="footer-before row ">
      <div class="col-md-6 pt-5 pb-5">
        <h4>Let’s find the<br> best way together</h4>
        <div class="adddressfooter">
          <p><img src="<?php echo get_theme_file_uri();?>/img/icn-location.png"> Find us</p>
          <p><b>1010, Camex House,<br> Stadium Commerce Road, Navrangpura,<br> Ahmedabad, Gujarat 380009.</b></p>
        </div>
        <ul class="socialmedia">
          <li><a href="#" class="socialmedialink"><img src="<?php echo get_theme_file_uri();?>/img/fb.png" class="socialshow"> <img src="<?php echo get_theme_file_uri();?>/img/fbhover.png" class="socialhidden"></a></li>
          <li><a href="#" class="socialmedialink"><img src="<?php echo get_theme_file_uri();?>/img/Ins.png" class="socialshow"> <img src="<?php echo home_url();?>/wp-content/uploads/2022/04/Ins.png" class="socialhidden"></a></li>
          <li><a href="#" class="socialmedialink"><img src="<?php echo get_theme_file_uri();?>/img/Be.png" class="socialshow"> <img src="<?php echo home_url();?>/wp-content/uploads/2022/04/Be.png" class="socialhidden"></a></li>
          <li><a href="#" class="socialmedialink"><img src="<?php echo get_theme_file_uri();?>/img/pi.png" class="socialshow"> <img src="<?php echo home_url();?>/wp-content/uploads/2022/04/pi.png" class="socialhidden"></a></li>
          <li><a href="#" class="socialmedialink"><img src="<?php echo get_theme_file_uri();?>/img/in.png" class="socialshow"> <img src="<?php echo home_url();?>/wp-content/uploads/2022/04/in.png" class="socialhidden"></a></li>
        </ul>
      </div>
      <div class="col-md-6 row">
        <div class="col-md-6 mainfooters footers1">
          <div class="footer-mail">
            <img src="<?php echo get_theme_file_uri();?>/assets/footer/icn-email.png">
            <div class="detailsmail"><p>Send us<br> on email</p> <a href="#"><img src="<?php echo get_theme_file_uri();?>/assets/footer/Button-Arrow.png" class="hidearrow"></a></div>
          </div>
          <div class="footer-mail secondfooters">
            <img src="<?php echo get_theme_file_uri();?>/assets/footer/icn-call.png">
            <div class="detailsmail"><p>Speak on<br> the call</p><a href="#"> <img src="<?php echo get_theme_file_uri();?>/assets/footer/Button-Arrow.png" class="hidearrow"></a></div>
          </div>
        </div>
        
        <div class="col-md-6 mainfooters footers4">
          <div class="footer-mail">
            <img src="<?php echo get_theme_file_uri();?>/assets/footer/icn-chat.png">
            <div class="detailsmail"><p>Chat with<br> our robot!</p> <a href="#"><img src="<?php echo get_theme_file_uri();?>/assets/footer/Button-Arrow.png" class="hidearrow"></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <ul>
            <li><a>Privacy policy</a></li>
            <li><a>Cookies policy</a></li>
            <li><a>Terms & conditions</a></li>
          </ul>
        </div>
        <div class="col-lg-6">
          <p>© 2022 AR Digital Branding Agency. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
  
    <script src="<?php echo get_theme_file_uri();?>/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script>
    function openHeaderMenu() {
      var screenWidth = "100%";

      if( screen.width<767 ) {
        screenWidth = "100%"
      }

      document.getElementById("header-menu-main").style.width = "960px";
      // document.getElementById("header-menu-main").style.height = "100%";
      // document.getElementById("header-menu-main").style.right = "0";
      // document.getElementById("header-menu-main").style.left = "auto";
      if( screen.width<767 ) {
        document.getElementById("header-menu-main").style.width = "100%";
      }

    }

    function closeHeaderMenu() {
      document.getElementById("header-menu-main").style.width = "0";
      // document.getElementById("header-menu-main").style.height = "100%";
      // document.getElementById("header-menu-main").style.right = "0";
      // document.getElementById("header-menu-main").style.left = "auto";
    }
		
$('.project_category_main .wpcf7-list-item input').change(function(){
    if($(this).is(":checked")) {
        $('.project_category_main .wpcf7-list-item .wpcf7-list-item-label').addClass("checkedbox");
    } else {
        $('.project_category_main .wpcf7-list-item .wpcf7-list-item-label').removeClass("checkedbox");
    }
});
    </script>

    <?php
    if( is_page('work') )
    {
    ?>
      <script>
      jQuery( document ).ready(function ($) {
        $(".moreBox").slice(0, 9).show();
          if ($(".blogBox:hidden").length != 0) {
            $("#loadMore").show();
          }   
          $("#loadMore").on('click', function (e) {
            e.preventDefault();
            $(".moreBox:hidden").slice(0, 6).slideDown();
            if ($(".moreBox:hidden").length == 0) {
              $("#loadMore").fadeOut('slow');
            }
          });
        });
      </script>
    <?php
    }
    ?>
  </body>
</html>