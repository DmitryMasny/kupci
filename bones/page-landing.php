<?php
/*
 Template Name: Landing
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<?php  the_post(); ?>


    <div class="start-block" style="background-image: url('<?php echo get_the_post_thumbnail_url( null, 'full' ); ?>')">
        <div class="inner">
        <?php the_field('header');?>
            <div>
                <div class="green-btn large"><?php the_field('main_btn_text');?></div>
            </div>
        </div>
    </div>

    <div></div>


    <article id="post-<?php the_ID() ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

        <section class="entry-content cf wrap" itemprop="articleBody">

            <?php
                the_content();

                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </section>

        <footer class="article-footer">

            <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

        </footer>

        <?php comments_template(); ?>

    </article>


<?php get_footer(); ?>
