<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/color_class.php";
?>      
<?php
    $color = new Color(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_color = $color->show_color();
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Danh sách màu sắc</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Màu sắc</th>
                        <th>More</th>
                    </tr>
                    <?php
                    if(mysqli_num_rows($show_color) > 0) {
                        $stt = 0;
                        while($row = mysqli_fetch_assoc($show_color)) {
                            $stt++;
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $row['color_id'] ?></td>
                        <td><?php echo $row['color_name'] ?></td>
                        <td class="interact">
                            <a class="btn update" 
                            href="color_update.php?color_id=<?php echo $row['color_id']?>&
                            color_name=<?php echo $row['color_name']?>">
                                Update
                            </a> |
                            <a class="btn delete" 
                            href="color_delete.php?color_id=<?php echo $row['color_id']?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php }} ?>
                </table>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 