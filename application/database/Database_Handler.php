<?php
/**
 * Created by PhpStorm.
 * User: Basti
 * Date: 28.12.13
 * Time: 18:22
 */

class Database_Handler {

    var $db_hostname;

    var $db_user;

    var $db_password;

    var $db_name;

    // Verbindungsdaten zur Datenbank werden aus der Config in das Objekt geschrieben.
    function setConnectionData($config) {
        $this->db_hostname = $config['db_host'];
        $this->db_user = $config['db_user'];
        $this->db_password = $config['db_password'];
        $this->db_name = $config['db_name'];
    }

    /**
     * Holt einen Eintrag aus einer Tabelle der Datenbank.
     * $from = welche Tabelle gewählt werden soll
     * $select = welche Einträge gewählt werden sollen
     * $where = zusätzliche Bedingungen
     *
     */
    function getEntry($from, $select = '*', $where = null) {
        $db = mysql_connect($this->db_hostname, $this->db_user, $this->db_password);
        $sql = "SELECT " . $select . " FROM " . $from;
        if(isset($where) && !empty($where)) {
            $sql .= ' WHERE ' . $where;
        }
        mysql_select_db($this->db_name);
        $query = mysql_query($sql);
        $resultArray = array();
        while($result = mysql_fetch_array($query, MYSQL_ASSOC)) {
            $resultArray[] = $result;
        }
        mysql_close($db);

        return $resultArray;
    }

    /**
     * Macht einen Eintrag in eine Tabelle der Datenbank.
     * $tableName = welche Tabelle gewählt werden soll
     * $value = welche Werte der Eintrag haben soll => ('INSERT1','INSERT2', 'INSERT3')
     *
     */
    function makeEntry($tableName, $value) {
        $db = mysql_connect($this->db_hostname, $this->db_user, $this->db_password);
        $sql = "INSERT INTO " . $tableName . " VALUES " . $value;
        mysql_select_db($this->db_name);
        mysql_query($sql);
        mysql_close($db);
    }

    /**
     * Macht eine Änderung in einer Tabelle der Datenbank.
     * $tableName = welche Tabelle gewählt werden soll
     * $value = welche Werte der Eintrag haben soll
     * $where = welche zusätzlichen Bedingungen zutreffen sollen
     *
     */
    function updateEntry($tableName, $value, $where) {
        $db = mysql_connect($this->db_hostname, $this->db_user, $this->db_password);
        $sql = "UPDATE " . $tableName . " SET " . $value . " WHERE " . $where;
        error_log($sql);
        mysql_select_db($this->db_name);
        mysql_query($sql);
        mysql_close($db);
    }
}