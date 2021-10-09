<?php

class User extends Database
{
    private $username;
    private $email;
    private $password;
    private $id;
    private $reset_token;

    /**
     * return username with id
     *
     * @param str $u_id
     * @return fetch
     */
    public function projectOwnerWithID($u_id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT 
        u_username
    FROM
        user  
    WHERE
        u_id = :u_id");
        $req->bindValue(':u_id', $u_id, PDO::PARAM_INT);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }


    /**
     * update password by reset process
     *
     * @param hash $password
     * @param string $id
     * @return void
     */
    public function updatePasswordByReset($password, string $id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("UPDATE 
        user 
        SET u_password = :u_password, 
        reset_at = NULL, 
        reset_token = NULL
        WHERE u_id = :u_id");
        $req->bindValue(':u_password', $password, PDO::PARAM_STR);
        $req->bindValue(':u_id', $id, PDO::PARAM_STR);
        $req->execute();
    }


    /**
     * check if token generated exists, match the dbh one and will exists 30min
     * 
     * @param string $id
     * @param string $reset_token
     * @return void
     */
    function checkTokenId(string $id, string $reset_token)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT *
        FROM user
        WHERE u_id = :u_id
        AND
        reset_token IS NOT NULL
        AND
        reset_token = :reset_token
        AND 
        reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)");
        $req->bindValue(':reset_token', $reset_token, PDO::PARAM_STR);
        $req->bindValue(':u_id', $id, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * reset user password in dbh
     *
     * @param [type] $reset_token
     * @param [type] $id
     * @return void
     */
    public function resetPassword($reset_token, $id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("UPDATE  
        user
        SET
        reset_token = :reset_token,
        reset_at = NOW()
        WHERE
        u_id = :id");
        $req->bindValue(':reset_token', $reset_token, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * check if email exists in dbh with user id
     *
     * @param string $id
     * @return void
     */
    public function checkEmailWithId(string $id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT  
        u_email
        FROM
        user
        WHERE
        u_id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    /**
     * update user pwd with user id
     *
     * @param string $password
     * @param string $id
     * @return void
     */
    public function updatePassword(string $password, string $id)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("UPDATE 
        user 
        SET u_password = :u_password
        WHERE
        u_id = :u_id");
        $req->bindValue(':u_password', $password, PDO::PARAM_STR);
        $req->bindValue(':u_id', $id, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * return hash pwd of user
     *
     * @param string $username
     * @return string
     */
    public function checkPassword(string $username)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT 
        u_password
        FROM
        user
        WHERE
        u_username = :username
        OR
        u_email = :username");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }



    /**
     * return username or email
     *
     * @param string $username
     * @return void
     */
    public function logWithEmailUsername(string $username)
    {
        $dbh = $this->connectDatabase();
        $req = $dbh->prepare("SELECT 
        u_username, u_email, u_id
        FROM
        user
        WHERE
        u_username = :username 
        OR
        u_email = :username");
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }


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
        $req = $dbh->prepare('INSERT INTO 
        `user` (`u_username`, `u_email`, `u_password`) 
        VALUES (:username, :email, :u_password)
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

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of reset_token
     */
    public function getReset_token()
    {
        return $this->reset_token;
    }

    /**
     * Set the value of reset_token
     *
     * @return  self
     */
    public function setReset_token($reset_token)
    {
        $this->reset_token = $reset_token;

        return $this;
    }
}
