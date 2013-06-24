<?php get_header();?>

				<div class="container">
						<div class="portfolio-full archive-full">
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
					
									<!-- post navigation -->
									<div class="portfolio-navigation">
								    	<div class="alignleft"><?php next_posts_link(__('Older Entries', 'okay')) ?></div>
								    	<div class="alignright"><?php previous_posts_link(__('Newer Entries', 'okay')) ?></div>
									</div>
									
									<?php 
									  $wp_query = null; 
									  $wp_query = $temp;  // Reset
									?>
			                    </ul>
							</div><!-- portfolio blocks wrap -->
						</div><!-- content -->
						<div class="clear"></div>
				</div><!-- container -->

<?php get_footer(); ?>