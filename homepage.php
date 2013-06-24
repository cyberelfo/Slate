<?php 
/* 
Template Name: Homepage
*/ 
?>

<?php get_header(); ?>
			
			<div id="sections" class="clearfix">
				
				<div class="page-title page-title-portfolio">
					<?php if ( get_option('okay_theme_customizer_main_title')) { ?>
						<h2><?php echo '' .get_option( 'okay_theme_customizer_main_title', '' )."\n";?></h2>
					<?php } ?>
					
					<?php if ( get_option('okay_theme_customizer_sub_title')) { ?>
						<h3><?php echo '' .get_option( 'okay_theme_customizer_sub_title', '' )."\n";?></h3>
					<?php } ?>
				</div>
				
				<?php if ( get_option('okay_theme_customizer_enable_slider') == 'enabled' ) { ?>
					<?php 
						$hasposts = get_posts( 'post_type=okay-slider' );
					    if( $hasposts ) { 
					?>
						<!-- Intro Message -->
						<div class="section section-slider">
							<!-- Slides -->
							<div class="flexslider">
								<ul class="slides">
									<?php
										$args = array('post_type' => 'okay-slider', 'posts_per_page' => 5);
										
										$temp = $wp_query; 
										$wp_query = null; 
										$wp_query = new WP_Query(); 
										$wp_query->query( $args ); 
										
										while ($wp_query->have_posts()) : $wp_query->the_post(); 
									?>
										<li>
											<?php if ( get_post_meta($post->ID, '_cmb_slide_link', true) ) { ?>
												<?php
													global $post;
													$slidelink = get_post_meta( $post->ID, '_cmb_slide_link', true );
												?>
												<a href="<?php echo $slidelink; ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
												<?php } else { ?>									
												<?php the_post_thumbnail( 'large-image' ); ?>
											<?php } ?>
										</li>
									<?php endwhile; ?>
								</ul>
							</div>
							
							<?php 
							  $wp_query = null; 
							  $wp_query = $temp;  // Reset
							?>					
						</div><!-- slider section -->
					<?php } ?>
				<?php } ?>
				
				<?php if ( get_option('okay_theme_customizer_enable_services') == 'enabled' ) { ?>
					<!-- Services -->
					<div class="section section-services">
						<div class="section-title">
							<span>
								<?php if ( get_option('okay_theme_customizer_services_title')) { ?>
									<?php echo get_option('okay_theme_customizer_services_title'); ?>
								<?php } ?>
							</span>
						</div>
	
						<div class="services-wrap" id="equalize">
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Services Text Columns') ) : else : ?>		
							<?php endif; ?>
							<div style="clear:both;"></div>
						</div>
					</div><!-- services section -->
				<?php } ?>
				
				
				<?php if ( get_option('okay_theme_customizer_enable_portfolio') == 'enabled' ) { ?>
					<!-- Portfolio -->
					<div class="section section-portfolio">					
						<div class="section-title">
							<span>
								<?php if ( get_option('okay_theme_customizer_portfolio_title_home')) { ?>
									<?php echo get_option('okay_theme_customizer_portfolio_title_home'); ?>
								<?php } ?>
							</span>
						</div>
						
						<div class="portfolio-blocks-wrap">
							<ul class="portfolio-blocks">
		                    	<?php
									
									if ( get_query_var('paged') ) {
									    $paged = get_query_var('paged');
									} else if ( get_query_var('page') ) {
									    $paged = get_query_var('page');
									} else {
									    $paged = 1;
									}
									
									$args = array('post_type' => 'okay-portfolio', 'posts_per_page' => 12, 'paged' => $paged );
									
									$temp = $wp_query; 
									$wp_query = null; 
									$wp_query = new WP_Query(); 
									$wp_query->query( $args ); 
									
									while ($wp_query->have_posts()) : $wp_query->the_post(); 
								?>
								
				                    <li class="portfolio-block">					                    	
			                    		<div class="portfolio-block-inside">
			                    			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="portfolio-small-image"><?php the_post_thumbnail( 'portfolio-image' ); ?></a>
			                    		</div>
									</li>
		
								<?php endwhile; ?>
								
								<?php 
								  $wp_query = null; 
								  $wp_query = $temp;  // Reset
								?>
		                    </ul>
						</div><!-- portfolio blocks wrap -->
					</div><!-- section -->
				<?php } ?>
				
				
				<?php if ( get_option('okay_theme_customizer_enable_blog') == 'enabled' ) { ?>
					<!-- Blog -->
					<div class="section section-blog">
						<div class="section-title">
							<span>
								<?php if ( get_option('okay_theme_customizer_blog_title')) { ?>
									<?php echo get_option('okay_theme_customizer_blog_title'); ?>
								<?php } ?>
							</span>
						</div>
	
						<div class="home-blog clearfix">
							  <ul>
							  	<?php query_posts('showposts=3'); ?>
							  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							  		
							  		<li class="home-blog-post">
							  			<div class="blog-thumb">
							  				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							  					<?php the_post_thumbnail( 'blog-thumb' ); ?>
							  				</a>
							  			</div>
							  			
							  			<div class="blog-title">
							  				<div class="big-comment">
							  					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							  				</div>
							  				
							  				<p class="home-blog-post-meta"><?php echo get_the_date(); ?></p>
							  			</div>
							  			
							  			<div class="clear"></div>
							  			
							  			<div class="excerpt">
							  				<?php the_excerpt(); ?>
							  			</div>
							  			
							  			<div class="clear"></div>
							  			
							  			<div class="blog-read-more">
							  				<a href="<?php the_permalink(); ?>"><?php _e('Read More','okay'); ?></a>
							  			</div>
							  		</li>
							  		
							  	<?php endwhile; ?>
							  	<?php endif; ?>	
							  </ul>
							  <?php echo $hidedots; ?>
						</div><!-- home blog -->
					</div><!-- blog section -->
				<?php } ?>
				
				
				<?php if ( get_option('okay_theme_customizer_enable_testimonials') == 'enabled' ) { ?>
					<!-- Testimonials -->
					<div class="section section-testimonials">
						<div class="section-title">
							<span>
								<?php if ( get_option('okay_theme_customizer_testimonial_title')) { ?>
									<?php echo get_option('okay_theme_customizer_testimonial_title'); ?>
								<?php } ?>
							</span>
						</div>
							
						<div id="testimonial-slider" class="flexslider">
							<ul class="testimonials slides">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Testimonials') ) : else : ?>		
								<?php endif; ?>
							</ul>
						</div>
					</div><!-- testimonial section -->
				<?php } ?>
			</div><!-- sections -->	
			
<?php get_footer(); ?>