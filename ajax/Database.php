<?php

class Database extends PDO {

    private $rowCount = 0;

    public function __construct() {
        parent::__construct(DB_TYPE . ': host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $this->prepare('SET NAMES utf8');
        $sth->execute();
    }


    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue($key, $value);
        }
        $sth->execute();
        $this->rowCount = $sth->rowCount();
        return $sth->fetchAll($fetchMode);
    }

    public function selecto($sql, $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        $sth->execute();
        $this->rowCount = $sth->rowCount();
        return $sth->fetchAll($fetchMode);
    }

    public function rowCount() {
        return $this->rowCount;
    }

    public function insert($table, $data) {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        try {
            return $sth->execute();
        } catch (PDOException $e) {
            echo 'Błąd:' . $e->getMessage();
        }
    }

    public function update($table, $data, $where) {
        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        try {
            return $sth->execute();
        } catch (PDOException $e) {
            echo 'Błąd:' . $e->getMessage();
        }
    }

    public function updateab($table, $data) {
        ksort($data);

        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        try {
            return $sth->execute();
        } catch (PDOException $e) {
            echo 'Błąd:' . $e->getMessage();
        }
    }


    public function delete($table, $where, $limit = 1) {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

}
?>
