<?php

namespace App\Controller;

use App\Repository\FeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(FeatureRepository  $features): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
           // 'setting' => $settingRepository->findAll()[0], SettingRepository $settingRepository ,
            'features' => $features->findAll(),

        ]);
    }
}
