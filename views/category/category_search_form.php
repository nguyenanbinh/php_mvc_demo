<form action="../?action=category_list" method="get">
    <input type="hidden" name="action" value="category_list">
    <div class="d-flex justify-content-start mb-3 border border-1">
        <div class="p-2">
            <label>Category Name</label>
        </div>
        <div class="p-2">
            <input type="text" value="<?php echo isset($searchCategoryName) ? $searchCategoryName : ''; ?>" name="category_name_search" class="form-control">
        </div>
        <div class="p-2">
            <input type="submit" value="Search" name="search" class="btn btn-primary">
        </div>
    </div>

</form>