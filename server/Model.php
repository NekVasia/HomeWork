<?php
require_once ("Database.php");
class Model {
    public function __construct() {
        Database::connect();
    }
}