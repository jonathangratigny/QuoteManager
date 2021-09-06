<?php

class Ajax extends Database
{

    public function getPOD($country)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare(
            'SELECT port_name, port_id from port where port_country = :country'
        );
        $req->bindValue(':country', $country, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }
}
