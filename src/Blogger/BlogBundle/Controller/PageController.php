<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Form\EnquiryType;
use Blogger\BlogBundle\ViewModels\EnquiryViewModel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as Response;

/**
 * Class PageController
 * @package Blogger\BlogBundle\Controller
 */
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
     * @return Response
     * @Route(path="/{id}", name="show", requirements={"id": "\d+"})
     * @Method({"GET"})
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository("BloggerBlogBundle:Blog")->find($id);

        if (!$blog)
        {
            throw $this->createNotFoundException("Blog repository not found");
        }


        return $this->render('@BloggerBlog/Blog/show.html.twig', array('blog' => $blog));
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return $this->render("@BloggerBlog/Page/about.html.twig");
    }


    /**
     * @param Request $request request to receive
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function contactAction(Request $request)
    {
        $enquiryViewModel = new EnquiryViewModel();
        $form = $this->createForm(EnquiryType::class,$enquiryViewModel);

        $form->handleRequest($request);
        if($form->isValid()){
            return $this->redirect($this->generateUrl("contact"));
        }

        return $this->render("@BloggerBlog/Page/contact.html.twig",
                            array('enquiry_form' => $form->createView()));
    }
}
