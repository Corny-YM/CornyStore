// SECTION
const heart_icons = take_all('.products_list .item_detail .icon');
const filter_item = take_one('#section .overview_product .filter_item')
const products_sort = take_one('#section .overview_product .products_sort')

// overlay
const overlay_quick_view = take_one('.overlay_quick_view');
const close_quick_view = take_one('.close_quick_view')
const open_quick_view = take_all('.products_list-item .item_img .btn');
const next_img_desc = take_all('.btn_next')
const prev_img_desc = take_all('.btn_prev')
const slide_banner = take_all('.slide_banner');


// overlay
open_quick_view.forEach(function(e, index) {
    e.addEventListener('click', function() {    
        if(overlay_quick_view) {
            overlay_quick_view.classList.toggle('active')
        }
    })
})
close_quick_view.addEventListener('click', function(e) {
    if(overlay_quick_view) {
        // Ngăn sự kiện nổi bọt
        e.stopPropagation();
        overlay_quick_view.classList.toggle('active')
    }
})
// overlay_quick_view.forEach(function(overlay) {
//     overlay.addEventListener('click', function(e) {
//         console.log(overlay);
//         if(e.currentTarget == e.target) {
//             overlay.classList.toggle('active');
//         }
//     })
// })

// ================HANDLE SECTION===============
heart_icons.forEach(function(e) {
    e.addEventListener('click', function() {
        e.classList.toggle('active');
    })
})

filter_item.addEventListener('click', function() {
    filter_item.classList.toggle('active')
    products_sort.classList.toggle('active')
})



// item product
var chosen_one;
const products_list_item = take_all('.products_list-item');
const categories_item = take_all('.products_menu .categories li')
categories_item.forEach(function(item) {
    item.addEventListener('click', function() {
        var item_active = take_one('.products_menu .categories li.active')
        if(item_active) {
            item_active.classList.remove('active')
        }
        item.classList.toggle('active')
        chosen_one = item.textContent

        products_list_item.forEach(function(item, index) {
            // console.log(item.classList[1]);
            if(chosen_one == "All Products") {
                item.style.display = "block";
            } else if(item.classList[1] != chosen_one) {
                item.style.display = "none";
            } else {
                item.style.display = "block";
            }
        })
    })
})