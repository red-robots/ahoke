<?php
  $show_popup = get_field("show_popup", "option");

  if( $show_popup == 1 ) {
    $popup_content = get_field("popup_content", "option");
    $popup_image = get_field("popup_image", "option");
    
    if( is_front_page() || is_home() ) {
?>
    <a class="btn-popup" data-fancybox data-src="#popup"></a>
    <div id="popup" class="popup">
      <div class="flexwrap">
        <div class="popup-content">
          <?php echo $popup_content; ?>
        </div>
        <?php if( !empty( $popup_image ) ){ ?>'
          <div class="popup-image">
            <img src="<?php echo esc_url($popup_image['url']); ?>" alt="<?php echo esc_attr($popup_image['alt']); ?>" />
        </div>
        <?php } ?>
      </div>
    </div>
<?php
    }
  }
?>