<?php

/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 18/10/2016
 * Time: 16:29
 */

namespace Blogger\BlogBundle\Services;

use Blogger\BlogBundle\Repository\BlogRepository;
use Blogger\BlogBundle\Repository\CommentRepository;
use Blogger\BlogBundle\ViewModels\IndexBlogViewModel;
use Doctrine\ORM\EntityManager;

class CommentService
{

    /**
     * @var EntityManager
     */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->$commentRepository = $commentRepository;
    }


}