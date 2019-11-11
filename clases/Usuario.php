<?php

class Usuario {
    private $id;
    private $user;
    private $name;
    private $lastName;
    private $email;
    private $password;
    private $avatar;

    public function __construct($id,string $user,string $email, string $password, string $avatar)
      {
        $this->setId($id);
        $this->setUser($user);
        $this->setName($name);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setAvatar($avatar);
    }
    public function setUser(string $user)
    {
        $this->user = $user;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPassword(string $pass)
    {
        $this->password = $pass;
    }
    public function setAvatar(string $avatar)
    {
        $this->avatar = $avatar;
    }
    public function getId(): integer
    {
        return $this->id;
    }
    public function getUser(): string
      {
          return $this->user;
      }
      public function getName(): string
        {
            return $this->name;
        }

    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getAvatar(): string
    {
        return $this->avatar;
    }

}
