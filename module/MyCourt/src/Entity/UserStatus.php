<?php

namespace MyCourt\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_status")
 */
class UserStatus {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="name")  
     */
    protected $name;

    /**
     * @ORM\Column(type="integer", options={"default":0})  
     */
    protected $isActive;

    /**
     * @ORM\OneToMany(targetEntity="\MyCourt\Entity\User", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="status_id")
     */
    protected $users;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->users = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Returns comments for this post.
     * @return array
     */
    public function getUsers() {
        return $this->users;
    }

    /**
     * Adds a new comment to this post.
     * @param $comment
     */
    public function addUser($user) {
        $this->users[] = $user;
    }

}
