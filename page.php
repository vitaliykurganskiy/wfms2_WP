<?php get_header('page'); ?>
<div class="content-main">

	<div class="content-left">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h1><?php the_title() ?></h1>
<?php the_content(); ?>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

    </div>
    
    <?php get_sidebar(); ?>
            
</div>
<?php get_footer('page'); ?>