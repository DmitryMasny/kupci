<?php
/*
 * CUSTOM POST TYPE TAXONOMY TEMPLATE
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
*/
?>


<?php get_header(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

            <section class="entry-content product-cat-page wrap cf" itemprop="articleBody">

                <?php if (have_posts()) : ?>
                <div class="product-list">
                <?php while (have_posts()) : the_post(); ?>

                <a class="product-thumb" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                     <img class="product-image" src="<?php echo get_the_post_thumbnail_url( null, 'thumbnail' ); ?>"/>
                     <h3>
                           <?php the_title(); ?>
                     </h3>

                </a>

                <?php endwhile;?>
                    </div>

     <?php  else : ?>

            <header class="article-header">
                    <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
            </header>
                <section class="entry-content">
                    <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
            </section>
            <footer class="article-footer">
                    <p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
            </footer>

    <?php endif; ?>

        </div>

         </section>
    </article>


<?php get_footer(); ?>
