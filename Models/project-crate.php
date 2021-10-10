<?php

class Crate extends Database
{
    private $crate_ref;
    private $crate_length;
    private $crate_width;
    private $crate_height;
    private $crate_gross_weight;
    private $crate_volume;
    private $crate_id;

    public function readCrate($crate_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT * 
        FROM project_crate
        WHERE project_crate_id = :project_crate_id;");
        $req->bindValue('project_crate_id', $crate_id, );
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }

    public function deleteCrate($crate_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("DELETE FROM project_crate 
        WHERE
        project_crate_id = :project_crate_id");
        $req->bindValue(':project_crate_id', $crate_id, PDO::PARAM_INT);
        $req->execute();
    }


    public function updateCrate($crate_ref, $crate_length, $crate_width, $crate_height, $crate_gross_weight, $crate_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("UPDATE Quote_Manager.project_crate 
SET 
    project_crate_ref = :crate_ref,
    project_crate_length = :crate_length,
    project_crate_width = :crate_width,
    project_crate_height = :crate_height,
    project_crate_gross_weight = :crate_gross_weight,
    project_crate_volume = project_crate_length * project_crate_width * project_crate_height /1000000
WHERE
    project_crate_id = :crate_id");

        $req->bindValue(':crate_ref', $crate_ref, PDO::PARAM_STR);
        $req->bindValue(':crate_length', $crate_length, PDO::PARAM_INT);
        $req->bindValue(':crate_width', $crate_width, PDO::PARAM_INT);
        $req->bindValue(':crate_height', $crate_height, PDO::PARAM_INT);
        $req->bindValue(':crate_gross_weight', $crate_gross_weight, PDO::PARAM_INT);
        $req->bindValue(':crate_id', $crate_id, PDO::PARAM_INT);
        $req->execute();
        return $_SESSION['flash']['success'] = 'Crate Updated Successfully ! 
        You will now be returned to dashboard in 5 seconds.';
    }




    public function pushCrate($crate_ref, $crate_length, $crate_width, $crate_height, $crate_gross_weight, $v)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("INSERT INTO
        PROJECT_crate 
        (project_crate_ref, 
        project_crate_length, 
        project_crate_width, 
        project_crate_height, 
        project_crate_gross_weight, 
        project_crate_volume) 
        values 
        (:project_crate_ref,
         :project_crate_length, 
         :project_crate_width, 
         :project_crate_height, 
         :project_crate_gross_weight, 
         :project_crate_length * :project_crate_width * :project_crate_height /1000000);
        ");
        $req->bindValue(':project_crate_ref', $crate_ref, PDO::PARAM_STR);
        $req->bindValue(':project_crate_length', $crate_length, PDO::PARAM_INT);
        $req->bindValue(':project_crate_width', $crate_width, PDO::PARAM_INT);
        $req->bindValue(':project_crate_height', $crate_height, PDO::PARAM_INT);
        $req->bindValue(':project_crate_gross_weight', $crate_gross_weight, PDO::PARAM_INT);
        $req->execute();

        return $dbh->lastInsertId() . '-' . $v;
    }



    /**
     * Get the value of crate_ref
     */
    public function getCrate_ref()
    {
        return $this->crate_ref;
    }

    /**
     * Set the value of crate_ref
     *
     * @return  self
     */
    public function setCrate_ref($crate_ref)
    {
        $this->crate_ref = $crate_ref;

        return $this;
    }

    /**
     * Get the value of crate_length
     */
    public function getCrate_length()
    {
        return $this->crate_length;
    }

    /**
     * Set the value of crate_length
     *
     * @return  self
     */
    public function setCrate_length($crate_length)
    {
        $this->crate_length = $crate_length;

        return $this;
    }

    /**
     * Get the value of crate_width
     */
    public function getCrate_width()
    {
        return $this->crate_width;
    }

    /**
     * Set the value of crate_width
     *
     * @return  self
     */
    public function setCrate_width($crate_width)
    {
        $this->crate_width = $crate_width;

        return $this;
    }

    /**
     * Get the value of crate_height
     */
    public function getCrate_height()
    {
        return $this->crate_height;
    }

    /**
     * Set the value of crate_height
     *
     * @return  self
     */
    public function setCrate_height($crate_height)
    {
        $this->crate_height = $crate_height;

        return $this;
    }

    /**
     * Get the value of crate_gross_weight
     */
    public function getCrate_gross_weight()
    {
        return $this->crate_gross_weight;
    }

    /**
     * Set the value of crate_gross_weight
     *
     * @return  self
     */
    public function setCrate_gross_weight($crate_gross_weight)
    {
        $this->crate_gross_weight = $crate_gross_weight;

        return $this;
    }

    /**
     * Get the value of crate_volume
     */
    public function getCrate_volume()
    {
        return $this->crate_volume;
    }

    /**
     * Set the value of crate_volume
     *
     * @return  self
     */
    public function setCrate_volume($crate_volume)
    {
        $this->crate_volume = $crate_volume;

        return $this;
    }
}
