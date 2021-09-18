<?php

class ShippingLine extends Database
{
    private $sl_name;




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
        $req->bindValue(':sl_name', $sl_name, PDO::PARAM_INT);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }


    public function getShippingLine()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT sl_id, sl_name
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
}
