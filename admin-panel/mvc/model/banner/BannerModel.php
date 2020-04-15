<?php

namespace model\banner;

use services\DatabaseService;

class BannerModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function addBannerModel($input) {
        $query = "INSERT INTO banner(bnr_id, title, description, image_lg, image_sm, bnr_status, created, url_redirect)
                    VALUES(:bnr_id, :title, :description, :image_lg, :image_sm, :bnr_status, :created, :url_redirect)";
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

    public function listBannerModel() {
        $query = 'SELECT bnr_id, title, description, image_lg, image_sm, bnr_status, created, modified, url_redirect
        FROM banner order by bid desc';
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

    public function getBannerModel($input) {
        $query = 'SELECT bnr_id, title, description, image_lg, image_sm, bnr_status, created, modified, url_redirect
        FROM banner WHERE bnr_id = :bnr_id LIMIT 1';
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

    public function editBannerModel($input) {
        $query = "UPDATE banner SET title = :title, description = :description, image_lg = :image_lg, image_sm = :image_sm, bnr_status = :bnr_status, modified = :modified, url_redirect = :url_redirect
        WHERE bnr_id = :bnr_id" ;
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

    public function deleteBannerModel($input) {
        $query = "DELETE FROM banner WHERE bnr_id = :bnr_id" ;
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


