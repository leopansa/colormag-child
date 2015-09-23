<?php
/**
 * Created by PhpStorm.
 * User: leopansa
 * Date: 6/27/15
 * Time: 9:27 PM
 */
?>

<?php
/**
 * The template used for displaying page content in page.php
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action( 'colormag_before_post_content' ); ?>

    <?php if ( has_post_thumbnail() ) { ?>
        <div class="featured-image">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'colormag-featured-image' ); ?></a>
        </div>
    <?php } ?>

    <div class="article-content clearfix">

        <?php if( get_post_format() ) { get_template_part( 'inc/post-formats' ); } ?>

        <?php colormag_colored_category(); ?>

        <header class="entry-header">
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
            </h1>
        </header>

        <?php colormag_entry_meta_top(); ?>

        <div class="entry-content clearfix">
            <?php
                // ========= >>> LEO
                // =================================
                // Modification to used the <--more--> indication,
                // instead of the_excerpt().
				the_content( __( 'Read more', 'colormag' ) ); //create error function.php
			?>
	</div>

    </div>

    <?php do_action( 'colormag_after_post_content' ); ?>
</article>
