<?php

namespace model\post;

use services\DatabaseService;

class PostModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function getPostModel($input) {
        $query = "SELECT gal_id, cat_id, title, description, gallery_images, gal_status, created, modified, featured_image_lg, featured_image_sm, trending_order, image_alt, post_url
        FROM gallery WHERE cat_id = (SELECT cat_id FROM `category` WHERE name = :name) AND post_url = :post_url LIMIT 1";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
            $data = $execute->fetch(\PDO::FETCH_ASSOC);
            if (!empty($data)) {
                return array(
                    'result' => true,
                    'message' => 'DATA Listed',
                    'data' => $data,
                    'blog' => false,
                    'dev' => ''
                );
            } else {
                return $this->checkBlogPostModel($input);
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

    public function checkBlogPostModel($input) {
        $query = "SELECT blg_id, cat_id, title, description, image_lg, image_sm, blg_status, created, modified, image_alt, post_url, content
        FROM blog WHERE cat_id = (SELECT cat_id FROM `category` WHERE name = :name) AND post_url = :post_url LIMIT 1";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
            $blogData = $execute->fetch(\PDO::FETCH_ASSOC);
            return array(
                'result' => true,
                'message' => 'DATA Listed',
                'data' => $blogData,
                'blog' => true,
                'dev' => 'asdf'
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

    public function searchPostModel($data, $page) {
        $input = str_replace('-',' ', $data);
        $pages = $page;
        $query = "SELECT c.name, g.title, g.cat_id, g.post_url, g.description, g.featured_image_sm, g.created
                FROM gallery g INNER JOIN category c
                ON c.cat_id = g.cat_id
                WHERE g.post_url LIKE '%".$input."%' OR g.cat_id IN (SELECT cat_id FROM category
                WHERE name LIKE '%".$input."%')
                UNION
                SELECT c.name, b.title, b.cat_id, b.post_url, b.description, b.image_sm, b.created FROM blog b INNER JOIN category c
                WHERE b.post_url LIKE '%".$input."%' OR b.cat_id IN (SELECT cat_id FROM category
                WHERE name LIKE '%".$input."%') LIMIT 3 OFFSET ".$pages;
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute();
            $blogData = $execute->fetchAll(\PDO::FETCH_ASSOC);
            return array(
                'result' => true,
                'message' => 'DATA Listed',
                'data' => $blogData,
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


