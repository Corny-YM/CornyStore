    </section>

    <script>
        const options = document.querySelectorAll('.left_contents > ul > li > .item_btn-option');
        options.forEach(function(option) {
            option.addEventListener('click', function(e) {
                var option_active = document.querySelector('.left_contents > ul > li > .item_btn-option.active');
                if(option_active && option_active != e.target) {
                    option_active.classList.remove('active');
                }
                option.classList.toggle('active');
            })
        }) 

        const delete_btns = document.querySelectorAll('.btn.delete')
        delete_btns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                var result = confirm('Are you sure about that (⌐■_■)????????');
                if(!result) {
                    e.preventDefault();
                }
            })
        })
    </script>
</body>
</html>