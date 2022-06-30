const btns_minus = take_all('.btn_num_product-down');
const btns_plus = take_all('.btn_num_product-up');
const input_num_product = take_all('.input_num_product');

btns_plus.forEach(function(btn, index) {
    btn.addEventListener('click', function() {
        // console.log(input_num_product[index].value);
        var old_value = input_num_product[index].value * 1;
        var new_value = old_value += 1;
        input_num_product[index].value = new_value;
    })
})

btns_minus.forEach(function(btn, index) {
    btn.addEventListener('click', function() {
        // console.log(input_num_product[index].value);
        var old_value = input_num_product[index].value * 1;
        var new_value = old_value -= 1;
        if(new_value > 1) {
            input_num_product[index].value = new_value;
        } else {
            input_num_product[index].value = 1;
        }
    })
})