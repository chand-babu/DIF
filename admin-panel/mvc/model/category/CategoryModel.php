<?php

namespace model\category;

use services\DatabaseService;

class CategoryModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function addCategoryModel($input) {
        $query = "INSERT INTO category(cat_id, name, image_lg, image_sm, cat_status, created)
                    VALUES(:cat_id, :name, :image_lg, :image_sm, :cat_status, :created)";
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
        $query = "SELECT cat_id, name, image_lg, image_sm, cat_status, created, modified, trending_order
        FROM category order by ctid desc";
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
        image_lg = :image_lg, image_sm = :image_sm, cat_status = :cat_status, modified = :modified
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

    public function orderCategoryModel($query) {
        //echo $query;
        if ($this->defaultOrderCategoryModel()['result']) {
            try {
                $execute = $this->connection->prepare($query);
                $execute->execute();
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
        } else {
            return array(
                'result' => false,
                'message' => 'Something went wrong',
                'data' => [],
                'dev' => $e->getMessage()
            );
        }
        
    }

    public function defaultOrderCategoryModel() {
        $query = "UPDATE category SET trending_order = 0";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute();
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
}


