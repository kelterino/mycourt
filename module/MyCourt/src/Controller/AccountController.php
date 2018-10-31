<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace MyCourt\Controller;

use Zend\View\Model\ViewModel;

class AccountController extends BaseController
{
    public function accountAction()
    {
        return $this->editAction();
    }

    public function listAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function registerAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        return new ViewModel();
    }

    public function logoutAction()
    {
        return new ViewModel();
    }

    public function forgotUsernameAction()
    {
        return new ViewModel();
    }

    public function forgotPasswordAction()
    {
        return new ViewModel();
    }

}
