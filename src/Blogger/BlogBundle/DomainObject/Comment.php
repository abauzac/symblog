<?php
/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 08/10/2016
 * Time: 10:22
 */

namespace Blogger\BlogBundle\DomainObject;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Comment
 * @package Blogger\BlogBundle\DomainObject
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Repository\CommentRepository")
 * @ORM\Table(name="comment")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
{
    public function __construct()
    {
        $this->created = new DateTime();
        $this->updated = new DateTime();
        $this->approved = true;
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
     * @ORM\Column(type="string")
     */
    protected $user;

    /**
     * @var
     * @ORM\Column(type="text")
     */
    protected $comment;

    /**
     * @var
     * @ORM\Column(type="boolean")
     */
    protected $approved;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Blogger\BlogBundle\DomainObject\Blog", inversedBy="comments")
     * @ORM\JoinColumn(name="blog_id", referencedColumnName="id")
     */
    protected $blog;

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param mixed $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
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
     *
     */
    public function setUpdated()
    {
        $this->updated = new DateTime();
    }





}
