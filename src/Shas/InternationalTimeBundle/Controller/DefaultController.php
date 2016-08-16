<?php

namespace Shas\InternationalTimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InternationalTimeBundle:Default:index.html.twig', array('name' => $name));
    }
}
