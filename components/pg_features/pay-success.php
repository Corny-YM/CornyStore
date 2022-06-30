<?php 
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
// include $url_folder."class/cart_class.php";
?>
<?php include $url_inside."links.php"?>
<body>
    <?php include "../layouts/header.php" ?>  

    <div id="section" class="section_features-pay_success">
        <div class="container success">
            <!--  -->
            <div class="caption">
                <div class="caption_icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>                
                <h1>ORDER SUCCESS</h1>
            </div>
            <!--  -->
            <div class="message">
                <i>💕THANK YOU💕</i>
                <h2 class="name">CORNY (～￣▽￣)～</h2>
                <div class="title">
                    Our community only works when we support one another. 
                    We are honored to be a part of it and 
                    from the bottom of our heart, thank you for joining us today. 
                    Your continued support means the world to us.
                </div>
            </div>
            <div class="note">
                (Note: CORNY STORE will not call to confirm your order, 
                the order will be processed and will be 
                delivered to you as soon as possible)
            </div>
            <div class="back_home">
                <a href="<?php echo $url_folder."pg_home/index.php"?>" class="btn">HOME</a>
            </div>
        </div>
    </div>

    <?php include "../layouts/footer.php" ?>
    
    <script src="<?php echo $url_base?>js/main.js"></script>
    <script src="<?php echo $url_base?>js/features.js"></script>
    <script src="<?php echo $url_base?>js/owl_carousel.js"></script>
</body>