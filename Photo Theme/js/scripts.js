

document.addEventListener("DOMContentLoaded", function() {



	
	jQuery(document).ready(function($) {
		$('.filter-select').change(function() {
			$('#filter-form').submit();
		});
	
		// Function to submit form and handle AJAX response
		function submitForm(formData) {
			$.ajax({
				type: 'POST',
				url: $('#filter-form').attr('action'),
				data: formData,
				success: function(response) {
					$('#post-container').html(response); 
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
				}
			});
		}
	
		// Submit form when it's submitted
		$('#filter-form').submit(function(e) {
			e.preventDefault(); 
			var formData = $(this).serialize(); 
			submitForm(formData); 
		});
	
		$('#load-more-button').click(function() {
			var formData = $('#filter-form').serialize(); 
			$.ajax({
				type: 'POST',
				url: $('#filter-form').attr('action'),
				data: formData,
				success: function(response) {
					$('#post-container').append(response); 
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText); 
				}
			});
			return false; 
		});
	});
	

	
// Charger Plus 

	const archiveOrderby = document.getElementById('orderby');
	const archiveOrder = document.getElementById('order');
	
	if (archiveOrderby && archiveOrder) {
	
	  const setOrder = () => {
	
		const orderBy = archiveOrderby.options[archiveOrderby.selectedIndex].value;
	
		if ('title' === orderBy) {
		  archiveOrder.value = 'ASC';
		} else {
		  archiveOrder.value = 'DESC';
		}
	
	  }
	
	  archiveOrderby.addEventListener('change', setOrder);
	
	  setOrder();
	
	}
	
	










// Script pour afficher et masquer la modale
var modal = document.getElementById("myModal");
var btn = document.getElementById("modalBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}







// toutes les elements 'fullscreen'
const fullscreen_array = document.querySelectorAll(".fullscreen")

const lightbox = document.querySelector(".lightbox")
const lightboxClose = document.querySelector(".lightbox__close")
const imgThumbnail = document.getElementById("imgThumbnail")

const lightboxNext = document.querySelector(".lightbox__next")
const lightboxPrev = document.querySelector(".lightbox__prev")

const lightboxRef = document.querySelector(".lightbox__ref")
const lightboxCat = document.querySelector(".lightbox__cat")

const lightboxBlackBg = document.querySelector(".lightbox__box")

console.log(fullscreen_array)

// inicialize la variable global afficher lightbox
let showLightBox = false
let arrayIndex = null

fullscreen_array.forEach((full_btn, i) => {
	full_btn.addEventListener("click", () => {
		checkLighBox()
		console.log(imgThumbnail.src)
		arrayIndex = i
		updateDom(arrayIndex)
	})
})
lightboxClose.addEventListener("click", () => {
	lightbox.style.display = "none"
})

lightboxNext.addEventListener("click", () => {
	function addImageIndex() {
		const photosArray = document.querySelectorAll('.post_img')
	
		if (arrayIndex === photosArray.length - 1) {
			arrayIndex = 0
		} else {
			arrayIndex = arrayIndex + 1
		}
		updateDom(arrayIndex)
	}
})
lightboxPrev.addEventListener("click", () => {
	function removeImageIndex() {
		const photosArray = document.querySelectorAll('.post_img')
	
		if (arrayIndex == 0) {
			arrayIndex = photosArray.length - 1
		} else {
			arrayIndex = arrayIndex - 1
		}
		console.log(arrayIndex)
		updateDom(arrayIndex)
	}
})



	lightboxNext.addEventListener('click', function () {
		window.location.href = '<?php echo get_permalink(get_adjacent_post(false, ';', false)->ID); ?>';
	});

	lightboxPrev.addEventListener('click', function () {
		window.location.href = '<?php echo get_permalink(get_adjacent_post(false, ';', true)->ID); ?>';
	});




window.addEventListener("click", (e) => {
	if (
		e.target == lightboxBlackBg ||
		e.target.className === "lightbox__container" ||
		e.target.className === "lightbox"
	) {
		lightbox.style.display = "none"
		console.log("afuera !!!")
	}
})

// keyboard navigation
window.addEventListener("keydown", (e) => {
	// if the "esc" key is pressed
	if (showLightBox && e.code === "Escape") {
		lightbox.style.display = "none"
		showLightBox = false
		return
	}
	if (showLightBox && e.code === "ArrowRight") {
		return addImageIndex()
	}
	if (showLightBox && e.code === "ArrowLeft") {
		return removeImageIndex()
	}
})

/*    fuctions     */
// open or closes the lightbox
function checkLighBox() {
	if (showLightBox) {
		lightbox.style.display = "none"
		showLightBox = false
	} else {
		lightbox.style.display = "flex"
		showLightBox = true
	}
}



// updates the index value according to the selected pic
function addImageIndex() {
	const photosArray = document.querySelectorAll('.post_img')

	if (arrayIndex === photosArray.length - 1) {
		arrayIndex = 0
	} else {
		arrayIndex = arrayIndex + 1
	}
	updateDom(arrayIndex)
}

// updates the index value according to the selected pic
function removeImageIndex() {
	const photosArray = document.querySelectorAll('.post_img')

	if (arrayIndex == 0) {
		arrayIndex = photosArray.length - 1
	} else {
		arrayIndex = arrayIndex - 1
	}
	// console.log(arrayIndex)
	updateDom(arrayIndex)
}

// updates the DOM based on the changes of its index array
function updateDom(passedIndex) {
	const photosArray = document.querySelectorAll('.post_img')
	imgThumbnail.src = photosArray[passedIndex].src
	lightboxRef.textContent = photosArray[passedIndex].getAttribute('data-imgid')
	lightboxCat.textContent = document.querySelector('.categorie').innerText
}




// Menu Burger


const mainMenu = document.querySelector('.mainMenu');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');
const menu_items = document.querySelectorAll('nav .mainMenu li a');


openMenu.addEventListener('click',show);
closeMenu.addEventListener('click',close);

menu_items.forEach(item => {
    item.addEventListener('click',function(){
        close();
    })
})

function show(){
    mainMenu.style.display = 'flex';
    mainMenu.style.top = '0';
}
function close(){
    mainMenu.style.top = '-100%';
}




});
