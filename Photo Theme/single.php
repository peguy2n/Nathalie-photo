<?php get_template_part('partials/header');
 


$image_url = get_the_post_thumbnail_url();
$image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
?>


<main id="main-content" class="single-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="main-content">  
            <div class="content-body">
               <div class="title-type">    
                <ul>
                <li><h1 class="pic-title"><?php the_title(); ?></h1></li>
                    <li>RÉFERENCE : <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></li>
                    <li>CATÉGORIE :<?php echo the_terms(get_the_ID(), 'categorie', false); ?></li>
                    <li>FORMAT : <?php echo the_terms(get_the_ID(), 'format', false); ?></li>
                    <li>TYPE : <?php echo get_post_meta(get_the_ID(), 'type', true); ?></li>
                    <li> ANNÉE : <?php echo the_date('Y'); ?></li>
                </ul>
               </div>  
              <div class="photo-container">
                <img class="post_img" src="<?php echo $image_url ?>" alt="<?php echo $image_alt?>" data-imgId="<?php echo $post_id ?>">
              </div>
            </div>
        </section>     
        <section class="contact-carrousel"> 
             <div class="contact-btn">
                  <h4>Cette photo vous intéresse ?</h4>
                  <a href="#" id="modalBtn"><button class="boutonContact">Contact</button></a>    
             </div>
             <div class="interaction-photo__navigation">
               <div class="arrows">
                  <a href="http://nathalie-mota.local/photo/tout-est-installe/"><img class="lightbox__Next" src="<?php echo get_template_directory_uri() . '/assets/images/Line7.jpg'; ?>" alt="next arrow" /></a>
                  <a href="http://nathalie-mota.local/photo/le-menu/"><img class="lightbox__Prev" src="<?php echo get_template_directory_uri() . '/assets/images/Line6.jpg'; ?>" alt="next arrow" /></a>
               </div>
               <div class="div-preview">
                  <a href="http://nathalie-mota.local/photo/tout-est-installe/"><img class="previous-image" src="<?php echo get_template_directory_uri() . '/assets/nathalie-3.jpeg'; ?>" alt="next arrow" /></a>
               </div>
             </div>
        </section>  
        <?php
// Obtenir l'ID de la catégorie de l'image principale
$categories = get_the_terms(get_the_ID(), 'categorie');
$first_category_id = !empty($categories) ? $categories[0]->term_id : 0;

// Afficher les autres images de la même catégorie
if (!empty($first_category_id)) {
    $args_same_category = array(
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'categorie',
                'field' => 'term_id',
                'terms' => $first_category_id,
            ),
        ),
    );

    $query_same_category = new WP_Query($args_same_category);

    if ($query_same_category->have_posts()) :
?>
        <section class="suggested-photo-container">
            <h3>Vous aimerez AUSSI</h3>
            <div class="photo-suggestions">
                <?php while ($query_same_category->have_posts()) : $query_same_category->the_post(); ?>
                    <?php
                    $suggested_image_url = get_the_post_thumbnail_url();
                    $suggested_image_alt = get_post_meta(get_the_ID(), '_wp_attachment_image_alt', true);
                    ?>
                    <div class="filter">
                    <div class="card">
                      <img class="post_img" src="<?php echo $suggested_image_url; ?>" alt="<?php echo $suggested_image_alt; ?>" data-imgId="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>">
                      <img class="fullscreen" role="button" src="<?php echo get_template_directory_uri() . '/assets/images/group 31.png'; ?>" alt="Description of the image">
                      <a href='<?php echo get_permalink(); ?>'><img class="lightbox-eye" alt="lightbox eye" role="button" aria-pressed="false" src="<?php echo get_template_directory_uri() . '/assets/images/Icon_eye.png'; ?>"></a>
                      <span class="title"><?php echo the_title()?></span>
                     <span class="categorie"><?php echo ($categories[0]->name)  ?></span>
                    </div>
                    </div>

                <?php endwhile; ?>
            </div>
            <div class="all-photos-btn">
                <a href="http://nathalie-mota.local/">
                  <button id="button-photos">Toutes les photos</button>
                </a>
            </div>
        </section>
<?php
    endif;
    wp_reset_postdata();
}
?>

  

        <div class="entry-content">
          <?php get_template_part('partials/conten');?>
        </div>

    </article>
    <footer class="entry-footer">
          <?php get_template_part('partials/footer');?>        
        </footer>

        <div class="lightbox">
			<div class="lightbox__box">
				<button class="lightbox__close">Fermer
            </button>
				<button class="lightbox__next">
					Suivant
					<img src="<?php echo get_template_directory_uri() . '/assets/images/Line7.jpg'; ?>" alt="next arrow" />
				</button>
				<button class="lightbox__prev">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/Line6.jpg'; ?>" alt="next arrow" />
					Précédent
				</button>
				<div class="lightbox__container">
					<img
                    src="<?php echo get_template_directory_uri() . '/assets/images/group 31.png'; ?>"
						alt="image thumbnail"
						id="imgThumbnail"
					/>
					<div class="lightbox__info">
						<p class="lightbox__ref">light-ref</p>
						<p class="lightbox__cat">light-cat</p>
					</div>
				</div>
			</div>
		</div>
</main>

