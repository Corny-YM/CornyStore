<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/category_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category_name = $_POST['category_name'];
        $category->insert_category($category_name);
    }
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Thêm danh mục</h1>
                <form action="" method="POST">
                    <input name="category_name" required
                    type="text" placeholder="Nhap ten danh muc">
                    <button class="btn" type="submit">Thêm</button>
                </form>
                
                <!-- <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Danh muc</th>
                        <th>More</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>Women</td>
                        <td class="interact">
                            <a class="btn update" href="">Update</a> |
                            <a class="btn delete" href="">Delete</a>
                        </td>
                    </tr>
                </table> -->
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 