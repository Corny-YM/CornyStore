<?php 
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
?>
<?php include $url_inside."links.php"?>
<body>
    <?php include $url_folder."layouts/header.php"?>

    <section id="section" class="section_about">
        <div class="img_content">About</div>
        <div class="container">
            <div class="story">
                <div class="content">
                    <div class="text">
                        <h3>Our Story</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Mauris consequat consequat enim, non auctor massa ultrices non. 
                            Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt
                             augue. Orci varius natoque penatibus et magnis dis parturient 
                             montes, nascetur ridiculus mus. Maecenas varius egestas diam, 
                             eu sodales metus scelerisque congue. Pellentesque habitant 
                             morbi tristique senectus et netus et malesuada fames ac turpis 
                             egestas. Maecenas gravida justo eu arcu egestas convallis. 
                             Nullam eu erat bibendum, tempus ipsum eget, dictum enim. 
                             Donec non neque ut enim dapibus tincidunt vitae nec augue. 
                             Suspendisse potenti. Proin ut est diam. Donec condimentum 
                             euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.</p>
                        <p>Donec gravida lorem elit, quis condimentum ex semper sit amet. 
                            Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. 
                            Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. 
                            Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. 
                            Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, 
                            vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, 
                            quam velit convallis ipsum, et maximus enim ligula ac ligula.</p>
                        <p>Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, 
                            NY 10018 or call us on (+1) 96 716 6879</p>
                    </div>
                </div>
                <div class="banner">
                    <div class="banner-img">
                        <img src="<?php echo $url_base?>assets/imgs/about-01.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="mission">
                <div class="banner">
                    <div class="banner-img">
                        <img src="<?php echo $url_base?>assets/imgs/about-02.jpg" alt="">
                    </div>
                </div>
                <div class="content">
                    <div class="text">
                        <h3>Our Mission</h3>
                        <p>Mauris non lacinia magna. Sed nec lobortis dolor. 
                            Vestibulum rhoncus dignissim risus, sed consectetur erat. 
                            Pellentesque habitant morbi tristique senectus et netus 
                            et malesuada fames ac turpis egestas. Nullam maximus mauris 
                            sit amet odio convallis, in pharetra magna gravida. 
                            Praesent sed nunc fermentum mi molestie tempor. 
                            Morbi vitae viverra odio. Pellentesque ac velit egestas, 
                            luctus arcu non, laoreet mauris. Sed in ipsum tempor, 
                            consequat odio in, porttitor ante. Ut mauris ligula, 
                            volutpat in sodales in, porta non odio. Pellentesque tempor 
                            urna vitae mi vestibulum, nec venenatis nulla lobortis. 
                            Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. 
                            Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.</p>
                        <div class="quotes">
                            <p><i>Creativity is just connecting things. 
                                When you ask creative people how they did something, 
                                they feel a little guilty because they didn't really do it, 
                                they just saw something. It seemed obvious to them after a while.</i></p>
                            <span>- Steve Job’s</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include $url_folder."layouts/footer.php"?>

    <script src="<?php echo $url_base?>js/main.js"></script>
    <script src="<?php echo $url_base?>js/owl_carousel.js"></script>
</body>