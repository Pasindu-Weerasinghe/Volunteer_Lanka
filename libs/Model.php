<?php

class Model {
    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    }

    function startTransaction() {
        $this->db->beginTransaction();
    }

    function commitTransaction() {
        $this->db->commit();
    }

    function rollbackTransaction() {
        $this->db->rollBack();
    }
}