<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MyCourt\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

/**
 * Description of CourtController
 *
 * @author dude
 */
class CourtController extends BaseController {

    public function indexAction() {
        return $this->listAction();
    }

    public function listAction() {
        $courts = $this->entityManager->getRepository(\MyCourt\Entity\Court::class)->findAll();
        return new ViewModel(['courts' => $courts]);
    }

    public function editAction() {

        $id = $this->params()->fromRoute('id', 0);
        $form = new \MyCourt\Form\CourtForm();
        // save 
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);
            $court = new \MyCourt\Entity\Court();
            $court->setName($data['name']);
            $court->setIsActive($data['is_active']);
            // Add the entity to entity manager.name
            $this->entityManager->persist($court);
            $this->entityManager->flush();
            return $this->redirect()->toRoute('court');
        }

        $court = $this->entityManager->getRepository(\MyCourt\Entity\Court::class)->find($id);
        if ($court) {
            $form->setHydrator(new DoctrineHydrator($this->entityManager, \MyCourt\Entity\Court::class));
            $form->bind($court);
        }

        return new ViewModel(
                [
            'court' => $court,
            'headline' => empty($courtId) ? `neuen Platz anlegen` : 'Platz editieren',
            'form' => $form,
                ]
        );
    }

}
