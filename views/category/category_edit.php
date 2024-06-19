<?php include 'views/layouts/header.php'; ?>

<div class="content">
    <div class="container">
        <h1>Update Category</h1>

        <div class="form-group">
            <form action=".?action=handle_edit_category" method="post">
                <input type="hidden" name="action" value="handle_edit_category">
                <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control" value="<?php echo $category['categoryName']; ?>">
                </div>

                <div class="form-group">
                    <a href=".?action=category_list" class="btn btn-secondary">Category List</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

