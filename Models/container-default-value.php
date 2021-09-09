<?php

class ContainerDefault extends Database
{
    public function getContainerData()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare(
            "SELECT * FROM Quote_Manager.container_default_value;"
        );
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }
}
