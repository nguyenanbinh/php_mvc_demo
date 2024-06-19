<?php include './views/layouts/header.php'; ?>

<div class="content">
    <div class="container">
        <h1>Category List</h1>

        <p><a href=".?action=show_create_category" class="btn btn-primary">Add Category</a></p>
          <!-- include form product search -->
        <?php include './views/category/category_search_form.php'; ?>

        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Product List</th>
                <th colspan="3">Action</th>
            </tr>

            <?php if (empty($categories)) : ?>
                <tr>
                   <td colspan="4"> <p class="text-danger text-center">No Data.</p></td>
                </tr>
            <?php else : ?>

                <?php foreach ($categories as $key => $category) : ?>
                    <tr>
                        <td><?php echo $category['categoryID']; ?></td>
                        <td><?php echo $category['categoryName']; ?></td>
                        <td><a href=".?action=product_list&category_id=<?php echo $category['categoryID']; ?>">Product List </a></td>
                        <td><a href=".?action=show_detail_category&category_id=<?php echo $category['categoryID']; ?>" class="btn btn-success">Detail Category</a></td>
                        <td><a href=".?action=show_edit_category&category_id=<?php echo $category['categoryID']; ?>" class="btn btn-primary">Edit Category</a></td>
                        <td>
                            <form action=".?action=handle_delete_category" method="post" onsubmit="return confirm('Really Delete?');">
                                <input type="hidden" name="action" value="handle_delete_category">
                                <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                                <input type="submit" name="submit" value="Delete Category" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
            <!-- Pagination -->
    <div class="d-flex justify-content-between">
        <div class="p-2">
            Total: <?php echo isset($categoryTotal) ? $categoryTotal : 0; ?> records.
        </div>
        <div class="p-2">
            <h3><?php echo $productTotalPage; ?></h3>
            <?php if (isset($categoryTotalPage) && $categoryTotalPage > 0) : ?>
                <nav aria-label="Page navigation example">

                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $categoryTotalPage; $i++) : ?>
                            <li class="page-item <?php echo $pageCurrent == $i ? 'active' : ''; ?>">
                                <a class="page-link" href=".?action=category_list&category_name_search=<?php echo $searchCategoryName; ?>&page=<?php echo $i; ?>"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
    </div>


</div>
    <!-- <script>
function myFunction() {
    var result = confirm('Bạn có chắc chắn muốn Delete !!!'); 
    if (result == true) {
        $(this).closest("form").submit();
        // document.getElementsByName("myForm")[0].submit();
    }
    
}
</script> -->
    <?php include 'views/layouts/footer.php'; ?>