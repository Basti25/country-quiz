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

    function setConnectionData($config) {
        $this->db_hostname = $config['db_host'];
        $this->db_user = $config['db_user'];
        $this->db_password = $config['db_password'];
        $this->db_name = $config['db_name'];
    }

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
    // value in this form => ('INSERT1','INSERT2', 'INSERT3')
    function makeEntry($tableName, $value) {
        $db = mysql_connect($this->db_hostname, $this->db_user, $this->db_password);
        $sql = "INSERT INTO " . $tableName . " VALUES " . $value;
        mysql_select_db($this->db_name);
        mysql_query($sql);
        mysql_close($db);
    }

    function updateEntry($tableName, $value, $where) {
        $db = mysql_connect($this->db_hostname, $this->db_user, $this->db_password);
        $sql = "UPDATE " . $tableName . " SET " . $value . " WHERE " . $where;
        error_log($sql);
        mysql_select_db($this->db_name);
        mysql_query($sql);
        mysql_close($db);
    }
}