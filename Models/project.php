<?php

class Project extends User
{
    private $project_id;
    private $project_ref;
    private $project_final_customer_name;
    private $project_owner_ref;
    private $project_country_dest;
    private $project_POL;
    private $project_POD;
    private $u_id;
    private $port_id;
    private $container_df_id;

    public function isStuffIn($project_container_id, $project_crate_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("INSERT INTO 
        IS_STUFF_IN 
        (project_container_id, 
        project_crate_id) 
        values 
        (:project_container_id,
        :project_crate_id);");
        $req->bindValue(':project_container_id', $project_container_id, PDO::PARAM_INT);
        $req->bindValue(':project_crate_id', $project_crate_id, PDO::PARAM_INT);
        $req->execute();

    }


    public function pushProject_container($container_df_id, $project_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("INSERT INTO 
        project_container 
        (container_df_id, 
        project_id) 
        values 
        (:container_df_id,
        :project_id);");
        $req->bindValue(':container_df_id', $container_df_id, PDO::PARAM_INT);
        $req->bindValue(':project_id', $project_id, PDO::PARAM_INT);
        $req->execute();

        return $dbh->lastInsertId();
    }
    public function showProjectData()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT * 
        from project");
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_OBJ);
        return $fetch;
    }


    public function getLastProjectID()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT 
        MAX(project_id) as project_id from project;");
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_NAMED);
        return $fetch;
    }


    public function pushProject($project_ref, $project_final_customer_name, $project_owner_ref, $project_country_dest, $project_POL, $project_POD, $u_id, $sl_id, $port_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare(
            "INSERT INTO project 
        (project_ref, 
        project_final_customer_name, 
        project_owner_ref, 
        project_country_dest, 
        project_POL, 
        project_POD, 
        u_id, 
        sl_id, 
        port_id,
        project_created_at) 
        values (:project_ref,
         :project_final_customer_name, 
         :project_owner_ref,
         :project_country_dest, 
         :project_POL, 
         :project_POD, 
         :u_id, 
         :sl_id, 
         :port_id,
         NOW());
        "
        );
        $req->bindValue(':project_ref', $project_ref, PDO::PARAM_STR);
        $req->bindValue(':project_final_customer_name', $project_final_customer_name, PDO::PARAM_STR);
        $req->bindValue(':project_owner_ref', $project_owner_ref, PDO::PARAM_STR);
        $req->bindValue(':project_country_dest', $project_country_dest, PDO::PARAM_STR);
        $req->bindValue(':project_POL', $project_POL, PDO::PARAM_STR);
        $req->bindValue(':project_POD', $project_POD, PDO::PARAM_STR);
        $req->bindValue(':u_id', $u_id, PDO::PARAM_INT);
        $req->bindValue(':sl_id', $sl_id, PDO::PARAM_INT);
        $req->bindValue(':port_id', $port_id, PDO::PARAM_INT);
        $req->execute();

    }



    /**
     * show POD infos
     *
     * @return fetch
     */
    public function showPOD()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("select port_name, port_country
    from port;");
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }


    /**
     * Get the value of project_id
     */
    public function getProject_id()
    {
        return $this->project_id;
    }

    /**
     * Set the value of project_id
     *
     * @return  self
     */
    public function setProject_id($project_id)
    {
        $this->project_id = $project_id;

        return $this;
    }

    /**
     * Get the value of project_ref
     */
    public function getProject_ref()
    {
        return $this->project_ref;
    }

    /**
     * Set the value of project_ref
     *
     * @return  self
     */
    public function setProject_ref($project_ref)
    {
        $this->project_ref = $project_ref;

        return $this;
    }

    /**
     * Get the value of project_final_customer_name
     */
    public function getProject_final_customer_name()
    {
        return $this->project_final_customer_name;
    }

    /**
     * Set the value of project_final_customer_name
     *
     * @return  self
     */
    public function setProject_final_customer_name($project_final_customer_name)
    {
        $this->project_final_customer_name = $project_final_customer_name;

        return $this;
    }

    /**
     * Get the value of project_owner_ref
     */
    public function getProject_owner_ref()
    {
        return $this->project_owner_ref;
    }

    /**
     * Set the value of project_owner_ref
     *
     * @return  self
     */
    public function setProject_owner_ref($project_owner_ref)
    {
        $this->project_owner_ref = $project_owner_ref;

        return $this;
    }

    /**
     * Get the value of project_country_dest
     */
    public function getProject_country_dest()
    {
        return $this->project_country_dest;
    }

    /**
     * Set the value of project_country_dest
     *
     * @return  self
     */
    public function setProject_country_dest($project_country_dest)
    {
        $this->project_country_dest = $project_country_dest;

        return $this;
    }

    /**
     * Get the value of project_POL
     */
    public function getProject_POL()
    {
        return $this->project_POL;
    }

    /**
     * Set the value of project_POL
     *
     * @return  self
     */
    public function setProject_POL($project_POL)
    {
        $this->project_POL = $project_POL;

        return $this;
    }

    /**
     * Get the value of project_POD
     */
    public function getProject_POD()
    {
        return $this->project_POD;
    }

    /**
     * Set the value of project_POD
     *
     * @return  self
     */
    public function setProject_POD($project_POD)
    {
        $this->project_POD = $project_POD;

        return $this;
    }

    /**
     * Get the value of u_id
     */
    public function getU_id()
    {
        return $this->u_id;
    }

    /**
     * Set the value of u_id
     *
     * @return  self
     */
    public function setU_id($u_id)
    {
        $this->u_id = $u_id;

        return $this;
    }

    /**
     * Get the value of port_id
     */
    public function getPort_id()
    {
        return $this->port_id;
    }

    /**
     * Set the value of port_id
     *
     * @return  self
     */
    public function setPort_id($port_id)
    {
        $this->port_id = $port_id;

        return $this;
    }

    /**
     * Get the value of container_df_id
     */
    public function getContainer_df_id()
    {
        return $this->container_df_id;
    }

    /**
     * Set the value of container_df_id
     *
     * @return  self
     */
    public function setContainer_df_id($container_df_id)
    {
        $this->container_df_id = $container_df_id;

        return $this;
    }
}
