<?php get_header(); ?>

	<div id="page">
		<div id="content">
			<?php while ( have_posts() ) : the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php if($post->post_content): ?>
						<div class="post-content container inner">
							<?php the_content(); ?>
						</div>
					<?php endif; ?>
					<?php if ( get_field('content', $post_id)) :?>
						<?php $i = 0; ?>
						<?php while (the_flexible_field('content', $post_id)) : ?>
						<?php 
							$layout = get_row_layout();
							$background_image_id = get_sub_field('background_image_id');
							$background_image = wp_get_attachment_image_src($background_image_id, 'full');
							$title = get_sub_field('title');
							$anchor = get_sub_field('anchor_link');
						?>
							<div class="row" <?php if($anchor) :?>id="<?php echo $anchor ?>"<?php endif; ?> style="<?php if($background_image) :?>background-image: url(<?php echo $background_image[0]; ?>);<?php endif; ?> background-color: <?php the_sub_field('background_color') ?>; color: <?php the_sub_field('text_color') ?>; <?php the_sub_field('css') ?>;">
								<div class="container inner">
								<?php if($layout == 'one_column'): ?>
									<?php if($title) :?><h2  class="row-title text-center"><?php echo $title; ?></h2><?php endif; ?>
									<div class="column span ten">
										<?php the_sub_field('content_first_column'); ?>
									</div>
								<?php endif; ?>
								<?php if($layout == 'two_columns'): ?>
									<?php if($title) :?><h2  class="row-title text-center"><?php echo $title; ?></h2><?php endif; ?>
									<div class="column span five break" style="<?php the_sub_field('styles_first_column'); ?>">
										<?php the_sub_field('content_first_column'); ?>
									</div>
									<div class="column span five break" style="<?php the_sub_field('styles_second_column'); ?>">
										<?php the_sub_field('content_second_column'); ?>
									</div>
								<?php endif; ?>
								<?php if($layout == 'three_columns'): ?>
									<?php if($title) :?><h2  class="row-title text-center"><?php echo $title; ?></h2><?php endif; ?>
									<div class="column span one-third break">
										<?php the_sub_field('content_first_column'); ?>
									</div>
									<div class="column span one-third break">
										<?php the_sub_field('content_second_column'); ?>
									</div>
									<div class="column span one-third break">
										<?php the_sub_field('content_third_column'); ?>
									</div>
								<?php endif; ?>
								<?php if($layout == 'four_columns'): ?>
									<?php if($title) :?><h2  class="row-title text-center"><?php echo $title; ?></h2><?php endif; ?>
									<div class="column span two-and-half break">
										<?php the_sub_field('content_first_column'); ?>
									</div>
									<div class="column span two-and-half break">
										<?php the_sub_field('content_second_column'); ?>
									</div>
									<div class="column span two-and-half break">
										<?php the_sub_field('content_third_column'); ?>
									</div>
									<div class="column span two-and-half break">
										<?php the_sub_field('content_fourth_column'); ?>
									</div>							
								<?php endif; ?>												
								</div>
							</div>
						<?php $i++; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div><!-- .entry-content -->
				
				

			</article><!-- #post -->

				
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #page -->
<?php get_footer(); ?>