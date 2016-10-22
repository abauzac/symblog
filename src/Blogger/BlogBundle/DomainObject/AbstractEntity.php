<?php
/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 08/10/2016
 * Time: 10:22
 */

namespace Blogger\BlogBundle\DomainObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abstract Entity
 * @ORM\InheritanceType(value="SINGLE_TABLE")
 */
class AbstractEntity
{
    public function __construct()
    {
        $this->updated = new \DateTime();
    }

    /**
     * @var
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     *
     */
    public function setUpdated()
    {
        $this->updated = new \DateTime();
    }





}
