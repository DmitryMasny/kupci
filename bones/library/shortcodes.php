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

    echo("<ul>");

    foreach($catlist as $categories_item){

        // получаем данные из плагина Taxonomy Images
        $terms = apply_filters('taxonomy-images-get-terms', '', array(
            'taxonomy' => $rg->cat // таксономия, для которой нужны изображения
            ));

        if (!empty($terms)){
            foreach((array)$terms as $term){
                if ($term->term_id == $categories_item->term_id){
//                    echo ('XXXXXXXXXXXxx');
                    echo ('<li><a href="' . esc_url(get_term_link($term, $term->taxonomy)) . '" title="Нажмите, чтобы перейти в рубрику">' . wp_get_attachment_image($term->image_id, "thumbnail") . '</a></li>');
                }
            }

            echo("<p>" . $categories_item->cat_name . "</p></li>");
        }
    }

    echo("</ul>");

    return ob_get_clean();

}


/*
    Список категорий продуктов
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


// always good to see exactly what you are working with
// var_dump($values);


add_shortcode( 'product_types', 'product_types_handler' );
add_shortcode( 'advantages', 'advantages_handler' );

?>