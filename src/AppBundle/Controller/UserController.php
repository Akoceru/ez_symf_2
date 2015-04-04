<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route("/show")
     */
    public function showAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/create")
     */
    public function createAction()
    {
        return array(
                // ...
            );    }

}
