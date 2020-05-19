<?php

/*
    Список категорий продуктов
*/
function product_types_handler( $atts ){
    ob_start();
    $rg = (object) shortcode_atts( [
            'cat' => 'product_cat'
        ], $atts );


    /* вывод списка рубрик */
    $args = array(
        'parent' => 0,
        'hide_empty' => 0,
        'exclude' => '', // ID рубрики, которую нужно исключить
        'number' => '0',
        'orderby' => 'count',
        'order' => 'DESC',
        'taxonomy' => $rg->cat, // таксономия, для которой нужны изображения
        'pad_counts' => true
    );
    $catlist = get_categories($args); // получаем список рубрик

    echo('<div id="productCategories"  class="product-cats">');

    foreach($catlist as $categories_item){

        // получаем данные из плагина Taxonomy Images
        $terms = apply_filters('taxonomy-images-get-terms', '', array(
            'taxonomy' => $rg->cat // таксономия, для которой нужны изображения
            ));

        if (!empty($terms)){
            $noEmpty = false;
            foreach((array)$terms as $term){
                if ($term->term_id == $categories_item->term_id){
                    $noEmpty = true;
                    echo ('<div class="product-cats-item"><a class="product-cats-item-inner" href="' . esc_url(get_term_link($term, $term->taxonomy)) . '" title="Нажмите, чтобы перейти в рубрику">' . wp_get_attachment_image($term->image_id, "thumbnail") );
                }
            }
            if ($noEmpty) echo('<div class="text">' . $categories_item->cat_name . '</div></a></div>');
        }
    }

    echo("</div>");

    return ob_get_clean();

}

/*
    Список всех продуктов
*/
function products_handler( ){
    ob_start();
    echo('<div id="allProducts" class="product-cats">');

 	$query = new WP_Query( array(
 	    'post_type' => 'product',
        'posts_per_page' => 32 ) );
 	while ( $query->have_posts() ) : $query->the_post(); ?>
 		<div class="product-cats-item">
 		<a class="product-cats-item-inner" href="<?php the_permalink() ?>" title="Нажмите, чтобы перейти в рубрику">
        	 	<?php
        		    if ( has_post_thumbnail() ) {
        		      the_post_thumbnail();
        		    }
        		    ?>
        		    <div class="text">
        		    <?php the_title(); ?>
        		    </div>
        	</a></div>
 	<?php wp_reset_postdata();
 	endwhile;
    echo("</div>");

    return ob_get_clean();

}


/*
    Наши преимужества
*/
function advantages_handler(  ){
    ob_start();

        $values = get_field('advantages');
//         var_dump($values);
//        console_log('$values', $values);
        if ($values && $values["adv1"]) {
        	echo '<div class="advantages">';

        	foreach([1, 2, 3, 4] as $num) {
        		echo '<div class="advant"><img class="advant-image" src="' . $values['img' . $num] .'"/><div  class="advant-text">' . $values['adv' . $num] . '</div></div>';
        	}

        	echo '</div>';
        }

    return ob_get_clean();

}
/*
    About
*/
function about_handler( $atts = [] ){
    ob_start();

    $atts2 = (object) shortcode_atts( [
        'title' => 'О компании'
    ], $atts );

    $text = get_field('about');

        echo '<div id="aboutCompany" class="about">';
        echo '<h2>'. $atts2->title .'</h2>';
        echo '<p>'. $text .'</p>';
        echo '</div>';

    return ob_get_clean();

}


// always good to see exactly what you are working with
// var_dump($values);


add_shortcode( 'product_types', 'product_types_handler' );
add_shortcode( 'advantages', 'advantages_handler' );
add_shortcode( 'about', 'about_handler' );
add_shortcode( 'products', 'products_handler' );

?>