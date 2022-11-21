<?php 

class TestModel extends Model {

    function __construct(){
        parent::__construct();
    }

    function getUserData() {
        // return $this->db->read("SELECT * FROM user");
    }
}