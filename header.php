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
    <style>
        .page-id-551 .cta-block p:first-of-type {
    display: none;
}

.business-performance-page {
    display: none;
}

.page-id-551 p.business-performance-page {
    display: block;
}

.sitewide-header-announcement {
    background: #57595D;
    color: #fff;
    padding: 0.25rem 0;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 10000;
    font-size: 0.875rem;
    transition: ease 250ms;
}

.sitewide-header-announcement #closeBtn {
    position: absolute;
    right: 1em;
    border-radius: 0px;
    color: #999;
    background: transparent;
    border: 1px solid #999;
    -webkit-appearance: none;
    z-index: 100;
    transition: ease 250ms;
    padding: 0.35rem 0.75rem
}

.dismiss-announcement {
    transform: translate(0px, -75px);
}

.swha-text,
.swha-cta {
    padding: 0 0.25rem;
}

.swha-cta a {
    color: #fff;
    text-decoration: underline;
    transition: ease 250ms;
}

.swha-cta a:hover,
.sitewide-header-announcement #closeBtn:hover {
    color: #ff9800;
    border-color: #ff9800;
}

.admin-bar .sitewide-header-announcement {
    top: 32px;
}

.admin-bar header.announcement-visible {
    top: 64px;
}

header.announcement-visible {
    top: 36px;
}

.main-doc.announcement-visible {
    padding-top: 150px;
}

.admin-bar .main-doc.announcement-visible {
    padding-top: 116px;
}
    </style>
  </head>
  <body <?php body_class();?>>
    <?php $swha = get_field('sitewide_header_announcement', 'option'); 
                $link = get_field('sitewide_header_announcement_cta', 'option');?>
    <?php if(!empty($swha)): ?> 
    <div class="sitewide-header-announcement">
        <button id="closeBtn">Dismiss</button>
        <div class="container cf">
            <div class="grid-row center">
                <div class="swha-text gf-entry">
                    <?php echo $swha; ?> 
                </div>
                <?php if( $link ): ?>
                    <div class="swha-cta gf-entry">
                        <?php $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <script defer="defer">
            jQuery(document).ready(function($){
                $(document).ready(function(){				
                    $("#closeBtn").click(function() {
                        $(this).css("display", "none");
                        $("#closeBtn").parent(".sitewide-header-announcement").addClass("dismiss-announcement");
                        $("header").removeClass("announcement-visible");
                        $(".main-doc").removeClass("announcement-visible");
                    });	
                });
            });
        </script>
		</div><!-- sitewide header-announcement -->
<?php endif; ?>
    <header class="m-h <?php if(!empty($swha)): echo 'announcement-visible'; endif; ?>" role="region" aria-label="Site header">

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
    <div class="main-doc <?php if(!empty($swha)): echo 'announcement-visible'; endif; ?>" aria-hidden="false">
