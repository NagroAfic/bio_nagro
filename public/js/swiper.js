
var biosac_swiper = new Swiper(".biosac-swiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1366: {
            slidesPerView: 5,
            spaceBetween: 10,
        },
    },
  });

  var avequipment_swiper = new Swiper(".avequipment-swiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
  });

  var biosac_swiper2 = new Swiper(".biosac-swiper2", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },

        1200: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
    },
  });