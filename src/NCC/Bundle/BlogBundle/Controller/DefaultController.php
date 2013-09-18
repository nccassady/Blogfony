<?php

namespace NCC\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NCC\Bundle\BlogBundle\Entity\PostRepository;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('NCCBlogBundle:Post');

    	$posts = $repository->createQueryBuilder('p')
    		->setMaxresults(5)
    		->orderBy('p.date', 'DESC')
    		->getQuery()
    		->getResult();

        return $this->render('NCCBlogBundle:Blog:index.html.twig', array('posts' => $posts));
    }
}
