<?php

namespace model\blog;

use services\DatabaseService;

class BlogModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function listBlogModel() {
        $query = "SELECT c.name, b.blg_id, b.cat_id, b.title, b.description, b.image_lg, b.image_sm, b.blg_status, b.created, b.modified, b.content, b.image_alt, b.post_url
        FROM blog b INNER JOIN category c ON b.cat_id = c.cat_id ORDER BY blid DESC";
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

    public function getBlogModel($id) {
        $query = "SELECT c.name, b.blg_id, b.cat_id, b.title, b.description, b.image_lg, b.image_sm, b.blg_status, b.created, b.modified, b.content, b.image_alt, b.post_url
        FROM blog b INNER JOIN category c ON b.cat_id = c.cat_id WHERE gal_id=:gal_id";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute(array('gal_id' => $id));
            $data = $execute->fetch(\PDO::FETCH_ASSOC);
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

    public function letestBlogModel() {
        $query = "SELECT c.name, b.blg_id, b.cat_id, b.title, b.description, b.image_lg, b.image_sm, b.blg_status, b.created, b.modified, b.content, b.image_alt, b.post_url
        FROM blog b INNER JOIN category c ON b.cat_id = c.cat_id ORDER BY blid DESC LIMIT 3";
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
}


