<?php

class User {
    private $id;
    private $username;
    private $email;
    private $created_on;
    private $photo;
    private $bio;
    private $first_name;
    private $last_name;
    private $last_login;
    private $password;
    private $forgotten_password_code;
    private $forgotten_password_time;
    private $ip_address;
    private $salt;
    private $elo, $remember_code, $company, $phone, $activation_code;
    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * @return mixed
     */
    public function getElo()
    {
        return $this->elo;
    }
    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}