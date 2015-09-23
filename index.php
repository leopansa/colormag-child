<?php
/**
 * Credits
 * Author: leopansa
 * Date: 6/27/15
 * Time: 8:51 PM
 */
?>

<?php get_header(); ?>

<?php do_action( 'colormag_before_body_content' ); ?>

    <div id="primary">
        <div id="content" class="clearfix">

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', '' ); ?>

                <?php endwhile; ?>

                <?php get_template_part( 'navigation', 'none' ); ?>

            <?php else : ?>

                <?php get_template_part( 'no-results', 'none' ); ?>

            <?php endif; ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php colormag_sidebar_select(); ?>

<?php do_action( 'colormag_after_body_content' ); ?>

<?php get_footer(); ?>