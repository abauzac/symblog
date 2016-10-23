<?php
/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 22/10/2016
 * Time: 17:42
 */

namespace Blogger\BlogBundle\Repository;


use Blogger\BlogBundle\DomainObject\AbstractEntity;
use Doctrine\ORM\EntityRepository;

class AbstractRepository extends EntityRepository
{
    public function create(AbstractEntity $entity){
        $this->getEntityManager()
            ->persist($entity);
        $this->getEntityManager()->flush();
    }
}