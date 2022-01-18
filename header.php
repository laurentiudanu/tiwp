<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php wp_head(); ?>
    <?php $swhc = get_field('sitewide_header_code', 'option'); if(!empty($swhc)): echo $swhc; endif; ?>
    <!--[if lte IE 8]>
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
    <![endif]-->
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
  </head>
  <body <?php body_class();?>>
    <header class="m-h" role="region" aria-label="Site header">
      <div class="container cf">
        <a href="<?php echo home_url("/");?>" class="ti-logo">
			<img src="/wp-content/themes/tiwp/library/images/TransImpact-Logo-01.svg" alt="TransImpact Logo" style="float: left;margin-right: 48px;" height="60" width="160">
		  </a>  
        <ul class="nav primary cf" role="navigation" aria-label="Main">
          <?php wp_nav_menu( array('menu' => 'General Menu', 'theme_location' => 'general_menu', 'container' => 'false', 'items_wrap' => '%3$s' ) ); ?>
        </ul>
        <ul class="nav secondary cf" role="navigation" aria-label="Secondary">
          <?php wp_nav_menu( array('menu' => 'Secondary Menu', 'theme_location' => 'secondary_menu', 'container' => 'false', 'items_wrap' => '%3$s' ) ); ?>
        </ul>
        <ul class="nav mobile hidden cf" role="navigation" aria-label="Mobile menu" aria-hidden="true">
            <?php wp_nav_menu( array('menu' => 'Mobile Menu', 'theme_location' => 'mobile_menu', 'container' => 'false', 'items_wrap' => '%3$s' ) ); ?>
        </ul>

        <a href="#" class="nav-trigger"><span>Toggle Menu</span></a>
      </div>
    </header>
    <div class="main-doc" aria-hidden="false">
