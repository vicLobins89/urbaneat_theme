<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<div id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							
							<section class="entry-content row post-content cf">
                            
                            <div class="cf blog-wrapper"><div class="col-12">
                                
                                <h2 class="color-block black corner-tl">Blog</h2>

							<?php 
                                if (have_posts()) : 
                                $count = 0;
                                while (have_posts()) : the_post();
                                $count++;
                                if( $count < 2 ) :
                            ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf col-12 main-post' ); ?> role="article">
								
                                    <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('full'); ?></a>
                                    <div class="text">
                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p class="excerpt"><?php the_excerpt(); ?></p>
                                        <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                                    </div>

                                </article>
                                
                                <div class="posts-continued cf">
                                    <?php 
                                    else :
                                    ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf col-6' ); ?> role="article">

                                            <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('square'); ?></a>
                                            <div class="text">
                                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <p class="excerpt"><?php the_excerpt(); ?></p>
                                                <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                                            </div>

                                        </article>
                                    <?php 
                                    endif;
                                    ?>

                            <?php endwhile; ?>
                                </div>
                                
                            <?php
                            echo '<div class="cat-list cf"><h4 class="expand-acc active">Filter by category</h4><div class="cat-wrapper accordion active">';
                            wp_list_categories( array(
                                'title_li' => ''
                            ) );
                            echo '</div></div>';
							?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
									</article>

							<?php endif; ?>
								
							</div></div></section>
							
							<?php bones_page_navi(); ?>

						</div>

				</div>

			</div>


<?php get_footer(); ?>
