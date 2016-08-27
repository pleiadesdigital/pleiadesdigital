<?php get_header(); ?>


<div id="primary" class="content-area">
  <main id="main" class="site-main lander-page" role="main">

    <section id="call-to-action">
      <div class="indent">
        <?php
          $query = new WP_Query('pagename=solicita-una-visita-gratuita');
          // The loop
          if ($query->have_posts()) {
            while($query->have_posts()) {
              $query->the_post();
              the_title('<h2>', '</h2>');
              the_content();
            } //endwhile
          } //endif
          wp_reset_postdata();
        ?>
      </div><!--class="indent"-->
    </section><!--id="call-to-action"-->

    <section id="testimonials">
      <div class="indent">
          <?php
          $query = new WP_Query('pagename=testimonios');
          // The loop
          if ($query->have_posts()) {
            while($query->have_posts()) {
              $query->the_post();
              the_title('<h2>', '</h2>');
              the_content();
            } //endwhile
          } //endif
          wp_reset_postdata();
          ?>
      </div><!--class="indent"-->
    </section><!--id="testimonials"-->

    <section id="services">
      <div class="indent">
        <?php
        $query = new WP_Query('pagename=servicios');
        $services_id = $query->queried_object->ID;
        // The loop
        if ($query->have_posts()) {
          while($query->have_posts()) {
            $query->the_post();
            the_title('<h2 class="section-title">', '</h2>');
            echo "<div class='entry-content'>";
            the_content();
            echo "</div>";
          } //endwhile
        } //endif
        wp_reset_postdata();

        // Get the children of the services data
        $args = array(
          'post_type' => 'page',
          'post_parent' => $services_id,
          'orderby' => 'menu_order',
          'order' => 'ASC'
        );
        $services_query = new WP_Query($args);

        // The loop
        if ($services_query->have_posts()) {
          echo '<ul class="services-list">';
          while ($services_query->have_posts()) {
            $services_query->the_post(); ?>
            <li>
              <a href="<?php echo get_permalink(); ?>" title="Leer más...<?php echo get_the_title(); ?>">
                <h3 class="services-title"><?php echo get_the_title(); ?></h3>
              </a>
              <div class="services-led">
                <?php the_content("Leer más..."); ?>
              </div>
            </li>
          <?php
          } //endwhile
          echo '</ul>';
        } //endif
        wp_reset_postdata();
        ?>
      </div><!--class="indent"-->
    </section>

    <section id="meet">
      <div class="indent">
        <?php
        $query = new WP_Query('pagename=equipo-de-trabajo');
        // The loop
        if ($query->have_posts()) {
          while($query->have_posts()) {
            $query->the_post();
            the_title('<h2 class="section-title">', '</h2>');
            echo "<div class='entry-content'>";
            the_content();
            echo "</div>";
          } //endwhile
        } //endif
        wp_reset_postdata();
        ?>
      </div><!--class="indent"-->
    </section><!--id="meet"-->

    <section id="contact">
      <div class="indent">
        <?php
        $query = new WP_Query('pagename=contacto');
        // The loop
        if ($query->have_posts()) {
          while($query->have_posts()) {
            $query->the_post();
            the_title('<h2 class="section-title">', '</h2>');
            echo "<div class='entry-content'>";
            the_content();
            echo "</div>";
          } //endwhile
        } //endif
        wp_reset_postdata();
        ?>
      </div><!--class="indent"-->
    </section>

  </main><!--id="main" class="site-main" role="main"-->
</div><!--id="primary" class="content-area"-->

<?php get_footer(); ?>