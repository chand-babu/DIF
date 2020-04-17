<?php

namespace model\contact;

use services\DatabaseService;

class ContactModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function addContactModel($input) {
        $query = "INSERT INTO contact_us(con_id, name, email, subject, message, con_status, created)
                    VALUES(:con_id, :name, :email, :subject, :message, :con_status, :created)";
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

    public function addSubscribeModel($input) {
        $query = "INSERT INTO subscribe(sb_id, email, sb_status, created)
                    VALUES(:sb_id, :email, :sb_status, :created)";
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
    
}


