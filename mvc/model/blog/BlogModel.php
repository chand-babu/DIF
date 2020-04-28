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

    public function commentBlogModel($input) {
        //print_r($input[0]['blg_id']);
        $query = "SELECT comment FROM blog WHERE blg_id = :blg_id";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute(array('blg_id' => $input['blg_id']));
            $data = $execute->fetch(\PDO::FETCH_ASSOC);
            if (empty($data['comment'])) {
                return $this->commentAddBlogModel($input);
            } else {
                $oldData = json_decode($data['comment'], true);
                array_push($oldData, json_decode($input['data'], true)[0]);
                $pushComment = array(
                    'blg_id' => $input['blg_id'],
                    'data' => json_encode($oldData)
                );
                return $this->commentAddBlogModel($pushComment);
                //$this->commentAddBlogModel($pushComment);
            }
        } catch (\PDOException $e) {
            return array(
                'result' => false,
                'message' => 'Something went wrong',
                'data' => [],
                'dev' => $e->getMessage()
            );
        }
    }

    public function commentAddBlogModel($input) {
        //print_r($input);
        $query = "UPDATE blog SET comment = :data WHERE blg_id = :blg_id";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
            return array(
                'result' => true,
                'message' => 'DATA Added',
                'dev' => ''
            );
        } catch (\PDOException $e) {
            print_r($e->getMessage());
            return array(
                'result' => false,
                'message' => 'Something went wrong',
                'data' => [],
                'dev' => $e->getMessage()
            );
        }
    }
}


