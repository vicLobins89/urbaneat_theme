<?php
get_header();
require_once('classes/acf.php');
$acfClass = new CustomACF();
?>

			<div id="content">

				<div id="inner-content" class="cf">

						<div id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
							<?php // MAIN CONTENT ?>
							<?php $thecontent = get_the_content(); if( has_post_thumbnail() && is_page() ) : ?>
								<section class="row entry-content cf top featured" itemprop="articleBody">
									<div class="cf">
									<?php the_post_thumbnail('full', array( 'class' => 'desktop' ));
                                        
                                        
                                    if( get_field('mobile_banner') ) { ?>
                                        <img class="mobile" <?php awesome_acf_responsive_image( get_field('mobile_banner'),'full', '1920px' ); ?>  alt="mobile banner" />
                                    <?php } ?>
                                        
									<div class="featured-copy">
										<?php the_content(); ?>
									</div>
									</div>
								</section>

							<?php
                            elseif( !empty($thecontent) ) :
								$layout = get_field('editor_layout');
								if( $layout === 'hide' ) {
									echo '<section class="row entry-content cf top" style="display: none;">';
									echo '<div class="cf">';
								} else if( $layout === 'wrap' ) {
									echo '<section class="row entry-content wrap cf top" itemprop="articleBody">';
									echo '<div class="cf">';
								} else if( $layout === 'full' ) {
									echo '<section class="row entry-content full cf top" itemprop="articleBody">';
									echo '<div class="cf">';
								} else {
									echo '<section class="row entry-content cf top" itemprop="articleBody">';
									echo '<div class="cf">';
								}
								?>
									<div class="col-12">
										<?php the_content(); ?>
									</div>
								</div></section>
							<?php endif; // MAIN CONTENT ?>
							
							<?php // ACF FIELDS ?>
							<?php $acfClass->page_rows(); ?>

							</article>

							<?php endwhile; endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>