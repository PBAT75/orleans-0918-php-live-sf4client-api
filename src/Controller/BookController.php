<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book", name="book")
     */
    public function index()
    {
        $client = new Client();

        $response = $client->request('GET', 'http://127.0.0.1:8000/books');

        $books = json_decode($response->getBody()->getContents());

        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }
}
