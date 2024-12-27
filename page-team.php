<?php
/**
 * Template Name: Team
 */
get_header(); ?>
<div id="primary" class="content-area team-page">
	<main id="main" class="site-main wrapper">
    <?php
      $arrs = array(
        'posts_per_page'   => -1,
        'post_type'        => 'team',
        'post_status'      => 'publish',
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'team-category',
            'field' => 'slug',
            'terms' => 'leaders',
            'operator' => 'IN',
          ),
        ),
      );
      $teams = new WP_Query($arrs);

      $count_xs = 1;
      $count_tab = 1;

      if ( $teams->have_posts() ) { ?>
      <div class="team-banner">
        <div class="flexwrap">
          <?php
            while ( $teams->have_posts() ) : $teams->the_post();
              $team_id = get_the_ID();
              $placeholder = THEMEURI . '/images/image-not-available.jpg';
              $photo = get_the_post_thumbnail( get_the_ID(), 'large' );
              $position = get_field('team_position');
              $email = get_field('team_email');
          ?>
            <div class="team-banner-content">
              <div class="team-banner-image-wrap">
                <div class="team-banner-image">
                  <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
                </div>
              </div>
              <h1 class="team-name"><?php the_title(); ?></h1>
              <div class="team-position"><?php echo $position; ?></div>
              <a href="mailto:<?php echo antispambot($email,1) ?>" class="team-email"><?php echo antispambot($email) ?></a>
              <section class="team-banner-desciption"><?php the_content(); ?></section>
            </div>
          <?php endwhile;  ?>
        </div>
      </div><!-- team-banner -->
      <?php } ?>
	</main>

  <?php
    $arrs = array(
      'posts_per_page'   => -1,
      'post_type'        => 'team',
      'post_status'      => 'publish',
      'orderby'          => 'menu_order',
      'order'            => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'team-category',
          'field' => 'slug',
          'terms' => 'charlotte-office',
          'operator' => 'IN',
        ),
      ),
    );
    $teams = new WP_Query($arrs);

    $count_xs = 1;
    $count_tab = 1;

    if ( $teams->have_posts() ) { ?>
    <section class="team-members wrapper">
      <h2>Charlotte Office</h2>
      <div class="divider divider-show"></div>
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
            <a href="mailto:<?php echo antispambot($email,1); ?>" class="team-email"><?php echo $email; ?></a>
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

  <?php  
    $args = array(
      'posts_per_page'   => -1,
      'post_type'        => 'team',
      'post_status'      => 'publish',
      'orderby'          => 'menu_order',
      'order'            => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'team-category',
          'field' => 'slug',
          'terms' => 'raleigh-office',
          'operator' => 'IN',
        ),
      ),
    );
    $teams = new WP_Query($args);

    $count_xs = 1;
    $count_tab = 1;

    if ( $teams->have_posts() ) { ?>
    <section class="team-members wrapper">
      <h2>Raleigh Office</h2>
      <div class="divider divider-show"></div>
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
            <a href="mailto:<?php echo antispambot($email,1); ?>" class="team-email"><?php echo $email; ?></a>
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
