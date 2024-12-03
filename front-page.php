<?php 
get_header(); 
?>
<div id="primary" class="homepage-content">

  <?php
    $content_1 = get_field("content_1");
    $content_1_img = $content_1["content_1_featured_image"];
    $content_1_title = $content_1["content_1_title"];
    $content_1_description = $content_1["content_1_description"];
    $content_1_button = $content_1["content_1_button"];
    $content_1_button_link = $content_1["content_1_button_link"];

    if( $content_1_title ){
  ?>
    <div class="content-1 padding-tb-200">
      <div class="wrapper flexwrap">
        <div class="content">
          <h2 class="title"><?php echo $content_1_title; ?></h2>
          <div class="description"><?php echo $content_1_description; ?></div>
          <?php if($content_1_button && $content_1_button_link){ ?>
            <a href="<?php echo $content_1_button_link; ?>" class="button btn-green"><?php echo $content_1_button; ?></a>
          <?php } ?>
        </div>
        <?php if( !empty( $content_1_img ) ): ?>
          <div class="feat-img-wrap">
            <div class="feat-img">
              <img src="<?php echo esc_url($content_1_img['url']); ?>" alt="<?php echo esc_attr($content_1_img['alt']); ?>" />
            </div>
          </div>
        <?php endif; ?>
      
      </div>
    </div><!-- content-1 -->
  <?php } ?>
  
  <?php
    $browse_brand = get_field("browse_our_brands");
    $browse_brand_title = $browse_brand["browse_brands_title"];
    $brands = $browse_brand["brands"];
    $brands_button_title = $browse_brand["browse_brands_button"];
    $brands_button_link = $browse_brand["browse_brands_button_link"];

    if( $browse_brand_title ){
  ?>
    <div class="brands padding-tb-150">
      <div class="wrapper wrapper-xl">
        <h2 class="brands-title"><?php echo $browse_brand_title; ?></h2>
        <?php if( $brands ) { ?>
          <div class="brands-wrapper flexwrap">
            <?php foreach( $brands as $brand ) {
                $image = $brand["brand_image"];
                $title = $brand["brand_title"];
                $url = $brand["brand_category"];
            ?>
              <a class="brand-item" href="/vendors/#<?=$url->slug ?? '' ?>">
                <div class="brand-feat-img">
                  <?php if( !empty( $image ) ){ ?>
                    <img src="<?php echo esc_url($image["url"]); ?>" alt="<?php echo esc_attr($image["alt"]); ?>" />
                  <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/image-not-available.jpg" alt="no image" />
                  <?php } ?>
                </div>
                <h3 class="brand-title"><?php echo $title; ?></h3>
              </a>
            <?php } ?>
          </div>
        <?php } ?>
        <?php if($brands_button_title && $brands_button_link){ ?>
          <a href="<?php echo $brands_button_link; ?>" class="button btn-green"><?php echo $brands_button_title; ?></a>
        <?php } ?>
      </div>
    </div><!-- brands -->
  <?php } ?>

  <?php
    $cta = get_field("call_to_action");
    $cta_title = $cta["cta_title"];
    $cta_description = $cta["cta_description"];
    $cta_button = $cta["cta_button_title"];
    $cta_button_link = $cta["cta_button_title_link"];

    if( $cta_title ){
  ?>
    <div class="cta">
      <div class="cta-wrapper">
        <h2 class="cta-title"><?php echo $cta_title; ?></h2>
        <div class="cta-description"><?php echo $cta_description; ?></div>
        <?php if($cta_button){ ?>
          <a href="<?php echo $cta_button_link; ?>" class="button btn-white"><?php echo $cta_button; ?></a>
        <?php } ?>
      </div>
    </div><!-- cta -->
  <?php } ?>

  <?php
    $content_2 = get_field("content_2");
    $content_2_img = $content_2["content_2_featured_image"];
    $content_2_title = $content_2["content_2_title"];
    $content_2_description = $content_2["content_2_description"];
    $content_2_button = $content_2["content_2_button"];
    $content_2_button_link = $content_2["content_2_button_link"];

    if( $content_2_title ){
  ?>
    <div class="content-2 padding-tb-70">
      <div class="wrapper flexwrap">
        <div class="content">
          <h2 class="title"><?php echo $content_2_title; ?></h2>
          <div class="description"><?php echo $content_2_description; ?></div>
          <?php if($content_2_button && $content_2_button_link){ ?>
            <a href="<?php echo $content_2_button_link; ?>" class="button btn-green"><?php echo $content_2_button; ?></a>
          <?php } ?>
        </div>
        <?php if( !empty( $content_2_img ) ): ?>
          <div class="feat-img">
            <img src="<?php echo esc_url($content_2_img['url']); ?>" alt="<?php echo esc_attr($content_2_img['alt']); ?>" />
          </div>
        <?php endif; ?>
      
      </div>
    </div><!-- content-2 -->
  <?php } ?>

</div><!-- #primary -->

<?php
get_footer();