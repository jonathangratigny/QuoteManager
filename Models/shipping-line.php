<?php

class ShippingLine extends Database
{
    private $sl_name;
    private $sl_id;

    public function getShippingLineOnproject()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT sl_name, project_ref 
        FROM Quote_Manager.project
        inner join shipping_line 
        on project.sl_id = shipping_line.sl_id;");
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }
    

    public function getShippingLineWithID($sl_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT sl_name
    FROM shipping_line
    WHERE sl_id = :sl_id;");
        $req->bindValue(':sl_id', $sl_id, PDO::PARAM_INT);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_OBJ);
        return $fetch;
    }

    public function getShippingLineID($sl_name)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT sl_id
    FROM shipping_line
    WHERE sl_name = :sl_name;");
        $req->bindValue(':sl_name', $sl_name, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }


    public function getShippingLine()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT *
    FROM shipping_line;");
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * Get the value of sl_name
     */
    public function getSl_name()
    {
        return $this->sl_name;
    }

    /**
     * Set the value of sl_name
     *
     * @return  self
     */
    public function setSl_name($sl_name)
    {
        $this->sl_name = $sl_name;

        return $this;
    }
    /**
     * Get the value of sl_id
     */
    public function getSl_id()
    {
        return $this->sl_id;
    }

    /**
     * Set the value of sl_id
     *
     * @return  self
     */
    public function setSl_id($sl_id)
    {
        $this->sl_id = $sl_id;

        return $this;
    }
}
