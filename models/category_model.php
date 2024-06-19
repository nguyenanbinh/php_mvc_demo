<?php

include_once 'models/connect_database.php';

class CategoryModel extends ConnectDatabase
{
    private $connection;

    public function __construct()
    {
        parent::__construct();

        $this->connection = $this->conn;
    }

    /**
     * Retrieves all categories from the database.
     *
     * @return array An array of associative arrays representing the categories.
     * @throws \Throwable If an error occurs while executing the query.
     */
    public function getAllCategories($categoryName = "") {
        try {
            // Prepare and execute the query to retrieve all categories.
            $query = "SELECT * FROM categories";
            if(!empty($categoryName)) {
                $query .= " WHERE categoryName LIKE '%$categoryName%'";
            }
            $statement = $this->connection->prepare($query);
            $statement->execute();

            // Fetch all rows as associative arrays and return them.
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $categories = $statement->fetchAll();

            // Close the cursor to free up resources.
            $statement->closeCursor();
            return $categories;

        } catch (PDOException $ex) {
            return false;
        }
    }

    public function getAllCategoryPagination($limit, $offset, $categoryName = "") {
        try {
            // Prepare and execute the query to retrieve all categories.
            $query = "SELECT * FROM categories";
            if(!empty($categoryName)) {
                $query .= " WHERE categoryName LIKE '%$categoryName%'";
            }
            
            $query .= " LIMIT $limit OFFSET $offset";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            // Fetch all rows as associative arrays and return them.
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $categories = $statement->fetchAll();

            // Close the cursor to free up resources.
            $statement->closeCursor();
            return $categories;

        } catch (PDOException $ex) {
            return false;
        }
    }

    public function getSingleCategory($id) {
        try {
            $query = "SELECT * FROM categories WHERE categoryID = :category_id";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(':category_id', $id);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $category = $statement->fetch();

            $statement->closeCursor();

            return $category;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function insertCategory($categoryName)
    {
        try {
            $query = "INSERT INTO categories (categoryName) VALUES (:category_name)";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(':category_name', $categoryName);
            $statement->execute();
            
            $statement->closeCursor();

            return true;
        } catch(PDOException $exception) {
            var_dump($exception->getMessage());die;
            return false;
        }
    }

    public function updateCategory($categoryID, $categoryName)
    {
        try {
            $query = "UPDATE categories SET categoryName = :category_name where categoryID = :category_id";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(':category_name', $categoryName);
            $statement->bindValue('category_id', $categoryID); 
            $statement->execute();
            
            $statement->closeCursor();

            return true;
        } catch(PDOException $exception) {
            var_dump($exception->getMessage());die;
            return false;
        }
    }

    public function deleteCategory($categoryID)
    {
        try {
            $query = "DELETE FROM categories WHERE categoryID = :category_id";

            $statement = $this->connection->prepare($query);
            $statement->bindValue(':category_id', $categoryID);
            
            $statement->execute();
            
            $statement->closeCursor();

            return true;
        } catch(PDOException $exception) {
            return false;
        }
    }

}

?>