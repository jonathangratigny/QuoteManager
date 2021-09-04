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


    public function showCountryFromPOD($port_name)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT *
    FROM port
    WHERE port_name = :port_name;");
        $req->execute();
        $req->bindValue(':port_name', $port_name, PDO::PARAM_STR);
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
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
}
