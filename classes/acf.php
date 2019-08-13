<?php
class CustomACF {
	public function render_content() {
		$layout = get_sub_field('layout');
		$padding = get_sub_field('padding');
		$bgColour = get_sub_field('bg_colour');
		$bgImage = get_sub_field('bg_image');
		$customClass = get_sub_field('class');
		$customID = '';
		$addClasses = array();
		$addStyles = array();
		$styles;
		
		if( get_sub_field('row_id') ) {
			$customID = ' id="'.get_sub_field('row_id').'"';
		}

		if( $padding ) {
			if( $padding['padding_top'] ) { array_push($addStyles, "padding-top: $padding[padding_top];"); }
			if( $padding['padding_right'] ) { array_push($addStyles, "padding-right: $padding[padding_right];"); }
			if( $padding['padding_bottom'] ) { array_push($addStyles, "padding-bottom: $padding[padding_bottom];"); }
			if( $padding['padding_left'] ) { array_push($addStyles, "padding-left: $padding[padding_left];"); }
		}

		if( $customClass ) {
			array_push($addClasses, $customClass);
		}

		if( get_sub_field('bg_colour') ) {
			array_push($addClasses, "bg-colour");
			array_push($addStyles, "background-color: $bgColour;");
		}

		if( get_sub_field('bg_image') ) {
			array_push($addStyles, "background-image: url('$bgImage');");
			array_push($addStyles, "background-repeat: no-repeat;");
			array_push($addStyles, "background-size: cover;");
			array_push($addStyles, "background-position: center;");
		}

		if( isset($addClasses) || isset($addStyles) ) {
			$styles = ' style="';
			$styles .= implode(" ", $addStyles);
			$styles .= '"';
		}

		if( $layout === 'hide' ) {
			echo '<section class="row entry-content cf" style="display: none;">';
			echo '<div class="cf">';
		} else if( $layout === 'wrap' ) {
			echo '<section'.$customID.' class="row entry-content wrap cf '.implode(" ", $addClasses).'"'.$styles.'>';
			echo '<div class="cf">';
		} else if( $layout === 'full' ) {
			echo '<section'.$customID.' class="row entry-content full cf '.implode(" ", $addClasses).'"'.$styles.'>';
			echo '<div class="cf">';
		} else {
			echo '<section'.$customID.' class="row entry-content cf '.implode(" ", $addClasses).'"'.$styles.'>';
			echo '<div class="cf">';
		}
        
        if( get_sub_field('title') ) {
            echo '<div class="col-12"><h2>' . get_sub_field('title') . '</h2><hr></div>';
        }

		$columns = array(
			get_sub_field('col_1'),
			get_sub_field('col_2'),
			get_sub_field('col_3'),
			get_sub_field('col_4')
		);

		$colNum = count(array_filter($columns));
		foreach($columns as $key => $column) {	
			if( $column != '' ) {
				echo '<div class="col-'.(12/$colNum).''.(get_sub_field('blog_feed') ? ' blog-enabled cf' : '').'">' . $column . '</div>';
			}
		}
		
		if( get_sub_field('blog_feed') ) {
			$all_cats = get_sub_field('all_categories');
			$post_category = get_sub_field('category');
			$post_num = get_sub_field('post_count');
			
			global $post;
			if( $all_cats == true ) {
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => $post_num,
				);
			} else {
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'cat' => $post_category,
					'posts_per_page' => $post_num,
				);
			}
			$arr_posts = new WP_Query( $args );
			
			if ( $arr_posts->have_posts() ) : ?>
				<div class="blog-wrapper cf">
				<?php while ( $arr_posts->have_posts() ) :
					$arr_posts->the_post(); ?>
					<div id="post-<?php the_ID(); ?>" class="col-<?php echo (12/$post_num); ?> cf">
						<a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('square'); ?></a>
						<div class="text">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="excerpt"><?php the_excerpt(); ?></p>
                            <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
			<?php endif;
			wp_reset_postdata();
		}
		echo '</div></section>';
	}
	
    function page_rows() {
		if( have_rows('custom_content') ) : while( have_rows('custom_content') ) : the_row();
			$this->render_content();
		endwhile; endif; // Content
	}
}

$acfClass = new CustomACF();
?>