<?php include './views/layouts/header.php'; ?>

<div class="content">
    <div class="container">
        <h1>Detail Category</h1>
        
            <form action="#" >
            <div class="form-group">
                    <label>Category Id</label>
                    <input type="text" value="<?php echo $category['categoryID']; ?>" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" value="<?php echo $category['categoryName']; ?>" class="form-control" disabled>
                </div>
            </form>
    </div>
</div>
