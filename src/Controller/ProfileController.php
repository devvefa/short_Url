<?php

namespace App\Controller;

use App\Repository\PageRepository;
use App\Repository\UrlRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Form\UserType;
use App\Entity\User;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(UrlRepository $urlRepository, PageRepository $page): Response
    {


        return $this->render('profile/index.html.twig', [
            'userInfo' => $this->getUser(),
            'pages'=> $page->findAll(),

        ]);
    }

    #[Route('/profile/url/{key}', name: 'profile_url',defaults: ['key' => null])]
    public function userUrls($key, UrlRepository $urlRepository, PageRepository $page): Response
    {
        if ($key==='topfiveclicked')


            return $this->render('profile/userurls.html.twig', [
                'userInfo' => $this->getUser(),
                'pages'=> $page->findAll(),
                'urls' => $urlRepository->getTopFiveUrl( $this->getUser()->getId())
            ]);
        else if ($key==='favorite')
        {
            return $this->render('profile/userurls.html.twig', [
                'userInfo' => $this->getUser(),
                'pages'=> $page->findAll(),
                'urls' => $urlRepository->getFavriteUrl($this->getUser()->getId() )
            ]);
        }
        else{
            return $this->render('profile/userurls.html.twig', [
                'userInfo' => $this->getUser(),
                'pages'=> $page->findAll(),
                'urls' => $urlRepository->findBy(['user_id'=> $this->getUser()->getId()]),
            ]);
        }
    }

    #[Route('/profile/edit', name: 'profile_edit', methods: ['GET', 'POST'])]
    public function editprofile(Request $request, UserPasswordEncoderInterface $passwordEncoder, PageRepository $page): Response
    {


        $user = $this->getUser();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        $submittedToken = $request->get('csrf_token');


        if ($this->isCsrfTokenValid('update_profile', $submittedToken)) {


            $user->setEmail($request->get('email'));

            $user->setName($request->get('name'));
            $user->setSurname($request->get('surname'));
            $user->setAddress($request->get('address'));
            $user->setPhone($request->get('phone'));


            $user->setPassword($passwordEncoder->encodePassword(
                $user, $request->get('phone')
            ));
            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('profile' ,[
            'userInfo' => $this->getUser(),
                'pages'=> $page->findAll()

            ]);
        }


        return $this->render('profile/edit.html.twig', [
            'controller_name' => 'ProfileController',
            'userInfo' => $this->getUser(),
            'pages'=> $page->findAll()
        ]);
    }

}
