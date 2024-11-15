<?php
/**
 * Template Name: About
 */
get_header(); ?>
<div id="primary" class="content-area about-content">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
      <header class="entry-title">
        <div class="wrapper">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
      </header>
      <section class="entry-content fullwidth"><?php the_content(); ?></section>
		<?php endwhile; ?>	
	</main>

  <?php
    $story = get_field("our_story");
    $story_img = $story["our_story_featured_image"];
    $story_title = $story["our_story_title"];
    $story_content = $story["our_story_content"];

    if( $story_title ){
  ?>
    <div class="our-story">
      <?php if( !empty( $story_img ) ): ?>
          <div class="our-story-img">
            <img src="<?php echo esc_url($story_img["url"]); ?>" alt="<?php echo esc_attr($story_img["alt"]); ?>" />
          </div>
        <?php endif; ?>
      <div class="wrapper padding-tb-150">
        <div class="our-story-content">
          <h2 class="our-story-title"><?php echo $story_title; ?></h2>
          <div class="our-story-description"><?php echo $story_content; ?></div>
        </div>
      
      </div>
    </div><!-- our-story -->
  <?php } ?>

  <?php
    $experience = get_field("the_different_experience");
    $different_experience_title = $experience["different_experience_title"];
    $experiences = $experience["experiences"];

    if( $different_experience_title ){
  ?>
    <div class="brands diff-exp padding-tb-150">
      <div class="wrapper-xl">
        <h2 class="diff-exp-title"><?php echo $different_experience_title; ?></h2>
        <?php if( $experiences ) { ?>
          <div class="diff-exp-wrapper flexwrap">
            <?php foreach( $experiences as $exp ) {
                $image = $exp["experience_image"];
                $title = $exp["experience_title"];
                $content = $exp["experience_content"];
            ?>
              <div class="exp-item">
                <div class="exp-feat-img">
                  <?php if( !empty( $image ) ){ ?>
                    <img src="<?php echo esc_url($image["url"]); ?>" alt="<?php echo esc_attr($image["alt"]); ?>" />
                  <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/image-not-available.jpg" alt="no image" />
                  <?php } ?>
                </div>
                <h3 class="exp-title"><?php echo $title; ?></h3>
                <div class="exp-content"><?php echo $content; ?></div>
              </div>
            <?php } ?>
          </div>
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
</div>
<?php
get_footer();
