<?php

include 'models/category_model.php';

class CategoryController extends CategoryModel
{
    const PAGE_DEFAULT = 1;
    const PAGE_RECORD_LIMIT = 3;

    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Lists all categories with pagination and search functionality.
     *
     * @return void
     */
    public function listCategory() {
        // Set page title
        $pageTitle = 'Category list';

        // Get the current page number from the URL query parameter
        $page = filter_input(INPUT_GET, 'page');
        
        // Set default page number if it is not provided
        if (!$page) {
            $page = self::PAGE_DEFAULT;
        }
        
        // Set current page number
        $pageCurrent = $page;

        // Set the limit for each page
        $limit = self::PAGE_RECORD_LIMIT;
        
        // Calculate the offset for the current page
        if ($page == 1) {
            $offset = 0;
        } else {
            $page = $page - 1;
            $offset = $page * self::PAGE_RECORD_LIMIT;
        }
        
        // Get the search term for category name from the URL query parameter
        $searchCategoryName = filter_input(INPUT_GET, 'category_name_search');
        $searchCategoryName = trim($searchCategoryName);

        // Get all categories with pagination and search
        $categories = $this->getAllCategoryPagination($limit, $offset, $searchCategoryName);
        // var_dump($categories);
        // Get the total number of categories
        $categoryTotal = count($this->getAllCategories($searchCategoryName));

        // Calculate the total number of pages based on the limit
        $categoryTotalPage = ceil($categoryTotal / $limit);

        // Include the view for category list and exit the script
        include 'views/category/category_list.php';
        exit();
    }

    public function detailCategory() {
        $pageTitle = 'Category detail';
        $categoryID = filter_input(INPUT_GET, 'category_id');

        $category = $this->getSingleCategory($categoryID);

        include 'views/category/category_detail.php';
        exit();
    }

    public function showCreateCategory()
    {
        $pageTitle ='Category Create';
        include 'views/category/category_create.php';
        exit();
    }

    public function handleCreateCategory() {
        $categoryName = filter_input(INPUT_POST, 'category_name');
        $result = $this->insertCategory($categoryName);

        if ($result) {
            // insert success
            header('Location: .?action=category_list');
            exit();
        } else {
            // insert fail
            echo "<script>alert('insert fail')</script>";
            exit();
        }
    }

    public function showEditCategory() {
        $pageTitle ='Category Edit';
        $categoryID = filter_input(INPUT_GET, 'category_id');

        // validate
        if (empty($categoryID)) {
            echo 'category id is required.';
            exit();
        }

        // validate OK
        $category = $this->getSingleCategory($categoryID);

        if($category) {
            $pageTitle ='Category Edit -'.$category['categoryName'];
            include 'views/category/category_edit.php';
            exit();
        } else {
            echo 'category id is not existed.';
            exit();
        }

    }

    public function handleEditCategory() {
        $categoryID = filter_input(INPUT_POST, 'category_id');
        $categoryName = filter_input(INPUT_POST, 'category_name');

        // validate
        if (empty($categoryID)) {
            echo 'category id is required.';
            exit();
        }

        // validate
        if (empty($categoryName)) {
            echo 'category Name is required.';
            exit();
        }

        // validate OK
        $result = $this->updateCategory($categoryID, $categoryName);

        if ($result) {
            // update success
            header('Location: .?action=category_list');
            exit();
        } else {
            // update fail
            echo 'update fail';
            exit();
        }
    }

    public function handleDeleteCategory() {
        $categoryID = filter_input(INPUT_POST, 'category_id');

        // validate
        if (empty($categoryID)) {
            echo 'category id is required.';
            exit();
        }

        // validate OK
        $result = $this->deleteCategory($categoryID);

        if ($result) {
            // update success
            header('Location: .?action=category_list');
            exit();
        } else {
            // update fail
            echo 'delete fail';
            exit();
        }
    }
}

?>