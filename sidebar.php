<div id="sidebar1" class="sidebar col-4 cf" role="complementary">
    <?php
    $terms = get_terms( array(
        'taxonomy' => 'job_listing_category',
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    ) );
    
    echo '<h3>Categories</h3><ul class="categories">';
    foreach( $terms as $term ) {
        echo '<li><a href="' . get_home_url() . '/find-a-job/' . $term->slug . '">' . $term->name . '</a></li>';
    }
    echo '</ul>';
    ?>
    
    <div class="job-alerts-sidebar">
        <h3>Job Alerts</h3>
        <?php
        if( is_user_logged_in() ) {
            include_once( 'wp-job-manager-alerts/alerts-sidebar.php' );
            echo '<hr class="full"><h3>Bookmarks</h3>';
            echo do_shortcode('[my_bookmarks]');
            echo '<hr class="full"><a class="primary-btn" href="'.home_url('member-account').'">View user profile</a>';
        } else {
            echo '<p>To view your alerts and bookmarks please login below:';
            echo '<div class="alert-login">'.do_shortcode('[custom-login-form]').'</div>';
            echo '<p>Or if you don\'t have an account please register with your email address:</p>';
            echo '<div class="alert-register">'.do_shortcode('[custom-register-form]').'</div>';
        }
        ?>
        
        <?php
        if ( is_active_sidebar( 'sidebar1' ) ) {
            dynamic_sidebar( 'sidebar1' );
        }
        ?>
    </div>

</div>