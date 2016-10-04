<?php

namespace Blogger\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response as Response;

class PageController extends Controller
{
    // routing http://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/routing.html


    /**
     * @return Response
     * @Route(path="/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('@BloggerBlog/Page/index.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return $this->render("@BloggerBlog/Page/about.html.twig");
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render("@BloggerBlog/Page/contact.html.twig");
    }
}
