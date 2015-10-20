<?php

namespace SIEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PuestoController extends Controller
{
    public function indexAction()
    {
        return $this->render('SIEBundle:Default:index.html.twig');
    }
}
