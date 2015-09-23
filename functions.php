<?php
/**
 * Created by PhpStorm.
 * User: leopansa
 * Date: 6/26/15
 * Time: 5:29 PM
 */



add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . 'genericons/genericons.css' );

}



/****************************************************************************************/
/* Change The Read More Link Text from the excerpt() to the_content() */
//remove_filter( 'the_content_more_link', 'colormag_remove_more_jump_link',20);
add_filter( 'the_content_more_link', 'modify_read_more_link', 11, 0);
function modify_read_more_link() {
    return '<a name="LEONARDO" class="more-link" title="' .  get_the_title() . '" href="' . get_permalink() . '"><span>' . __( "Read more", "colormag" ) . '</span></a>';

}

/****************************************************************************************/

if ( ! function_exists( 'colormag_entry_meta_top' ) ) :
    /**
     * Shows meta information of post.
     */
    function colormag_entry_meta_top() {
        if ( 'post' == get_post_type() ) :
            echo '<div class="below-entry-meta">';
            ?>

            <?php
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() )
            );
            printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar"></i> %3$s</a></span>', 'colormag' ),
                esc_url( get_permalink() ),
                esc_attr( get_the_time() ),
                $time_string
            ); ?>

            <span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span>

            <?php
            if ( ! post_password_required() && comments_open() ) { ?>
                <span class="comments"><?php comments_popup_link( __( '<i class="fa fa-comment"></i> 0 Comment', 'colormag' ), __( '<i class="fa fa-comment"></i> 1 Comment', 'colormag' ), __( '<i class="fa fa-comments"></i> % Comments', 'colormag' ) ); ?></span>
            <?php }

            echo '</div>';
        endif;
    }
endif;

/****************************************************************************************/

if ( ! function_exists( 'colormag_entry_meta_bottom' ) ) :
    /**
     * Shows meta information of post.
     */
    function colormag_entry_meta_bottom() {
        if ( 'post' == get_post_type() ) :
            echo '<div class="below-entry-meta">';
            ?>
            <?php
            $tags_list = get_the_tag_list( '<span class="tag-links"><i class="fa fa-tags"></i>', __( ', ', 'colormag' ), '</span>' );
            if ( $tags_list ) echo $tags_list;

            edit_post_link( __( 'Edit', 'colormag' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' );

            echo '</div>';
        endif;
    }
endif;

/****************************************************************************************/

