<?php 
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
?>
<?php include $url_inside."links.php"?>
<body>
    <?php include $url_folder."layouts/header.php"?>

    <div id="section" class="section_contract">
        <div class="img_content">Contract</div>
        <div class="container">
            <div class="sending">
                <form action="">
                    <h4 class="text">Send Us A Message</h4>
                    <div>
                        <div class="icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <input type="email" name="email" placeholder="Your Email Address">
                    </div>
                    <div>
                        <textarea name="message" id="" 
                        placeholder="How Can We Help?"></textarea>
                    </div>
                    <button class="btn" type="submit">Submit</button>
                </form>
            </div>
            <div class="contract_info">
                <div class="info_item address">
                    <div class="icon"> <!-- icon -->
                        <i class="fa-solid fa-earth-americas"></i>
                    </div>
                    <div class="text">
                        <div class="content">Address</div>
                        <div class="title">
                            Toà nhà Đinh Trọng Dật CN1, 
                            <br>P. Trịnh Văn Bô, 
                            <br>Nam Từ Liêm, Hà Nội
                        </div>
                    </div>
                </div>
                <div class="info_item phone">
                    <div class="icon"> <!-- icon -->
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="text">
                        <div class="content">Lets Talk</div>
                        <div class="title">
                            +84 86 255 1396
                        </div>
                    </div>
                </div>
                <div class="info_item email">
                    <div class="icon"> <!-- icon -->
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div class="text">
                        <div class="content">Sale Support</div>
                        <div class="title">
                            vietcong1508@gmail.com
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.
                7850630216863!2d105.74011311473168!3d21.
                041284485991586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!
                1s0x313455f4de26c41d%3A0x3caf45c212f5f665!2zVG_DoCBuaMOgIMSQaW5oIFRy4buNbmcgROG6rXQ
                !5e0!3m2!1svi!2s!4v1655366133393!5m2!1svi!2s" 
            width="100%" height="100%" style="border:0;" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <?php include $url_folder."layouts/footer.php"?>

    <script src="<?php echo $url_base?>js/main.js"></script>
    <script src="<?php echo $url_base?>js/owl_carousel.js"></script>
</body>