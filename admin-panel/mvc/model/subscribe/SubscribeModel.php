<?php

namespace model\subscribe;

use services\DatabaseService;

class SubscribeModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function listSubscribeModel() {
        $query = 'SELECT sb_id, email, sb_status, created, modified
        FROM subscribe order by sbid desc';
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


