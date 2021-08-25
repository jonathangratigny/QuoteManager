<?php

Class User extends Database {
    private $username;
    private $email;
    private $password;


    /**
     * function that check if username already exists
     *
     * @param string $username
     * @return fetch
     */
    public function checkDoubleUsername($username)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('SELECT id FROM `user` WHERE username = :username');
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * function that hash the user password
     *
     * @param string $password
     * @return hash password
     */
    public function hashPassword($password)
    {
    $hashPassword = password_hash($password,PASSWORD_BCRYPT);
    return $hashPassword;

    }

    public function InsertUserInDbh($username, $email, $password)
    {
        //ENCODE PASSWORD HERE
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('insert into `user` (email, username, password) values (:email, :username, :password)
        ');
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->execute();
    }


    /**
     * Get the value of username
     */ 
    public function getusername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setusername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}