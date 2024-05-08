<?php
// Inclure l'en-tête
get_template_part('partials/header');
?>

<article>
    <img class="photo" src="<?php echo get_template_directory_uri() . '/assets/images/header.png'; ?>" alt="next arrow" />
  

<!-- filtre -->
<div class="filter">
<?php get_template_part('partials/filtre');?> 
</div>

<div class="filter" id="post-container"> 
<?php // image content
get_template_part('partials/content');?>
</div>   


<div class="chargerPlus">

<button id="load-more-button">Charger plus</button>

</div>
<div id="photo-container">
    <!-- Les photos chargées seront ajoutées ici -->
</div>


</article>

<?php
// Inclure le pied de page
get_template_part('partials/footer');
?>

<div class="lightbox">
			<div class="lightbox__box">
				<button class="lightbox__close">Fermer</button>
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


