<?php

class ContainerDefault extends Database
{

    public function getContaineerNameWithID($id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare(
            "SELECT container_df_type
             FROM Quote_Manager.container_default_value
             WHERE container_df_id = :container_df_id;"
        );
        $req->bindValue(":container_df_id", $id, PDO::PARAM_INT);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;

    }


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
