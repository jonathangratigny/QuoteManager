<?php

class User extends Database
{
    private $username;
    private $email;
    private $password;

/**
 * function that check if email already exists
 *
 * @param string $email
 * @return fetch
 */
    public function checkDoubleEmail(string $email)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('SELECT `u_id` FROM `user` WHERE `u_email` = :email');
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * function that check if username already exists
     *
     * @param string $username
     * @return fetch
     */
    public function checkDoubleUsername(string $username)
    {
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('SELECT `u_id` FROM `user` WHERE `u_username` = :username');
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
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        return $hashPassword;
    }

    public function InsertUserInDbh($email, $username, $password)
    {
        //ENCODE PASSWORD HERE
        $dbh =  $this->connectDatabase();
        $req = $dbh->prepare('INSERT INTO `user` (`u_username`, `u_email`, `u_password`) VALUES (:username, :email, :u_password)
        ');
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':u_password', $password, PDO::PARAM_STR);
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
