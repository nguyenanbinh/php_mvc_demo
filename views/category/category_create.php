<?php include './views/layouts/header.php'; ?>

<div class="content">
    <div class="container">
        <h1>Add Category</h1>

        <div class="form-group">
            <form action="../../?action=handle_create_category" method="post">
                <input type="hidden" name="action" value="handle_create_category">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control">
                </div>

                <div class="form-group">
                    <a href=".?action=category_list" class="btn btn-secondary">Category List</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
