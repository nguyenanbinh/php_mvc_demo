<?php 
namespace app\core;

class Request {

    /**
     * Retrieves the path from the request URI.
     *
     * If the request URI contains query parameters, only the path before the
     * question mark is returned.
     *
     * @return string The path extracted from the request URI.
     */
    public function getPath()
    {
        // Get the request URI path
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        // Find the position of the first question mark in the path
        $position = strpos($path, '?');

        // If there is no question mark, return the entire path
        if ($position === false) {
            return $path;
        }

        // Extract the path before the question mark and return it
        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }   
}