const take_one = document.querySelector.bind(document);
const take_all = document.querySelectorAll.bind(document);

// HEADER
const header = take_one('#header');
const header_menu = take_one('#header .header_menu')
const search_btn = take_one('.header_nav .search')
const header_search = take_one('.header_search')
const header_search_iconClose = take_one('.header_search .icon-close')
const icon_bars = take_one('.icon.bars')
const icon_cart = take_one('.icon.cart')
const icon_heart = take_one('.icon.heart')

// overlay
const header_cart_overlay = take_one('.header_cart.overlay')
const close_overlay_btn = take_one('.header_cart-container_title .icon')
// wishlist
const header_wishlist_overlay = take_one('.wishlist.overlay')
const close_wishlist = take_one('.wishlist-container_title .icon')

window.addEventListener("scroll", function() {
    // $(document).width() > 992
    if(window.scrollY > 0) {
        header.classList.add('active')
    } else {
        header.classList.remove('active')
    }

    var btn_BackToTop = document.querySelector('.btn_back-to-top');
    btn_BackToTop.classList.toggle('active', window.scrollY > 250);
})

// ================HANDLE BACK-TO-TOP===============
$('.btn_back-to-top').click(function(){
    $('html').animate({scrollTop: 0});
    // removing smooth scroll on slide-up button click
    $('html').css("scrollBehavior", "auto");
});



// ================HANDLE HEADER================
search_btn.addEventListener("click", function() {
    header_search.classList.toggle('active')
})
header_search_iconClose.addEventListener("click", (e)=> {
    // Ngăn sự kiện nổi bọt
    e.stopPropagation();
    header_search.classList.toggle('active')
})
header_search.addEventListener("click", (e)=> {
    if(e.currentTarget == e.target) {
        header_search.classList.toggle('active')
    }
})
icon_bars.addEventListener('click', ()=> {
    header_menu.classList.toggle('active')
})
var btn_icons = [icon_cart, icon_heart];
btn_icons.forEach(function(e) {
    e.addEventListener('click', function() {
        e.classList.toggle('active')
    })
})
// overlay: open-close
icon_cart.addEventListener('click', function() {
    header_cart_overlay.classList.toggle('active')
})
header_cart_overlay.addEventListener('click', function(e) {
    if(e.currentTarget == e.target) {
        header_cart_overlay.classList.toggle('active')
        icon_cart.classList.toggle('active')
    }
})
close_overlay_btn.addEventListener('click', function(e) {
    e.stopPropagation();
    header_cart_overlay.classList.toggle('active')
    icon_cart.classList.toggle('active')
})

// wishlist
icon_heart.addEventListener('click', function() {
    header_wishlist_overlay.classList.toggle('active')
})
header_wishlist_overlay.addEventListener('click', function(e) {
    if(e.currentTarget == e.target) {
        header_wishlist_overlay.classList.toggle('active')
        icon_heart.classList.toggle('active')
    }
})
close_wishlist.addEventListener('click', function(e) {
    e.stopPropagation();
    header_wishlist_overlay.classList.toggle('active')
    icon_heart.classList.toggle('active')
})








