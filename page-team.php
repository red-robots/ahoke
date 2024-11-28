<?php
/**
 * Template Name: Team
 */
get_header(); ?>
<div id="primary" class="content-area team-page">
	<main id="main" class="site-main wrapper">
		<?php
      while ( have_posts() ) : the_post();
      
      $name = get_field("name", get_the_ID());
      $position = get_field("team_position", get_the_ID());
      $email = get_field("team_email", get_the_ID());
    ?>
      <div class="team-banner">
        <div class="flexwrap">
          <div class="team-banner-content">
            <h1 class="team-name"><?php echo $name; ?></h1>
            <div class="team-position"><?php echo $position; ?></div>
            <a href="mailto:<?php echo $email; ?>" class="team-email"><?php echo $email; ?></a>
            <section class="team-banner-desciption"><?php the_content(); ?></section>
          </div>
          <div class="team-banner-image-wrap">
            <div class="team-banner-image">
              <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
            </div>
          </div>
        </div>
      </div><!-- banner -->
		<?php endwhile; ?>
	</main>

  <?php  
    $arrs = array(
      'posts_per_page'   => -1,
      'post_type'        => 'team',
      'post_status'      => 'publish',
      'orderby'          => 'menu_order',
      'order'            => 'ASC'
    );
    $teams = new WP_Query($arrs);

    $count_xs = 1;
    $count_tab = 1;

    if ( $teams->have_posts() ) { ?>
    <section class="team-members wrapper">
      <div class="flexwrap">
        <?php
          while ( $teams->have_posts() ) : $teams->the_post();
            $team_id = get_the_ID();
            $placeholder = THEMEURI . '/images/image-not-available.jpg';
            $photo = get_the_post_thumbnail( get_the_ID(), 'large' );
            $position = get_field('team_position');
            $email = get_field('team_email');
          ?>
          <div class="team-member">
            <div class="team-photo">
              <?php if ($photo) { ?>
                <?php echo $photo; ?>
              <?php } else { ?>
                <img src="<?php echo $placeholder; ?>" alt="" aria-hidden="true">
              <?php } ?>
            </div>
            <h3 class="team-name"><?php the_title(); ?></h3>
            <?php if ($position) { ?>
              <div class="team-position"><?php echo $position; ?></div>
            <?php } ?>
            <div>
              <a href="mailto:<?php echo $email; ?>" class="team-email"><?php echo $email; ?></a>
            </div>
          </div>
          <?php
            if( $count_xs % 2 == 0 ){
              echo "<div class='divider divider-xs'></div>";
            }
            $count_xs++;

            if( $count_tab % 3 == 0 ){
              echo "<div class='divider divider-tab'></div>";
            }
            $count_tab++;
          ?>
        <?php endwhile;  ?>
      </div>
    </section>
  <?php } ?>
</div>
<?php
get_footer();
