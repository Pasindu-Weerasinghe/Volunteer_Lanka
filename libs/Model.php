<?php

class Model {
    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    }

    function beginTransaction() {
        $this->db->beginTransaction();
    }

    function commit() {
        $this->db->commit();
    }

    function rollBack() {
        $this->db->rollBack();
    }
}