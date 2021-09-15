<?php

class Port extends Database
{

    private $port_code;
    private $port_name;
    private $port_country;

    public function showUniqueCountry()
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT distinct 
        port_country from port 
        order by port_country asc");
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;

    }

    /**
     * fetch port table
     *
     * @param string $port_name
     * @return fetch
     */
    public function showIDFromPOD(string $port_name)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT port_id
    FROM port
    WHERE port_name = :port_name;");
        $req->bindValue(':port_name', $port_name, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
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
        $req = $dbh->prepare("SELECT *
        from port;");
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }


    /**
     * Get the value of port_code
     */
    public function getPort_code()
    {
        return $this->port_code;
    }

    /**
     * Set the value of port_code
     *
     * @return  self
     */
    public function setPort_code($port_code)
    {
        $this->port_code = $port_code;

        return $this;
    }

    /**
     * Get the value of port_name
     */
    public function getPort_name()
    {
        return $this->port_name;
    }

    /**
     * Set the value of port_name
     *
     * @return  self
     */
    public function setPort_name($port_name)
    {
        $this->port_name = $port_name;

        return $this;
    }

    /**
     * Get the value of port_country
     */
    public function getPort_country()
    {
        return $this->port_country;
    }

    /**
     * Set the value of port_country
     *
     * @return  self
     */
    public function setPort_country($port_country)
    {
        $this->port_country = $port_country;

        return $this;
    }
}
