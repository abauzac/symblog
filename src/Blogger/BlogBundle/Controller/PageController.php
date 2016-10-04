<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request request to receive
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(EnquiryType::class,$enquiry);

        $form->handleRequest($request);
        if($form->isValid()){
            return $this->redirect($this->generateUrl("contact"));
        }

        return $this->render("@BloggerBlog/Page/contact.html.twig",
                            array('enquiry_form' => $form->createView()));
    }
}
