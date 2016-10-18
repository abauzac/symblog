<?php
/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 18/10/2016
 * Time: 15:30
 */

namespace Blogger\BlogBundle\Repository;


use Doctrine\ORM\EntityRepository;

class BlogRepository extends EntityRepository
{
    public function getLastBlogPosts(){
        return $this->createQueryBuilder('b')
            ->from('BloggerBlogBundle:Blog', "blog")
            ->addOrderBy('blog.created', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function getBlog(){

    }
}