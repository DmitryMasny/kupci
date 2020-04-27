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

    echo('<div class="product-cats">');

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
                    echo ('<div class="product-cats-item"><a href="' . esc_url(get_term_link($term, $term->taxonomy)) . '" title="Нажмите, чтобы перейти в рубрику">' . wp_get_attachment_image($term->image_id, "thumbnail") );
                }
            }
            if ($noEmpty) echo('<div class="text">' . $categories_item->cat_name . '</div></a></div>');
        }
    }

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

        echo '<div class="about">';
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

?>