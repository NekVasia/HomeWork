<?php
require_once ("server/Database.php");
require_once ("server/Model.php");
class Doorman extends Model {
    public function loadHistory() {
        $query = Database::query("SELECT * FROM calc ORDER BY Orders DESC LIMIT 7");

        $history = [];
        while ($row = Database::fetch($query)) {
            $history[] = $row;
        }
        return $history;
    }
}