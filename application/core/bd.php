<?php

class DB extends Model
{

    private $host = 'localhost';
    private $db = 'test';
    private $user = 'root';
    private $password = 'qwerty';

    public $link;
    public $result = '';
    public $record = '';

    function __construct()
    {
        $this->link = new mysqli($this->host, $this->user, $this->password, $this->db);

        if ($this->link->connect_errno) {
            die("Не удалось подключиться к MySQL: " . $this->link->connect_error);
        }

        if (!$this->link->set_charset("utf8")) {
            die("Ошибка при загрузке набора символов utf8: " . $this->link->error);
        }
    }

    function __destruct()
    {
        $this->link->close();
    }

    function query($query)
    {
        $this->result = mysqli_query($this->link, $query);
        return $this->result;
    }

    function next()
    {
        if ($this->record = mysqli_fetch_array($this->result, MYSQLI_ASSOC)) {
            return true;
        } else {
            return false;
        }
    }

    function val($val)
    {
        if (isset ($this->record[$val])) {
            return $this->record[$val];
        } else {
            return false;
        }
    }

    function getResult($query, $val)
    {

        $this->result = mysqli_query($this->link, $query) or die("Ошибка: " . $this->link->error);

        $this->next();
        $result = $this->val($val);
        $this->clearResult();

        return $result;
    }

    function countRows()
    {
        return mysqli_num_rows($this->result);
    }

    function clearResult()
    {
        $this->result->close();
    }

}
