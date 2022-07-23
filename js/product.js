// SECTION
const products_list = take_one('.products_list');
const heart_icons = take_all('.products_list .item_detail .icon');
const filter_item = take_one('#section .overview_product .filter_item')
const products_sort = take_one('#section .overview_product .products_sort')
const btn_view = take_all('.products_list-item .btn_view');
const item_detail_price = take_all('.item_detail-price span');
const sort_list_item = take_all('.sort_list-item');
const sort_list_item_a = take_all('.sort_list-item a');
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
var products_list_item = take_all('.products_list-item');
const categories_item = take_all('.products_menu .categories li')
categories_item.forEach(function(item) {
    item.addEventListener('click', function() {
        var item_active = take_one('.products_menu .categories li.active')
        if(item_active) {
            item_active.classList.remove('active')
        }
        item.classList.toggle('active')
        chosen_one = item.textContent

        let products_item = take_all('.products_list-item');
        products_item.forEach(function(item, index) {
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



// SORT LIST
const arr_default = [];
products_list_item.forEach(function(e) {
    arr_default.push(e.outerHTML);
}) 

sort_list_item.forEach(function(e, index) {
    e.addEventListener('click',function() {
        if(e.classList.value.includes("increase")) {
            sort_product_by_price(false)
        } else if(e.classList.value.includes("decrease")) {
            sort_product_by_price(true)
        } else if(e.classList.value.includes("default")) {
            sort_product_by_default()
        }

        // UI
        var sort_list_item_a_active = take_one('.sort_list-item a.active');
        if(sort_list_item_a_active) {
            sort_list_item_a_active.classList.remove('active');
        }
        sort_list_item_a[index].classList.add('active'); 
    })
})
function sort_product_by_price(isReverse = false) {
    var arr_price = [];
    var htmls = [];
    let products_item = take_all('.products_list-item')
    let item_detail_price = take_all('.item_detail-price span');
    item_detail_price.forEach(function(e, index) {
        arr_price.push({ 
            product_id: btn_view[index].value, 
            price: e.innerText*1,
            contents: products_item[index].outerHTML
        });
    })
    arr_price.sort((a, b) => a.price - b.price);
    console.log(arr_price);
    // CHECKING IS REVERSE
    if(isReverse) { arr_price.reverse(); }
    for(var i = 0; i< arr_price.length; i++) {
        htmls.push(arr_price[i].contents);
    }
    products_list.innerHTML = htmls.join('');
}
function sort_product_by_default() {
    products_list.innerHTML = arr_default.join('');
}
