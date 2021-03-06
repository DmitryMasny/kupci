<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

        <section class="entry-content product-page wrap cf" itemprop="articleBody">
            <h1 class="page-title"><?php the_title(); ?></h1>

            <div class="product-page-image m-all t-1of2 d-1of2 cf">
                 <img src="<?php echo get_the_post_thumbnail_url( null, 'large' ); ?>"/>
            </div>

            <div class="product-page-info m-all t-1of2 d-1of2 last-col cf">
                 <?php the_content(); ?>
            </div>

            <div class="product-page-cats m-all t-all d-all cf">
                <p class="byline vcard">
                  Категория:
                  <?php printf( get_the_term_list( $post->ID, 'product_cat', ' ', ', ', '' ) ); ?>
                </p>
            </div>



        </section>

        <?php comments_template(); ?>

    </article>

    <?php endwhile; else : ?>

        <article id="post-not-found" class="hentry cf">
                <header class="article-header">
                    <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
            </header>
                <section class="entry-content">
                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
            </section>
            <footer class="article-footer">
                    <p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
            </footer>
        </article>

    <?php endif; ?>

<?php get_footer(); ?>