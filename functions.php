<?php

/**
* загружаемые скрипты и стили
*/
function load_style_script(){
	wp_enqueue_script('jquery_my', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
}

/**
* загружаем скрипты и стили
*/
add_action('wp_enqueue_scripts', 'load_style_script');

/**
* меню
**/
register_nav_menu( 'menu', 'Primary Menu' );

/**
* слайдер
**/
register_sidebar(array(
				'name' => 'Слайдер на главной странице',
				'id' => 'slider_index',
				'description' => 'Добавьте слайдер через виджет Текст',
				'before_widget' => '',
				'after_widget' => ''));

/**
* футер
**/
register_sidebar(array(
				'name' => 'Футер',
				'id' => 'footer',
				'description' => 'Добавьте ссылки на соцсети через виджет Текст',
				'before_widget' => '',
				'after_widget' => ''));

/**
* миниатюры
**/
add_theme_support('post-thumbnails');

/**
* шорткод галереи
**/
function theme2_gallery($attr, $text=''){
	// получаем массив ID картинок
	$img_src = explode(",", $attr['ids']);
	// шаблон удаления атрибутов width/height
	$pattern = '#(width|height)="\d+"#';
	$return = '<ul id="slide_2" class="slidik">';
	// счетчик
	$i = 1;
	foreach ($img_src as $item) {
		// получаем HTML-код картинки
		$image_url = wp_get_attachment_image( $item, 'full' );
		// вырезаем атрибуты width/height
		$image_url = preg_replace($pattern, "", $image_url);
		// формируем вывод картинок
		if($i == 1) $return .= '<li class="show">' . $image_url . '</li>';
		else $return .= '<li>' . $image_url . '</li>';
		$i++;
	}
	$return .= '<a data-slidik="slide_2" class="next" href="#">Next</a>
            <a data-slidik="slide_2" class="prev" href="#">Prev</a>
            <div class="captionWrap"><div data-slidik="slide_2" class="caption"></div></div>
            <div class="portfolio-close"><a href="#"></a></div>
    	</ul>';
    echo $return;
}
add_shortcode('shortcode_gallery', 'theme2_gallery');

?>