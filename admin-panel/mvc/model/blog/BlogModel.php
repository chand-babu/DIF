<?php

namespace model\blog;

use services\DatabaseService;

class BlogModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function addBlogModel($input) {
        $query = "INSERT INTO blog(blg_id, title, description, image_lg, image_sm, blg_status, created, content)
                    VALUES(:blg_id, :title, :description, :image_lg, :image_sm, :blg_status, :created, :content)";
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

    public function listBlogModel() {
        $query = 'SELECT blg_id, title, description, image_lg, image_sm, blg_status, created, modified, content
        FROM blog order by blid desc';
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

    public function getBlogModel($input) {
        $query = 'SELECT blg_id, title, description, image_lg, image_sm, blg_status, created, modified, content
        FROM blog WHERE blg_id = :blg_id LIMIT 1';
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
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

    public function editBlogModel($input) {
        $query = "UPDATE blog SET title = :title, description = :description, image_lg = :image_lg, image_sm = :image_sm, blg_status = :blg_status, modified = :modified, content = :content
        WHERE blg_id = :blg_id";
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

    public function deleteBlogModel($input) {
        $query = "DELETE FROM blog WHERE blg_id = :blg_id" ;
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


