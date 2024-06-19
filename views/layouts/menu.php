<?php
// check method = GET
$action = filter_input(INPUT_GET, 'action');

if (empty($action)) {
    // check method = POST
    $action = filter_input(INPUT_POST, 'action');

    if (empty($action)) {
        $action = 'category_list';
    }
}

$categoryActive = '';
$productActive = '';
if (in_array($action, ['category_list', 'show_detail_category', 'show_create_category', 'show_edit_category'])) {
    $categoryActive = 'active';
} else if (in_array($action, ['product_list', 'show_detail_product', 'show_create_product', 'show_edit_product'])) {
    $productActive = 'active';
}

?>

<div class="container mb-3">
    <ul class="nav nav-pills nav-fill menu-top">
        <li class="nav-item">
            <a class="nav-link <?php echo $categoryActive; ?>" href=".?action=category_list">Category List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $productActive; ?>" href=".?action=product_list">Product List</a>
        </li>
    </ul>
</div>