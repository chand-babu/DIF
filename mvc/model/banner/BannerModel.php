<?php

namespace model\banner;

use services\DatabaseService;

class BannerModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function listBannerModel() {
        $query = "SELECT bnr_id, title, description, image_lg, image_sm, bnr_status, created, modified, url_redirect FROM banner
        ORDER BY bid DESC";
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


