<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\DomainObject\Comment;
use Blogger\BlogBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CommentController
 * @package Blogger\BlogBundle\Controller
 */
class CommentController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function newAction($blog_id)
    {
        $blog = $this->get("blog.repository")->find($blog_id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $form   = $this->createForm(CommentType::class, $comment);

        return $this->render('@BloggerBlog/Blog/comment.form.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }

    /**
     * CREATE POST NEW COMMENT
     * @param $blog_id
     * @Route(path="/comment/{blog_id}",
     *     methods={"POST"},
     *     name="comment_create",
     *     requirements={"blog_id": "\d+"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request, $blog_id)
    {
        $blog = $this->get("blog.repository")->find($blog_id);

        $comment  = new Comment();
        $comment->setBlog($blog);
        $form    = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // TODO: Persist the comment entity

            $this->get("comment.repository")->create($comment);

            return $this->redirect($this->generateUrl('blog_show', array(
                    'id' => $comment->getBlog()->getId())) .
                '#comment-' . $comment->getId()
            );
        }

        return $this->render('@BloggerBlog/Blog/comment.create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }

}
