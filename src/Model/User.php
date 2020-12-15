<?php


namespace App\Model;

class User {

    /**
     * @var int
     */
    private $id;

    /**
     * @var  string
     */
    private $username;

    /**
     * @var  int
     */
    private $role_id;

    /**
     * @var  string
     */
    private $password;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getRoleId(): ?int
    {

        return $this->role_id;
    }

    public function setRoleId(int $role_id): self
    {
        $this->role_id = $role_id;
        return $this;
    }

}