<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\MessagesType;
use App\Repository\FeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(FeatureRepository $features): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            // 'setting' => $settingRepository->findAll()[0], SettingRepository $settingRepository ,
            'features' => $features->findAll(),

        ]);
    }

    #[Route('/contact', name: 'contact', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        $message = new Messages();
        $form = $this->createForm(MessagesType::class, $message);
        $form->handleRequest($request);

        $submittedToken = $request->get('csrf_token');


        if ($this->isCsrfTokenValid('csrf_message', $submittedToken)) {
            $em = $this->getDoctrine()->getManager();

            $message->setName($request->get('name'));
            $message->setEmail($request->get('email'));
            $message->setMessage($request->get('message'));
            $message->setSubject($request->get('subject'));
            $message->setName($request->get('name'));
            $message->setStatus('New');
            $message->setIp($_SERVER['REMOTE_ADDR']);
            $em->persist($message);
            $em->flush();
            $this->addFlash('success', 'Mesajınız iletildi, En kısa sürede geri dönüş yapılacaktır');


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contact');
        }
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
            // 'setting' => $settingRepository->findAll()[0], SettingRepository $settingRepository ,


        ]);

    }


}
