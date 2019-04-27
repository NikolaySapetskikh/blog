<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\News;
use App\Repository\NewsRepository;
use App\Repository\CommentRepository;

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
    /**
     * @Route("/news/{id}", name="news")
     */
    public function getOneNews(NewsRepository $newsRepository, CommentRepository $commentRepository, $id)
    {
        $selectedNews = $newsRepository -> find($id);
        $selectedcomment = $commentRepository -> findBy(['news' => $id],['createdAt' => 'ASC']);
          foreach ($selectedcomment as $key => $value) {
                $path = $value->getId();
                $root = $commentRepository->getTree('/'.$path);
            }
        return $this->render('news/oneNews.html.twig', compact('selectedNews','selectedcomment'));
    }

}
