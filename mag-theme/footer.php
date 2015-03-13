</main>
<!-- End main -->
<footer class="footer">
<div class="wrap">
    <div class="main-footer">
        <div class="foot-col">
            <div class="foot-logo">
                <h2 class="foot-title">64mag</h2>
            </div>
        </div>
    <?php wp_nav_menu(array(
                    'theme_location'  => 'footer_menu',
                    'container'       => 'div',
                    'container_class' => 'foot-col',
                    'menu_class'      => 'foot-nav',  
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                )); ?>
  
</div>
<div class="foot-botline">
    <div class="copyright">
        <span>&copy; 64mag 2014</span><span class="currentYear"></span>
    </div>
    <div class="foot-misc">
        <ul class="foot-socials">
            <li><a target="_blank" class="foot-nav-link foot-soc-item vk" href="http://vk.com/diaphragm64">VK</a></li>
            <li><a target="_blank" class="foot-nav-link foot-soc-item tw" href="https://twitter.com/64_mag">Twitter</a></li>
            <li><a target="_blank" class="foot-nav-link foot-soc-item fb" href="https://www.facebook.com/pages/F64/1443859355897584">Facebook</a></li>                    
            <li><a target="_blank" class="foot-nav-link foot-soc-item tum" href="http://64mag.tumblr.com/">Tumblr</a></li>
            <li><a target="_blank" class="foot-nav-link foot-soc-item inst" href="http://instagram.com/64mag">Instagram</a></li>
            <li><a target="_blank" class="foot-nav-link foot-soc-item sc" href="https://soundcloud.com/64mag">SoundCloud</a></li>
        </ul>
        <?php if(!is_user_logged_in()) : ?><a href="<?php bloginfo('url');?>/wp-login.php" class="foot-nav-link">Log In</a><?php endif; ?>
        <a href="#" class="foot-nav-link" data-target='subscribe'>Subscribe to newsletter</a>
    </div>            
    <button id="go-up"></button>
</div>
</div>
<!-- end wrap -->
</footer>
<!-- end footer -->
<div class="subscribe-menu">
    <div class="wrap">
        <button class="close-btn"></button>
        <? get_sidebar('content') ?>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/main.min.js"></script>
<!-- Twitter SDK -->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>
<!-- End Twitter -->
<?php wp_footer(); ?>
<?php if(!is_home() && !is_category()) : ?>
<!-- Facebook SDK -->
<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<!-- End Facebook SDK -->
<!-- Pinterest SDK -->
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
<!-- End Pinterest -->
<?php endif; ?>
<!-- Google analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-59186120-2', 'auto');
ga('send', 'pageview');

</script>
<!-- End Google analytics -->

</body>
</html>