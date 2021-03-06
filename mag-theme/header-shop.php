<?php
    $id = get_cat_id( single_cat_title("",false) );
    $cat = get_category($id);
    $category = $cat->slug;
    if ($cat->parent == 0) {$category .= '-parent';}
?>
<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <?php add_filter( 'wp_title', 'title_for_shop' );
    function title_for_shop( $title )
    {
      if ( is_shop() ) {
        return __( 'Shop | F/64 Art & Fashion Magazine' );
      }
      return $title;
    } ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url')?>/assets/images/favicon.png">
    <script type="text/javascript" src="http://vkontakte.ru/js/api/share.js?9" charset="windows-1251"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php echo "data-category='shop-"; woocommerce_page_title(); echo "'";?>>
    <header class='site-header'>
        <div class="wrap">
            <a href="/" class="top-logo">
                <div  class="logo">
                    64mag
                </div>
            </a>
            <div class="header-menu">
                <div class="top-section">
                    <div class="top-menu">
                        <div class="top-menu-item top-search">
                            <form role="search" method="get" class="search-form" action="/">
                                <input type="search" class="search-field" placeholder="Search" value="" name="s" title="Найти:">
                                <input type="submit" class="search-submit" value="Search">
                            </form>
                        </div>
                        <?php if ( is_user_logged_in() ) { ?>
                            <div class="top-menu-item account"><a href="/my-account" class="my-account" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a></div>
                         <?php } ?>
                        <div class="top-menu-item cart-link"><a href="/cart">Cart</a></div>
                    </div>
                </div>
                 <?php wp_nav_menu(array(
                    'theme_location'  => 'top_menu',
                    'container'       => 'div',
                    'container_class' => 'main-section',
                    'menu_class'      => 'main-nav',  
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                )); ?>
            </div>
        </div>
        <!-- end wrap -->
    </header>
    <header class="site-header fixed-header">
        <div class="wrap">
            <a href="/" class="top-logo">
                <div  class="logo">
                    64mag
                </div>
            </a>
            <div class="header-menu">
                <?php wp_nav_menu(array(
                    'theme_location'  => 'top_menu',
                    'container'       => 'div',
                    'container_class' => 'main-section',
                    'menu_class'      => 'main-nav',  
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                )); ?>
            </div>
        </div>
    </header>
    <main role="main">