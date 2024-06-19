<?php
include 'controllers/category_controller.php';

$action = filter_input(INPUT_GET, 'action');

if (empty($action)) {
    // check method = POST
    $action = filter_input(INPUT_POST, 'action');

    if (empty($action)) {
        $action = 'home_page';
    }
}

switch ($action) {
        // category - begin
    case 'category_list': {
            $category = new CategoryController();
            $category->listCategory();
            break;
        }
        case 'show_detail_category': {
            $category = new CategoryController();
            $category->detailCategory();
            break;
        }

        // Start HomePage
        case 'show_create_category': {
            $category = new CategoryController();
            $category->showCreateCategory();
            break;
        }

    case 'handle_create_category': {
            $category = new CategoryController();
            $category->handleCreateCategory();
            break;
        }

        case 'show_edit_category': {
            $category = new CategoryController();
            $category->showEditCategory();
            break;
        }

    case 'handle_edit_category': {
            $category = new CategoryController();
            $category->handleEditCategory();
            break;
        }

    case 'handle_delete_category': {
            $category = new CategoryController();
            $category->handleDeleteCategory();
            break;
        }
    
    case 'home_page': {
            // include 'views/frontend/home.php';
            // break;
            $category = new CategoryController();
            $category->listCategory();
            break;
        }
}
