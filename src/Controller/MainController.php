<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\News;
use App\Repository\NewsRepository;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(NewsRepository $newsRepository)
    {
    	$allNews = $newsRepository -> findAll();
    	return $this->render('main/index.html.twig', compact('allNews'));
    }
}
