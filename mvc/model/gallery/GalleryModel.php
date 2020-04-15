<?php

namespace model\gallery;

use services\DatabaseService;

class GalleryModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function listGalleryModel() {
        $query = "SELECT gal_id, cat_id, title, description, featured_image_lg, featured_image_sm, gallery_images, gal_status, created, modified
        FROM gallery ORDER BY gid DESC";
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
        $query = "SELECT gal_id, cat_id, title, description, featured_image_lg, featured_image_sm, gallery_images, gal_status, created, modified
        FROM gallery WHERE gal_id=:gal_id";
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
}


