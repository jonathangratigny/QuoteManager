<?php

class Database
{
    private $dbname = 'Quote_Manager';
    private $user = 'quote_manager';
    private $password = '06KNRzGp4%^p%5K4';

    protected function connectDatabase()
    {
        try {
            $database = new PDO("mysql:host=localhost;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $database;
        } catch (Exception $error) {
            die("Failed: " .  $error->getMessage());
        }
    }
}