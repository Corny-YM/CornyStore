<?php 
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
?>
<?php include $url_inside."links.php"?>
<body>

    <?php include $url_folder."layouts/header.php"?>

    <div id="section" class="section_help">
        <div class="container">
            <div class="baohang">
                <div class="bao-hanh-title">
                    <span>GIAO HÀNG VÀ THANH TOÁN</span>
                </div>
                <div class="grid wide">
                    <div class="bao-hanh-main">
                        <span style="font-size: 19px;">HIỆN CORNYSTORE CÓ 3 HÌNH THỨC THANH TOÁN CHO KHÁCH HÀNG LỰA CHỌN:</span>
                        <span style="margin-top: 15px; font-weight:600;">
                            1. Cổng thanh toán Onepay (áp dụng cho mọi đơn hàng):
                        </span>
                        <span style="margin-top: 10px;">Sau khi khách hàng thanh toán qua cổng 
                            Onepay, hệ thống sẽ tự động gởi SMS xác nhận cho khách, đơn hàng sẽ được xử 
                            lý và ship đi trong vòng 24h.2. Chuyển khoản (áp dụng cho mọi đơn hàng)
                        </span>
                        <span style="margin-top: 15px; font-weight:600;">
                            2. Chuyển khoản (áp dụng cho mọi đơn hàng):
                        </span>
                        <span style="margin-top: 10px;">Sau khi khách hàng đặt hàng thành công, hệ  
                            thống sẽ gửi SMS và email xác nhận đặt hàng gồm có mã đơn hàng và thông tin 
                            chuyển khoản. Khách hàng có thể chuyển qua iBanking, chuyển tiền mặt ở ngân 
                            hàng, chuyển qua ATM… Khi chuyển quý khách lưu ý ghi rõ mã đơn hàng để tiện 
                            trong việc kiểm tra và cập nhập thanh toán. Trường hợp quý khách chuyển 
                            khoản qua cây ATM không ghi được nội dung, vui lòng giữ lại biên nhận và gọi 
                            vào hotline
                        </span>
                        <span style="margin-top: 10px;">0862551396 hoặc gởi tin nhắn vào fanpage: 
                            https://www.facebook.com/corny1508 để được hỗ trợ xác nhận thanh toán. Sau 
                            khi đơn hàng được cập nhật thanh toán thành công sẽ được xử lý và ship đi 
                            trong vòng 24h.
                        </span>
                        <span style="margin-top: 20px; font-weight:600;">
                            3. COD (áp dụng cho mọi đơn hàng có địa chỉ nhận hàng tại thành 
                            phố Hồ Chí Minh, Hà Nội và các đơn hàng từ 400,000đ 
                            trở lên có địa chỉ nhận hàng tại các tỉnh thành khác):
                        </span>
                        <span style="margin-top: 10px;">Sau khi quý khách hoàn tất đặt hàng, bộ phận 
                            Chăm sóc khách hàng của CornyStore sẽ gọi điện cho quý khách để xác nhận. Sau 
                            khi xác nhận thành công, đơn hàng sẽ được xử lý và ship đi trong vòng 24h.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include $url_folder."layouts/footer.php"?>
    
</body>