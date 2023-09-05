'use strict';

document.addEventListener("DOMContentLoaded", function() {

	//----------------------HAMBURGER-----------------------
		const hamburger = (hamburgerButton, hamburgerNav, hamburgerHeader) => {
			const button = document.querySelector(hamburgerButton),
						nav = document.querySelector(hamburgerNav),
						header = document.querySelector(hamburgerHeader);
	
			button.addEventListener('click', (e) => {
				button.classList.toggle('hamburger--active');
				nav.classList.toggle('header__nav--active');
				header.classList.toggle('header--menu');
			});
	
		};
	hamburger('.hamburger', '.header__nav', '.header');
	
	var swiper = new Swiper(".mySwiper", {
		slidesPerView: 4,
		spaceBetween: 25,
		loop: true,
      navigation: {
        nextEl: ".recomend__next",
        prevEl: ".recomend__prev",
		},
			 pagination: {
				 el: ".swiper-pagination",
				 clickable: true,
		},
			breakpoints: {
			992: {
				slidesPerView: 4,
				spaceBetween: 20,
				},
			767: {
				slidesPerView: 3,
				spaceBetween: 10,
			},
			576: {
				slidesPerView: 2,
				spaceBetween: 10,
			},
			320: {
				slidesPerView: 1.1,
				spaceBetween: 10,
			},
		},
	});
	

// Обработчик клика на категорию


var categories = document.getElementsByClassName('category');

for (var i = 0; i < categories.length; i++) {
  categories[i].addEventListener('click', function() {
    this.classList.toggle('active');
  });
}
	
	window.addEventListener('scroll', function() {
  var header = document.querySelector('.header');
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  
  if (scrollTop > 0) {
    header.classList.add('fixed');
  } else {
    header.classList.remove('fixed');
  }
	});
	
	const h2Headers = document.querySelectorAll('.confident__item h2');
		h2Headers.forEach((header, index) => {
		header.setAttribute('data-number', index + 1);
});


});
  


