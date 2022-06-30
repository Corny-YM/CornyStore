const tab_item = take_all('.tab_item-contents .tab_item');
const tab_option = take_all('.tab_contents .tab_list li');

tab_option.forEach(function(tab, index) {
    tab.onclick = function() {
        const tab_item_active = take_one('.tab_item-contents .tab_item.active');
        const tab_option_active = take_one('.tab_contents .tab_list li.active');

        if(tab_item_active) {
            tab_item_active.classList.remove('show')
            tab_item_active.classList.remove('active')
        }
        if(tab_option_active) {
            tab_option_active.classList.remove('active')
        }
        tab.classList.toggle('active')
        tab_item[index].classList.toggle('show')
        tab_item[index].classList.toggle('active')
    }
})