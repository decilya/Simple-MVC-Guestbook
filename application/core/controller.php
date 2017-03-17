<?php

class Controller
{

    public $db;
    public $model;
    public $view;


    function __construct()
    {
        $this->view = new View();
        $this->db = new DB();
    }

    function action_index()
    {
        // todo
    }
}
