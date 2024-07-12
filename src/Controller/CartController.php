<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(Request $request): Response
    {
        // recup session
        $session = $request->getSession();
        $articles = $session->get('article');
        return $this->render('cart/index.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/cart/add/article/{id}', name: 'app_add_to_cart')]
    public function add_to_cart(int $id, ArticlesRepository $articleRepository, Request $request): Response
    {
        $article = $articleRepository->find($id);
        // ajouter
        $session = $request->getSession();
        $session->set('article', $article);
        return $this->render('cart/index.html.twig', [
            'article' => $article,
        ]);
    }
}
