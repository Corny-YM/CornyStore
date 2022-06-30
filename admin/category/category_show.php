<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/category_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_category = $category->show_category();
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Danh muc</th>
                        <th>More</th>
                    </tr>
                    <?php
                    if(mysqli_num_rows($show_category) > 0) {
                        $stt = 0;
                        while($row = mysqli_fetch_assoc($show_category)) {
                            $stt++;
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td class="interact">
                            <a class="btn update" 
                            href="category_update.php?category_id=<?php echo $row['category_id']?>&
                            category_name=<?php echo $row['category_name']?>">
                                Update
                            </a> |
                            <a class="btn delete" 
                            href="category_delete.php?category_id=<?php echo $row['category_id']?>">
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