<?php

/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 18/10/2016
 * Time: 16:29
 */

namespace Blogger\BlogBundle\Services;

use Blogger\BlogBundle\Repository\BlogRepository;
use Blogger\BlogBundle\ViewModels\IndexBlogViewModel;
use Doctrine\ORM\EntityManager;

class BlogService
{

    /**
     * @var EntityManager
     */
    private $blogrepo;

    public function __construct(BlogRepository $blogrepo)
    {
        $this->blogrepo = $blogrepo;
    }

    /**
     * @return IndexBlogViewModel[]
     */
    public function getLastBlogPosts(){
        $blogsEntity = $this->blogrepo->getLastBlogPosts();
        $blogs = Array();
        foreach ($blogsEntity as $blog){
            $blogs[] = new IndexBlogViewModel($blog);
        }

        return $blogs;
    }

}