<?php
/**
 * Template Name: Designers
 */
get_header();
?>

<div id="primary" class="content-default">
  <main id="main" class="site-main content-default-banner">
		<?php while ( have_posts() ) : the_post(); ?>
        <div class="wrapper flexwrap">
          <div class="content-default-title">
            <h1><?php the_title(); ?></h1>
            <div class="content-default-desciption">
              <?php the_content(); ?>
            </div>
          </div>
        </div><!-- wrapper -->
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <div class="content-default-banner-image-wrap">
            <div class="content-default-banner-image">
              <?php echo get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
            </div>
          </div>
        <?php endif; ?>
		<?php endwhile; ?>
	</main>
	<section class="wrapper padding-tb-100">
		<?php while ( have_posts() ) : the_post(); ?>

      <?php
        $resources_content = get_field('resources_content');
        if( $resources_content ):
      ?>
        <div class="entry-content">
          <?=$resources_content?>
        </div>
      <?php endif;

        $resources = get_field("resources_document");
        if( $resources ):
      ?>
        <ul class="resources clearfix">
          <?php
            foreach( $resources as $document ):
              $title = $document["title"];
              $pdf = $document["pdf"];
          ?>
              <li>
                <a href="<?=$pdf['url']?>" target="_blank"><?=$title?></a>
              </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
