<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MyCourt\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Description of BaseController
 *
 * @author dude
 */
class BaseController extends AbstractActionController{
    
    protected $entityManager;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }
}
