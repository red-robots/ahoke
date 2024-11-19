	</div><!-- #content -->

	<footer id="footer" class="site-footer" role="contentinfo">			
		<div class="wrapper">
      <div class="footer-inner flexwrap">
        <div class="footer-logo">
          <?php if( get_custom_logo() ) { ?>
            <?php the_custom_logo(); ?>
          <?php } else { ?>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
          <?php } ?>
  			</div>

        <?php
          $rows = get_field("showroom", "option");
          if( $rows ) {
            foreach( $rows as $row ) {

              echo "<div class='showroom'>";

              $title = $row["showroom_title"];
              $address = $row["address"];
              $phone = $row["phone"];
              $hours = $row["hours"];

              echo "<div class='title'>". $title ."</div>";
              echo "<div class='address'>". $address ."</div>";
              echo "<div class='phone'>". $phone ."</div>";
              echo "<div class='hours'>Hours:</div>";
              echo "<div>". $hours ."</div>";

              echo '</div>';
            }
          }

          $facebook = get_field("facebook", "option");
          $instagram = get_field("instagram", "option");
          $pinterest = get_field("pinterest", "option");

          if( $facebook || $instagram || $pinterest ){
            echo "<div class='social-media'>";

            if( $facebook ){
              echo "<a href='". $facebook ."' class='facebook' target='_blank'><i class='fa-brands fa-facebook-f'></i></a>";
            }

            if( $instagram ){
              echo "<a href='". $instagram ."' class='instagram' target='_blank'><i class='fa-brands fa-instagram'></i></a>";
            }

            if( $pinterest ){
              echo "<a href='". $pinterest ."' target='_blank'><i class='fa-brands fa-pinterest-p'></i></a>";
            }

            echo '</div>';
          }
        ?>
        
      </div>
    </div>
	</footer><!-- #footer -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
