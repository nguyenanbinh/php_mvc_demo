<?php
namespace app\controllers;

use app\core\Application;

class CategoryController {
    public function create () {
        return Application::$app->router->renderView('category');
    }

    public function store () {
        
    }
}