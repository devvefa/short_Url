<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(Request $request): Response
    {

        if (!$this->get('session')->get('theme')){

            $this->get('session')->set('theme','bootstrap.min.css');
            $this->get('session')->set('mode', 'light');
        }
        $url =  $request->get('theme');



        if ($url=='dark') {

            $this->get('session')->set('theme', 'darkbootstrap.min.css');
            $this->get('session')->set('mode', 'dark');

        }else
        {
            $this->get('session')->remove('theme');

            $this->get('session')->set('theme','bootstrap.min.css');
            $this->get('session')->set('mode', 'light');

        }





        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',

        ]);
    }

    #[Route('/admin/theme', name: 'dark_theme')]
    public function changeTheme(Request $request)
    {

    }

}
