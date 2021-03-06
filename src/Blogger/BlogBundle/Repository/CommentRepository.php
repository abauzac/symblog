<?php
/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 18/10/2016
 * Time: 15:30
 */

namespace Blogger\BlogBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CommentRepository extends AbstractRepository
{

    public function getCommentsForBlog($blogId, $approved = true)
    {
        $qb = $this->createQueryBuilder("c")
            ->where("c.blog = :blog_id")
            ->addOrderBy("c.created")
            ->setParameter("blog_id", $blogId);

        if(!is_null($approved)){
            $qb->andWhere("c.approved = :approved")
                ->setParameter("approved", $approved);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getLastComments($limit = 10){
        $qb = $this->createQueryBuilder("comments")->addOrderBy("comments.created", "DESC");

        if(false == is_null($limit)){
            $qb->setMaxResults($limit);
        }

        return $qb->getQuery()->getResult();
    }
}