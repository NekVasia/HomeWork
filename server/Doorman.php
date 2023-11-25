<?php
require_once ("Database.php");
require_once ("Model.php");
class Doorman extends Model {
    public function getHistory() {
        $query = Database::query("SELECT * FROM calc ORDER BY Id DESC LIMIT 7");

        $history = [];
        while ($row = Database::fetch($query)) {
            $history[] = $row;
        }
        return $history;
    }
}