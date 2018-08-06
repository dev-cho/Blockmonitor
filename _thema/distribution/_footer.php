<section class="latest-posts"> </section> 
<!-- Newsletter Section-->
<section class="newsletter no-padding-top">    
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2><?php echo $title; ?> Newsletter</h2>
        <p class="text-big">Please Enter your Email</p>        
      </div>
      <div class="col-md-8">
        <div class="form-holder">
          <form action="#">
            <div class="form-group">
              <input type="email" name="email" id="userMail" placeholder="Email address">
              <button type="button" onclick="newsletterSend();" class="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    
    <!-- Page Footer-->
<footer class="main-footer "  >
    <div class="container" >
        <div class="row">
            <div class="col-md-4">
                <div class="logo"><h6 class="text-white"><?php echo $title; ?></h6></div>
                <div class="contact-details">
                    <p><?php echo $address; ?></p>
                    <p>Phone: <?php echo $tel; ?></p>
                    <p>Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="menus d-flex">
                    <ul class="list-unstyled">
                        <li> <a href="#">My Account</a></li>
                        <li> <a href="#">Add Listing</a></li>
                       
                    </ul>
                    <ul class="list-unstyled">
                        <li> <a href="#">Our Partners</a></li>
                        <li> <a href="#">FAQ</a></li>
                        
                    </ul>
                </div>
            </div>
            
            
        </div>
    </div>
    
    <div class="copyrights fixed-bottom">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 ">
                    <div class="latest-posts">
                        <a href="#">
                            <div class="post d-flex align-items-center">
                                <div class="image">
                                    <img src="<?php echo $url . "/img/custom/avatar-0.png"; ?>" alt="..." class="img-fluid">
                                </div>
                                <div class="title">
                                    <strong><?php echo $title; ?></strong>
                                    <strong><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></strong>
                                    <strong><?php echo $address; ?>  <?php echo $tel; ?></strong>
                                </div>
                            </div>
                        </a>
                        
                        
                    </div>
                </div>

                <div class="col-md-6 ">
                    <ul class="social-menu">
                    <?php 
                        foreach($sns as $k=>$v) {
                    ?>
                        <li class="list-inline-item"><a href="<?php echo $v; ?>"><i class="fa fa-<?php echo $k; ?>"></i></a></li>
                    <?php 
                        }
                    ?>
                    </ul>
                
                </div>
                
                <div class="col-md-12 text-right">
                    <br>
                    <?php echo $copyright; ?> <?php echo $company; ?> By <a href="#" class="text-white"><?php echo $ceo; ?></a>
                </div>
            </div>
        </div>
    </div>
    </footer>

<!-- JavaScript files-->

<script src="<?php echo $url; ?>/vendor/popper.js/umd/popper.min.js"> </script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="<?php echo $url; ?>/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
<script src="<?php echo $url; ?>/js/front.js"></script>

</body>
</html>

<script>
function newsletterSend() {
    var mailId = $('#userMail').val(); //Mail ID
    //window.open('mailto:' + mailId);
    location.href='mailto:' + mailId;
}


$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

            if (target.length) {
                $('html, body').animate({ scrollTop: target.offset().top }, 700);
                return false;
            }

        }
    });
});
</script>