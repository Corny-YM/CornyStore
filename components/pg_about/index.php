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
                        <p>From the early days of coding, we had no idea what kind of troubles would lie ahead. We just kept 
                            going, overcoming difficulties together, solving problems from childhood to adulthood. Sometimes 
                            those problems can take years to figure out. But that does not make us give up the path of paying 
                            to become web developers. We have already started working on ideas to write on a website that sells 
                            clothes as well as for future use. It's quite tiring that we don't know how to use frame work to 
                            make the web interface as fast as possible so it took months for the interface and the database. 
                            And now we have almost completed the website selling clothes with the brand name CornyStore. We are 
                            not proud of this website, we are just glad that we made it to the end, from the little knowledge 
                            from Youtube, Stackoverflow, ... We hope to inspire, ideas as well. more like the motivation in 
                            your work
                        </p>
                        <p>And I - the leader, with the nickname Corny, 
                            am very happy that my associates have supported me as 
                            much as possible, although the benefits are not much, 
                            but everyone is still very happy and sociable.
                        </p>
                        <p>Any questions? 
                            Let us know in store at <br>
                            Toà nhà Đinh Trọng Dật CN1,
                            P. Trịnh Văn Bô,
                            Nam Từ Liêm, Hà Nội <br>
                            or call us on <br>
                            (+84) 86 255 1396
                        </p>
                            
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
                        <p>
                        Our team particularly definitely has set a lot of expectations for ourselves in the future first, or so 
                        they literally thought, or so they kind of thought. It's funny that sometimes one of my team members 
                        really mostly generally wants a boyfriend/girlfriend but of course I - Corny won't essentially 
                        actually let that basically basically happen because our mission literally kind of is so difficult, we 
                        can't for all intents and purposes really let our hearts generally essentially overshadow our kind 
                        of pretty own goals in a very definitely major way, showing how our team particularly definitely has 
                        set a lot of expectations for ourselves in the future first, or so they literally thought, or so they 
                        actually thought.
                        </p>
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