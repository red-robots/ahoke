<?php if( is_front_page() || is_home() ) { ?>
  <?php if( $banners = get_field("banner") ) { ?>
    <div class="banner">
      <div class="wrapper">
      <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($banners as $banner) { ?>
              <?php 
                $banner_img = $banner['banner_image']; 
                $banner_title = $banner['banner_title'];
                $banner_content = $banner['banner_content'];
                $banner_button_text = $banner['banner_button_text'];
                $banner_button_link = $banner['banner_button_link']; 

                if ($banner_img) { 
              ?>
                <div class="swiper-slide">
                  <div class="banner-item">
                    <div class="banner-image-wrap">
                      <div class="banner-image">
                        <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>" />
                      </div>
                    </div>
                    <div class="banner-content">
                      <h2 class="banner-title"><?php echo $banner_title; ?></h2>
                      <div class="banner-desciption"><?php echo $banner_content; ?></div>
                      <?php if($banner_button_text && $banner_button_link){ ?>
                        <a href="<?php echo $banner_button_link; ?>" class="button btn-white"><?php echo $banner_button_text; ?></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div><!-- banner -->
  <?php } ?>
<?php } ?>