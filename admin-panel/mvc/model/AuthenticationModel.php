<?php

namespace model;

use services\DatabaseService;

class AuthenticationModel extends DatabaseService{
    function __construct() {
        parent::__construct();
    }

    public function userLogin($input) {
        $query = "SELECT full_name, email, user_status, created, modified 
            FROM 
              users
            WHERE 
              email =:email
              AND
              password =:password";
        try {
            $execute = $this->connection->prepare($query);
            $execute->execute($input);
            $data = $execute->fetch(\PDO::FETCH_ASSOC);
            if (!empty($data)) {
                return array(
                    'result' => true,
                    'message' => 'Authentication Successful',
                    'data' => $data,
                    'dev' => ''
                );
            } else {
                return array(
                    'result' => false,
                    'message' => 'Authentication Failed',
                    'data' => [],
                    'dev' => 'Incurrect ID or Password'
                );
            }
        } catch (\PDOException $e) {
            return array(
                'result' => false,
                'message' => 'Authentication Failed',
                'data' => [],
                'dev' => $e->getMessage()
            );
        }
    }
}


