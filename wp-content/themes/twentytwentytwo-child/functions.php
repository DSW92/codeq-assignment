<?php

//Theme styles & scripts
function child_enqueue_styles() {
    wp_enqueue_style('twenty-twenty-two-child-css', get_stylesheet_directory_uri() . "/dist/main.css", null, 'all');
    wp_enqueue_script('twenty-twenty-two-child-js', get_stylesheet_directory_uri() . "/dist/main.js", ["jquery"], true);

    // AJAX URL
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

    // Fonts
    wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15);

// Register new blocks
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/header' );
    register_block_type( __DIR__ . '/blocks/steps' );
    register_block_type( __DIR__ . '/blocks/employees' );
}

// Custom Post Types
function employees_custom_post_type() {

    $labels = array(
        'name' => 'Pracownicy',
        'singular_name' => 'Pracownik',
        'add_new' => 'Dodaj nowego pracownika'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'custom-fields',
        ),
        // 'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 6,
        'exclude_from_search' => false
    );
    register_post_type('employees', $args);
}
add_action( 'init', 'employees_custom_post_type' );

// Use ACF field as Custom Post Type Title (Default WP post title)
function my_post_title_updater( $post_id ) {

	if ( get_post_type( $post_id ) == 'employees' ) {

		$my_post = array();
        $my_post['ID'] = $post_id;
		$my_post['post_title'] = get_field( 'emploee_data', $post_id );
		
		// Update the post into the database
		wp_update_post( $my_post );
	}

}
// run after ACF saves the $_POST['fields'] data
add_action('acf/save_post', 'my_post_title_updater', 20);

// Ajax
add_action( 'wp_ajax_nopriv_get_employees_list', 'get_employees_cpt' );
add_action( 'wp_ajax_get_employees_list', 'get_employees_cpt' );
function get_employees_cpt() {
    $post_type = 'employees';
    $paged = ($_POST['paged'])? $_POST['paged'] : 1;

    $args = array(
        'post_type'     => $post_type,
        'post_status'   => 'publish',
        'posts_per_page'    => 3,
        'order'             => 'ASC',
        'paged'             => $paged
    );

    $posts = new WP_Query($args); ?>

    <?php if ($posts -> have_posts()) : ?>
        <div class="employees__container">
            <?php while ($posts -> have_posts()) : $posts -> the_post(); 
                $employee_name = get_field('emploee_data');
                $employee_pic = get_field('emploee_pic');
                $pic_size = 'thumbnail';
                $theme_url = get_stylesheet_directory_uri();
            ?>

            <div>
                <?php if ($employee_pic) : ?>
                    <img src="<?php echo esc_url($employee_pic['sizes'][$pic_size]); ?>" alt="<?php echo esc_attr($employee_pic['alt']); ?>" />
                <?php else : ?>
                    <img class="noimage-pic" src="<?php echo $theme_url; ?>/includes/noimage.png" alt="" />
                <?php endif; ?>
                <?php if ($employee_name) : ?>
                    <h2><?php echo $employee_name; ?></h2>
                <?php endif; ?>
            </div>

            <?php endwhile; ?>
        </div>

        <?php
        $nextpage = $paged+1;
        $prevouspage = $paged-1;
        $total = $posts->max_num_pages;
        $pagination_args = array(
            'base'               => '%_%',
            'format'             => '?paged=%#%',
            'total'              => $total,
            'current'            => $paged,
            'show_all'           => true,
            // 'end_size'           => 1,
            // 'mid_size'           => 2,
            'prev_next'          => true,
            'prev_text'       => __('<span class="prev-next" data-attr="'.$prevouspage.'"><</span>'),
            'next_text'       => __('<span class="prev-next" data-attr="'.$nextpage.'">></span>'),
            'type'               => 'plain',
            'add_args'           => false,
            'add_fragment'       => '',
            'before_page_number' => '',
            'after_page_number'  => ''
        );
        $paginate_links = paginate_links($pagination_args);
        ?>

        <?php wp_reset_query();  ?>
    <?php else : ?>

        <div>Coś poszło nie tak...</div>

    <?php endif; ?>

    <div class="pagination__container">
        <?php
            if ($paginate_links != '') {
                echo "<div id='pagination' class='container pagination'>";
                echo $paginate_links;
                echo "</div>";
            }
        ?>
    </div>

    <?php die(1);
    
}

?>