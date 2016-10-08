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
 * Class Blog
 * @package Blogger\BlogBundle\DomainObject
 * @ORM\Entity()
 * @ORM\Table(name="blog")
 */
class Blog
{
    /**
     * @var
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var
     * @ORM\Column(type="string", length=100)
     */
    protected $author;

    /**
     * @var
     * @ORM\Column(type="text")
     */
    protected $blog;

    /**
     * @var
     * @ORM\Column(type="string", length=20)
     */
    protected $image;

    /**
     * @var
     * @ORM\Column(type="text")
     */
    protected $tags;


    protected $comments;

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @var
     * @ORM\Column(type="datetime")
     */
    protected $updated;
}