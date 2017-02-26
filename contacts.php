<?php
/*
Template Name: Шаблон страницы контактов
*/
?>
<?php get_header('page'); ?>
<div class="content-main">

	<div class="content-left">
		
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h1><?php the_title() ?></h1>
<div class="contact-form">
	<?php the_content() ?>
</div>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

	</div>

	<div class="sidebar">
        	<div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php the_post_thumbnail() ?>
<h1>Contact Details</h1>

<?php $custom_fields = get_post_custom( get_the_ID() ); ?>
<?php 
foreach ($custom_fields as $key => $value) {
    if( preg_match('#^contact-#', $key) ){
        echo "<p class='{$key}'>{$value[0]}</p>";
    }   
}
if($custom_fields['business-number'][0]){
    echo "<p>{$custom_fields['business-number'][0]}</p>";
}
?>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>                
            	<!-- <img src="images/contact-img.jpg" alt="" />
                <h1>Contact Details</h1>
                <p class="contact-address">18, Your Street, Yourareaname, Cityname,
                Countyname, DE1 2WX, United Kingdom.</p>
                
                <p class="contact-phone">0800 900 0003</p>
                
                <p class="contact-mail">youremail@yoursite.com</p>
                
                <p class="contact-liciense">Registered photographer No. 09900-CCC</p>
                
                <p>VAT registered business number 455-5559-000</p> -->

            </div>
        </div>
            
</div>
<?php get_footer('page'); ?>