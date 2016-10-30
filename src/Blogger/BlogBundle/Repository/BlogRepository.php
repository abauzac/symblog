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
    /**
     * @param null $limit
     * @return array BlogModel
     */
    public function getLastBlogPosts($limit = null)
    {

        $qb = $this->createQueryBuilder('blog')
            ->select("blog", "comments")
            ->leftJoin("blog.comments", "comments")
            ->addOrderBy('blog.created', 'DESC');

        if (is_null($limit) == false) {
            $qb->setMaxResults($limit);
        }
        return $qb->getQuery()
            ->getResult();
    }

    public function getTags(){
       $blogTags = $this->createQueryBuilder("blog")
            ->getQuery()
           ->getResult();

        $tags = array();

        foreach ($blogTags as $blogTag){
            $tags = array_merge(explode(",", $blogTag->getTags()), $tags);
        }

        foreach ($tags as $tag) {
            $tag = trim($tag);
        }

        return $tags;
    }

    public function getTagWeights($tags){
        $tagWeights = array();
        if (empty($tags))
            return $tagWeights;

        foreach ($tags as $tag)
        {
            $tagWeights[$tag] = (isset($tagWeights[$tag])) ? $tagWeights[$tag] + 1 : 1;
        }
        // Shuffle the tags
        uksort($tagWeights, function() {
            return rand() > rand();
        });

        $max = max($tagWeights);

        // Max of 5 weights
        $multiplier = ($max > 5) ? 5 / $max : 1;
        foreach ($tagWeights as &$tag)
        {
            $tag = ceil($tag * $multiplier);
        }

        return $tagWeights;
    }


    public function getBlog()
    {

    }
}