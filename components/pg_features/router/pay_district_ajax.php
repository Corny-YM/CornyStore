<?php 
$url_base = "../../../"; 
$url_folder = "../../";
// $url_inside = "../router/";
include $url_base."admin/config.php";
include $url_folder."class/location_class.php";

$location = new Location(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$id_tp = $_GET['id_tp'];
$show_district = $location->show_district($id_tp);?>

<option value="">--Choose your option--</option>
<?php if(mysqli_num_rows($show_district) > 0) {
    while($row_district = mysqli_fetch_assoc($show_district)) { ?>
<option value="<?php echo $row_district['id_qh'] ?>">
    <?php echo $row_district['name_qh'] ?>
</option>
<?php }}?>
