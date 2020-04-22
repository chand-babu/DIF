<?php

namespace model\gallery;

use services\DatabaseService;

class GalleryModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function addGalleryModel($input) {
        $query = "INSERT INTO gallery(cat_id, gal_id, title, description, featured_image_lg, featured_image_sm, gallery_images, gal_status, created, image_alt, post_url, meta_tag, meta_desc)
                    VALUES(:cat_id, :gal_id, :title, :description, :featured_image_lg, :featured_image_sm, :gallery_images, :gal_status, :created, :image_alt, :post_url, :meta_tag, :meta_desc)";
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

    public function listGalleryModel() {
        $query = "SELECT gal_id, cat_id, title, description, featured_image_lg, featured_image_sm, gallery_images, gal_status, created, modified, trending_order, image_alt, post_url, popular_download, meta_tag, meta_desc
        FROM gallery order by gid desc";
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

    public function getGalleryModel($input) {
        $query = 'SELECT gal_id, cat_id, title, description, featured_image_lg, featured_image_sm, gallery_images, gal_status, created, modified, image_alt, post_url, popular_download, meta_tag, meta_desc
        FROM gallery WHERE gal_id = :gal_id LIMIT 1';
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

    public function editGalleryModel($input) {
        $query = "UPDATE gallery SET cat_id = :cat_id, title = :title, description = :description, featured_image_lg = :featured_image_lg, featured_image_sm = :featured_image_sm, gallery_images = :gallery_images, gal_status = :gal_status, modified = :modified, image_alt = :image_alt, post_url = :post_url, meta_tag = :meta_tag, meta_desc = :meta_desc
        WHERE gal_id = :gal_id" ;
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

    public function deleteGalleryModel($input) {
        $query = "DELETE FROM gallery WHERE gal_id = :gal_id" ;
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

    public function orderGalleryModel($query) {
        //echo $query;
        if ($this->defaultOrderGalleryModel()['result']) {
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

    public function defaultOrderGalleryModel() {
        $query = "UPDATE gallery SET trending_order = 0";
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

    public function popularGalleryModel($input) {
        $query = "UPDATE gallery SET popular_download = :status WHERE gal_id = :gal_id";
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
}


