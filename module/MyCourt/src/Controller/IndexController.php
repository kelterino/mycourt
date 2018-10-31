<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace MyCourt\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends BaseController {

    protected $currentYear;
    protected $currentWeek;
    
    public function indexAction() {
//        for ($i = 1; $i <= 3; $i++) {
//            // Create new Court entity.
//            $court = new \MyCourt\Entity\Court();
//            $court->setName("Platz " . $i);
//            $court->setIsActive(1);
//
//            // Add the entity to entity manager.
//            $this->entityManager->persist($court);
//        }
//
//        // Apply changes to database.
//        $this->entityManager->flush();

        $this->currentYear = $this->params()->fromQuery('current_year', date('Y'));
        $this->currentWeek = $this->params()->fromQuery('current_week', date('W'));

        $courtRepo = $this->entityManager->getRepository(\MyCourt\Entity\Court::class);
        
        $data = [
            'courts' => $courtRepo->findBy(['isActive' => \MyCourt\Entity\Court::STATUS_ACTIVE], ['name'=>'ASC']),
            'currentYear' => $this->currentYear,
            'currentWeek' => $this->currentWeek,
            'weekDays' => [
                'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'
            ],
        ];

        return new ViewModel($data);
    }

}
