<?php 
/*
 *
 * Template Name: Examples
 *
 */
?>
<?php get_header(); ?>

	<div id="template-examples">
		<div id="content">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="row navigation">
				<div class="container">
					<div class="span column three break white">
						<h1>Examples</h1>
					</div>
					<div class="span column seven break">
					<?php if(get_field('examples')) : ?>
						<?php while (the_repeater_field('examples')) : ?>
							<a class="scroll-to-btn" href="#<?php echo get_sub_field('anchor') ?>"><?php echo get_sub_field('title'); ?></a>
							<?php endwhile; ?>
						<?php endif; ?>			
					</div>
				</div>
			</div>		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php if($post->post_content): ?>
						<div class="post-content container inner">
							<?php the_content(); ?>
						</div>
					<?php endif; ?>
					<?php if(get_field('examples')) : ?>
						<?php $i = 0; ?>
						<?php while (the_repeater_field('examples')) : ?>
						<?php 
							$title = get_sub_field('title');
							$anchor = get_sub_field('anchor');				
						?>
							<div class="row example" <?php if($anchor) :?>id="<?php echo $anchor ?>"<?php endif; ?> style="background-color: <?php the_sub_field('background_color') ?>; color: <?php the_sub_field('text_color') ?>;">
								<div class="container inner">
									<a class="arrow-up-btn">Back to Top</a>
									<div class="column span five break image">
										<img src="<?php the_sub_field('image'); ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>"> 											
									</div>
									<div class="column span five break description">
											<h2  class="row-title"><?php echo $title; ?></h2>
											<div class="content">
												<?php the_sub_field('content'); ?>											
											</div>
										<?php if(get_sub_field('testimonials') != '') :?>
											<div class="bubble">
												<?php the_sub_field('testimonials'); ?>
											</div>
										<?php endif; ?>
									</div>
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