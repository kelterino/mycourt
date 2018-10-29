<?php

namespace MyCourt\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue    
     * @ORM\Column(name="id", type="integer")   
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    protected $username;

    /**
     * @ORM\Column(type="string")  
     */
    protected $email;

    /**
     * @ORM\Column(type="string")  
     */
    protected $password;

    /**
     * @ORM\ManyToOne(targetEntity="\MyCourt\Entity\UserStatus", inversedBy="users")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    protected $status;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $created;

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setCreated(DateTime $created) {
        $this->created = $created;
        return $this;
    }

}
