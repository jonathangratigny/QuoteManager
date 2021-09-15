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


    public function pushProject($project_ref, $project_final_customer_name, $project_owner_ref, $project_country_dest, $project_POL, $project_POD)
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
        port_id) 
        values ('H1.001443', 'COCA', '20210827-01', 'CANADA', 'LE HAVRE', 'TORONTO', 1, 1, 201);
        "

        );
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
}
