<?php

//Theme styles & scripts
function child_enqueue_styles() {
    wp_enqueue_style('twenty-twenty-two-child-css', get_stylesheet_directory_uri() . "/dist/main.css", null, 'all');
    wp_enqueue_script('twenty-twenty-two-child-js', get_stylesheet_directory_uri() . "/dist/main.js", ["jquery"], true);

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

    $args = array(
        'post_type'     => $post_type,
        'post_status'   => 'publish',
        'posts_per_page'    => 10,
        'order'             => 'ASC',
    );

    $posts = new WP_Query($args); ?>

    <?php if ($posts -> have_posts()) : ?>
        <?php while ($posts -> have_posts()) : $posts -> the_post(); 
            $employee_name = get_field('emploee_data');
            $employee_pic = get_field('emploee_pic');
            $pic_size = 'thumbnail';
        ?>

        <div>
            <?php if ($employee_pic) : ?>
                <img src="<?php echo esc_url($employee_pic['sizes'][$pic_size]); ?>" alt="<?php echo esc_attr($employee_pic['alt']); ?>" />
            <?php endif; ?>
            <?php if ($employee_name) : ?>
                <h2><?php echo $employee_name; ?></h2>
            <?php endif; ?>
        </div>

        <?php endwhile; ?>
        <?php wp_reset_query();  ?>
    <?php else : ?>

        <div>Coś poszło nie tak...</div>

    <?php endif; ?>

    <?php die(1);
    
}

?>