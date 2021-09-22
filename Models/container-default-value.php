<?php

class ContainerDefault extends Database
{
    /**
     * get the default width and height from container with it's type
     * 40FR, 20FR, 20GP and 40HC
     *
     * @param str $container_df_type
     * @return void
     */
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

    /**
     * get the container_id and type with a project_ref 
     * 
     * @param str $project_ref
     * @return object
     */
    public function getContainerById($project_ref)
    {

        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT distinct(project_container_id) AS project_container_id, container_df_type FROM  is_stuff_in 
        NATURAL JOIN project_container
        NATURAL JOIN project
        NATURAL JOIN container_default_value
        where project_ref = :project_ref;");
        $req->bindValue(":project_ref", $project_ref, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetchAll();
        return $fetch;
    }

    /**
     * get the total gross weight of crates stuff into a container
     *
     * @param str $project_container_id
     * @return void
     */
    public function totalGrossWeight($project_container_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT sum(project_crate_gross_weight) as total_gross_weight
        from is_stuff_in 
natural join project_crate
natural join project_container
where project_container_id = :project_container_id;");
        $req->bindValue(":project_container_id", $project_container_id, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }


    /**
     * get the higher crate height into a container
     *
     * @param str $project_container_id
     * @return void
     */
    public function maxHeightContainer($project_container_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT
         max(project_crate_height) as 'max_height' from is_stuff_in 
natural join project_crate
natural join project_container
where project_container_id = :project_container_id;");
        $req->bindValue(":project_container_id", $project_container_id, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }

    /**
     * get the higher width into a container
     *
     * @param str $project_container_id
     * @return void
     */
    public function maxWidthContainer($project_container_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT
         max(project_crate_width) as 'max_width' from is_stuff_in 
natural join project_crate
natural join project_container
where project_container_id = :project_container_id;");
        $req->bindValue(":project_container_id", $project_container_id, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch();
        return $fetch;
    }

    /**
     * get the type of a container with it's ID 
     *
     * @param int $id
     * @return void
     */
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

    /**
     * get all datas from container_default_value table fron dbh
     *
     * @return void
     */
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
