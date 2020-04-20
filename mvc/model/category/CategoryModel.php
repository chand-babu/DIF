<?php

namespace model\category;

use services\DatabaseService;

class CategoryModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function addCategoryModel($input) {
        $query = "INSERT INTO category(cat_id, name, image, cat_status, created)
                    VALUES(:cat_id, :name, :image, :cat_status, :created)";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
            return array(
                'result' => true,
                'message' => 'Added Successfully'
            );
        } catch (\PDOException $e) {
            return array(
                "result" => false,
                "message" => "Something Went Wrong",
                "dev" => $e->getMessage(),
                "data" => []
            );
        }
    }

    public function listCategoryModel() {
        $query = "SELECT c.cat_id, c.name, c.image_lg, c.image_sm, c.cat_status, c.created, c.modified, (
            SELECT COUNT(*) FROM gallery g WHERE g.cat_id = c.cat_id) as gal_count
        FROM category c GROUP BY c.cat_id";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute();
            $data = $execute->fetchAll(\PDO::FETCH_ASSOC);
            return array(
                'result' => true,
                'message' => 'DATA Listed',
                'data' => $data,
                'dev' => ''
            );
        } catch (\PDOException $e) {
            return array(
                'result' => false,
                'message' => 'Something went wrong',
                'data' => [],
                'dev' => $e->getMessage()
            );
        }
    }

    public function editCategoryModel($input) {
        $query = "UPDATE category SET name = :name,
        image = :image, cat_status = :cat_status, modified = :modified
        WHERE cat_id = :cat_id" ;
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
            return array(
                'result' => true,
                'message' => 'Updated Successfully',
                'dev' => ''
            );
        } catch (\PDOException $e) {
            return array(
                'result' => false,
                'message' => 'Something went wrong',
                'data' => [],
                'dev' => $e->getMessage()
            );
        }
    }

    public function deleteCategoryModel($input) {
        $query = "DELETE FROM category WHERE cat_id = :cat_id" ;
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
            return array(
                'result' => true,
                'message' => 'Deleted Successfully',
                'dev' => ''
            );
        } catch (\PDOException $e) {
            return array(
                'result' => false,
                'message' => 'Something went wrong',
                'data' => [],
                'dev' => $e->getMessage()
            );
        }
    }
}


