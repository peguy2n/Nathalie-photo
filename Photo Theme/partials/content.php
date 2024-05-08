<?php
$args= array (
		'post_type' => 'photo', 
		'posts_per_page' => 8, 
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => 1,
	); 
$query = new WP_Query($args);

while ($query->have_posts()) :
    $query->the_post();
    $image_url = get_the_post_thumbnail_url();
    $image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
        $post_id = get_post_meta(get_the_ID(), 'reference', true);
        $image_category = get_the_category(get_the_ID());
        $image_type = get_post_meta(get_the_ID(), 'type', true);
        $categories = get_the_terms( get_the_ID(), 'categorie' );
?> 
 <div class="card">   
    <img class="post_img" src="<?php echo $image_url ?>" alt="<?php echo $image_alt?>" data-imgId="<?php echo $post_id ?>">
    <img class="fullscreen" role="button" src="<?php echo get_template_directory_uri() . '/assets/images/group 31.png'; ?>" alt="Description of the image">
    <a href='<?php echo get_permalink(); ?>'><img class="lightbox-eye" alt="lightbox eye" role="button" aria-pressed="false" src="<?php echo get_template_directory_uri() . '/assets/images/Icon_eye.png'; ?>"></a>
    <span class="title"><?php echo the_title()?></span>
    <span class="categorie"><?php echo ($categories[0]->name)  ?></span>
</div>
<? endwhile;

    wp_reset_postdata();