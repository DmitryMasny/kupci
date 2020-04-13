<?php


function product_types_handler( $atts ){

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
?>
<ul>
<?php
foreach($catlist as $categories_item){

	// получаем данные из плагина Taxonomy Images
	$terms = apply_filters('taxonomy-images-get-terms', '', array(
		'taxonomy' => $rg->cat // таксономия, для которой нужны изображения
		));

	if (!empty($terms)){
		foreach((array)$terms as $term){
			if ($term->term_id == $categories_item->term_id){
				?>
				<li><a href="' . esc_url(get_term_link($term, $term->taxonomy)) . '" title="Нажмите, чтобы перейти в рубрику">' . wp_get_attachment_image($term->image_id, 'thumbnail') . '</a>

				<?php }
			}
		}

		?>
    <p>' . $categories_item->cat_name . '</p></li>


	<?php } ?>
</ul>
<?php

}




add_shortcode( 'product_types', 'product_types_handler' );

?>