<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\News;
use App\Repository\NewsRepository;

class NewsController extends AbstractController
{
    /**
     * @Route("/news/{id}", name="news")
     */
    public function index(NewsRepository $newsRepository, $id)
    {	
    	$selectedNews = $newsRepository -> find($id);
        return $this->render('news/index.html.twig', compact('selectedNews'));
    }
}
