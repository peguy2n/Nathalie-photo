<?php

function ajouter_scripts() {
    // Enregistrer le fichier JavaScript
    wp_enqueue_script('mes-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'ajouter_scripts');

function ajouter_styles() {
    wp_enqueue_style('mon-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'ajouter_styles');

function ajouter_google_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'ajouter_google_fonts');






function filter_posts(){
    $args = array(
        'post_type' => 'photo',
        'orderby' => 'date',
        'paged' => 1,
		'posts_per_page' => 8, 
        'order' => isset($_POST['date']) ? $_POST['date'] : 'DESC', 
    );

    // Taxonomy filters
    if(isset($_POST['categorie']) && $_POST['categorie'] != '0'){
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field' => 'id', 
            'terms' => $_POST['categorie'], 
        );
    }
    if(isset($_POST['format']) && $_POST['format'] != '0'){
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'id', 
            'terms' => $_POST['format'], 
        );
    }

    $query = new WP_Query($args);

    if($query->have_posts()) :
        while($query->have_posts()) : $query->the_post();
            // Display post content as desired

            $query->the_post();
    $image_url = get_the_post_thumbnail_url();
    $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
        $post_id = get_post_meta(get_the_ID(), 'reference', true);
        $image_category = get_the_category(get_the_ID());
        $image_type = get_post_meta(get_the_ID(), 'type', true);
        $term_obj_list = get_the_terms( get_the_ID(), 'categorie' );

        ?>
            <div class="card">   
            <img class="post_img" src="<?php echo $image_url ?>" 
            alt="<?php echo $image_alt?>" data-imgId="<?php echo $post_id ?>">
            <img class="fullscreen" role="button" src="<?php echo get_template_directory_uri() . '/assets/images/group 31.png'; ?>" alt="Description of the image">
            <a href='<?php echo get_permalink(); ?>
        '><img class="lightbox-eye" alt="lightbox eye" role="button" aria-pressed="false" src="<?php echo get_template_directory_uri() . '/assets/images/Icon_eye.png'; ?>"></a>
            <span class="title"><?php echo the_title()?></span>
            <span class="categorie"><?php echo ($term_obj_list[0]->name)  ?></span>
        </div>
      <?php  endwhile;
        wp_reset_postdata();
    else :
        echo 'Aucune photo trouvée';
    endif;

    die();
}
add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');




?>