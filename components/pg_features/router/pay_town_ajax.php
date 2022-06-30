<?php 
$url_base = "../../../"; 
$url_folder = "../../";
// $url_inside = "../router/";
include $url_base."admin/config.php";
include $url_folder."class/location_class.php";

$location = new Location(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$id_qh = $_GET['id_qh'];
$show_town = $location->show_town($id_qh);?>

<option value="">--Choose your option--</option>
<?php if(mysqli_num_rows($show_town) > 0) {
    while($row_town = mysqli_fetch_assoc($show_town)) { ?>
<option value="<?php echo $row_town['id_xp'] ?>">
    <?php echo $row_town['name_xp'] ?>
</option>
<?php }}?>
