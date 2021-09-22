<?php

class ContainerDefault extends Database
{

    public function getContainerDimensions($container_df_type)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT 
        container_df_width, container_df_height 
        FROM container_default_value
        where container_df_type = :container_df_type");
        $req->bindValue(":container_df_type", $container_df_type, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }

    public function getContainerById($project_ref)
    {

        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT project_container_id, container_df_type FROM project_container 
        natural join project
        natural join container_default_value
        where project_ref = :project_ref;");
        $req->bindValue(":project_ref", $project_ref, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetchAll();
        return $fetch;
    }

    public function maxHeightContainer($project_container_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT
         max(project_crate_height) as 'max_height' from project_crate 
natural join is_stuff_in
natural join project_container
where project_container_id = :project_container_id;");
        $req->bindValue(":project_container_id", $project_container_id, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }

    public function maxWidthContainer($project_container_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT
         max(project_crate_width) as 'max_width' from project_crate 
natural join is_stuff_in
natural join project_container
where project_container_id = :project_container_id;");
        $req->bindValue(":project_container_id", $project_container_id, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }


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
