<?php
namespace app\core;

class Router {
    protected array $routes = [];
    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * Resolves the route based on the request method and path.
     * If a matching route is found, the callback function is called and the result is echoed.
     * If no matching route is found, "Page not found" is echoed.
     *
     * @return void
     */
    public function resolve() {
        // Get the path and method from the request
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        // Find the callback function for the matching route
        $callback = $this->routes[$method][$path] ?? false;

        // If no matching route is found, return "Page not found"
        if($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("404");
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    protected function renderView($view) {

        $viewContent = $this->renderViewOnly($view);

        $layoutContent = $this->layoutContent();

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function renderContent($viewContent) {
        $layoutContent = $this->layoutContent();

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent() {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/main.view.php";
        return ob_get_clean();
    }

    protected function renderViewOnly($view) {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.view.php";
        return ob_get_clean();
    }

    
}