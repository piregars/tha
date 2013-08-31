<?php

namespace Tha\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('ThaCoreBundle:Home:index.html.twig');
    }
}
