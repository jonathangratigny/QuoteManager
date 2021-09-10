<?php

class ShippingLine extends Database
{

    public function getShippingLine()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT sl_id, sl_name
    FROM shipping_line;");
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }
}
