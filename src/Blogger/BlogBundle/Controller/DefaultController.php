<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @param string $name
     * @return Response A Response instance
     */
    public function indexAction($name)
    {
        return $this->render('BloggerBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
