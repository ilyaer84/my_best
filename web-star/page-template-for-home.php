page-template-for-home
<?php

?>
<?php get_header(); ?>
<div class="user-slides">
	<?php
		$reviews = get_posts([
			'post_type'   => 'review'
		]);

	foreach($reviews as $review): ?>
		<div class="user">
            <div class="user__img">
            	<?php echo get_the_post_thumbnail($review->ID, 'reviews-large'); ?>
            </div>
            <div class="user__name">
                <?php echo $review->post_title ?>
            </div>
            <div class="user__job">
            	<?php echo get_field('city', $review->ID) ?>
        	</div>
            <div class="user__post">
            	<?php echo get_field('text', $review->ID) ?>
            </div>
        </div>
	<?php endforeach; ?>
</div>
<div class="content-wrapper clearfix">
	<main class="clearfix">
		<?php the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div>
			<?php the_content(); ?>
		</div>
		<?php 
			/*
			echo do_shortcode('[test_shortcode a="1" b="2"]'); 
			*/
			/* такой вариант быстрее работает, но не вызывает фильтры */
			/*
			echo test_shortcode([
				'a' => '1',
				'b' => '2'
			])
			*/
		?>
	</main>
</div>
<?php get_footer(); ?>