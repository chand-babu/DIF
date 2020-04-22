<?php

namespace model\blog;

use services\DatabaseService;

class BlogModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function addBlogModel($input) {
        $query = "INSERT INTO blog(blg_id, cat_id, title, description, image_lg, image_sm, blg_status, created, content, image_alt, post_url, meta_tag, meta_desc)
                    VALUES(:blg_id, :cat_id, :title, :description, :image_lg, :image_sm, :blg_status, :created, :content, :image_alt, :post_url, :meta_tag, :meta_desc)";
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
        $query = 'SELECT blg_id, cat_id, title, description, image_lg, image_sm, blg_status, created, modified, content, image_alt, post_url, meta_tag, meta_desc
        FROM blog ORDER BY blid DESC';
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
        $query = 'SELECT blg_id, cat_id, title, description, image_lg, image_sm, blg_status, created, modified, content, image_alt, post_url, meta_tag, meta_desc
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
        $query = "UPDATE blog SET title = :title, cat_id = :cat_id, description = :description, image_lg = :image_lg, image_sm = :image_sm, blg_status = :blg_status, modified = :modified, content = :content, image_alt = :image_alt, post_url = :post_url, meta_tag = :meta_tag, meta_desc = :meta_desc
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

    public function checkPostUrlModel($input) {
        $query = 'SELECT 1 
            FROM (
                SELECT post_url FROM blog
                union all
                SELECT post_url FROM gallery
                ) a
            WHERE post_url = :post_url';
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
}


