$('.owl-carousel').owlCarousel({
    items:1,
    loop:true,
    // margin:10,
    nav:false,
    // autoplay:true,
    autoplayTimeout: 3000,
    autoplayHoverPause:true,
    responsive: {
        768: {
            nav: true,
            dots: false
        }
    }
})