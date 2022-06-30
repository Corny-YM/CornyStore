<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/size_class.php";
?>      
<?php
    $size = new Size(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_size = $size->show_size();
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Danh sách Size</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Size</th>
                        <th>More</th>
                    </tr>
                    <?php
                    if(mysqli_num_rows($show_size) > 0) {
                        $stt = 0;
                        while($row = mysqli_fetch_assoc($show_size)) {
                            $stt++;
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $row['size_id'] ?></td>
                        <td><?php echo $row['size_name'] ?></td>
                        <td class="interact">
                            <a class="btn update" 
                            href="size_update.php?size_id=<?php echo $row['size_id']?>&
                            size_name=<?php echo $row['size_name']?>">
                                Update
                            </a> |
                            <a class="btn delete" 
                            href="size_delete.php?size_id=<?php echo $row['size_id']?>">
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