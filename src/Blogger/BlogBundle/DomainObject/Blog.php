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

    /****** ACCESSORS ******/


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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * @param mixed $blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }



}