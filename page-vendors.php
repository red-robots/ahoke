<?php
/**
 * Template Name: Vendors
 */
get_header(); ?>
<div id="primary" class="content-area vendors-page">
	<main id="main" class="site-main vendors-banner">
		<?php while ( have_posts() ) : the_post(); ?>
        <div class="wrapper">
          <div class="flexwrap">
            <div class="vendors-banner-content">
              <h1><?php the_title(); ?></h1>
              <?php the_content(); ?>
            </div>
            <div class="vendors-banner-image-wrap">
              <div class="vendors-banner-image">
                <?php echo get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
              </div>
            </div>
          </div>
        </div><!-- banner -->
		<?php endwhile; ?>
	</main>

  <?php  
    $vendors_initials = array();
    $vendors_array = array();
    $arrs = array(
      'posts_per_page'   => -1,
      'post_type'        => 'vendor',
      'post_status'      => 'publish',
      'orderby'          => 'post_title',
      'order'            => 'ASC'
    );
    $vendors = get_posts($arrs);

    foreach($vendors as $vendor) {
      $i = strtoupper( substr( $vendor->post_title, 0, 1 ) );
      if(empty($vendors_array[$i])) {
        $vendors_initials[] = $i;
        $vendors_array[$i] = array();
      }
      $vendors_array[$i][] = $vendor;
    }

    if(count($vendors_initials)):
  ?>
    <section class="vendors-wrapper wrapper padding-tb-150">
      <div class="vendors-anchor flexwrap">
        <?php
          foreach( range( 'A', 'Z' ) as $letter ) {
            if(in_array($letter, $vendors_initials)) {
              echo '<a href="#'. $letter .'" class="letter"><span>' . $letter . '</span></a>';
            } else {
              echo '<span>' . $letter . '</span>';
            }
          }
        ?>
      </div>
      <div class="vendors-container">
        <div class="vendors-filter"></div>
        <div class="">
          <?php foreach($vendors_array as $letter => $vendors): ?>
            <div class="vendors-lists">
              <div class="vendor-letter">
                <h4 id="<?=$letter?>" class="letter"><?=$letter?></h4>
              </div>
              <div class="flexwrap">
                <?php foreach($vendors as $vendor): ?>
                  <div class="vendors-item">
                    <h3 class="vendors-title"><?=$vendor->post_title?></h3>
                    <div>#</div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php
    endif;
  ?>
</div>

<?php
get_footer();
