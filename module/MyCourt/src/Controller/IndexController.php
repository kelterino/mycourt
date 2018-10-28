<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace MyCourt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    protected $currentYear;
    protected $currentWeek;
    
    public function indexAction()
    {
        $this->currentYear = $this->params()->fromQuery('current_year', date('Y'));
        $this->currentWeek = $this->params()->fromQuery('current_week', date('W'));
        
        $data = [
            'currentYear' => $this->currentYear,
            'currentWeek' => $this->currentWeek,
            'weekDays' => [
                'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'
            ],
        ];
        
        return new ViewModel($data);
    }
}
