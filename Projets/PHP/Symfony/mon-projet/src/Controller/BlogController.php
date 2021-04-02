<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
	/**
	 * @Route("/", name="home")
	 */
	public function home()
	{
		return $this->render('blog/home.html.twig', [
		'title' => 'The GRETA Site',
		'age' => 15
		]);
	}

	/**
	 * @Route("/blog/article/12", name="blog_show")
	 */
	public function show(){
		return $this->render('blog/show.html.twig');
	}
}
