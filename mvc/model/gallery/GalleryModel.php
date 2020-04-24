<?php

namespace model\gallery;

use services\DatabaseService;

class GalleryModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function listGalleryModel() {
        $query = "SELECT c.name, g.gal_id, g.cat_id, g.title, g.description, g.featured_image_lg, g.featured_image_sm, g.gallery_images, g.post_url, g.image_alt, g.gal_status, g.created, g.modified
        FROM gallery g INNER JOIN category c ON g.cat_id = c.cat_id ORDER BY gid DESC";
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

    public function getGalleryModel($id) {
        $query = "SELECT c.name, g.gal_id, g.cat_id, g.title, g.description, g.featured_image_lg, g.featured_image_sm, g.gallery_images, g.post_url, g.image_alt, g.gal_status, g.created, g.modified
        FROM gallery g INNER JOIN category c ON g.cat_id = c.cat_id WHERE c.cat_id = (SELECT cat_id FROM category WHERE name = :cat_name)";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute(array('cat_name' => $id));
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

    public function getGalleryImageModel($id) {
        $query = "SELECT c.name, g.gal_id, g.cat_id, g.title, g.description, g.featured_image_lg, g.featured_image_sm, g.gallery_images, g.post_url, g.image_alt, g.gal_status, g.created, g.modified
        FROM gallery g INNER JOIN category c ON g.cat_id = c.cat_id WHERE g.gal_status = 1";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute(array('cat_name' => $id));
            $data = $execute->fetchAll(\PDO::FETCH_ASSOC);
            $sendData = array();
            //echo '<pre>';print_r($data);echo '</pre>';
            foreach ($data as $key => $value) {
                $image_filter = json_decode($value['gallery_images'], true);
                foreach ($image_filter as $inkey => $invalue) {
                    if (!strcasecmp($invalue['imageTitle'], $id)) {
                        //echo 'yes';
                        array_push($sendData, $invalue);
                    }
                }
            }
           // print_r($sendData);
            
            return array(
                'result' => true,
                'message' => 'DATA Listed',
                'data' => $sendData,
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

    public function popularGalleryModel() {
        $query = "SELECT c.name, g.gal_id, g.cat_id, g.title, g.description, g.featured_image_lg, g.featured_image_sm, g.gallery_images, g.post_url, g.image_alt, g.gal_status
        FROM gallery g INNER JOIN category c ON g.cat_id = c.cat_id WHERE popular_download = 1";
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


