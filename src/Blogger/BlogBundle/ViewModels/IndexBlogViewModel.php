<?php
/**
 * Created by PhpStorm.
 * User: jivam
 * Date: 18/10/2016
 * Time: 16:15
 */

namespace Blogger\BlogBundle\ViewModels;


use Blogger\BlogBundle\DomainObject\Blog;
use Symfony\Component\Validator\Constraints\DateTime;

class IndexBlogViewModel
{

    public $id;

    public $createdDate;

    public $title;

    public $author;

    public $createdTime;

    public $tags;
    public $image;
    public $blog;


    public function __construct(Blog $blogModel)
    {
        $this->id = $blogModel->getId();
        $this->createdDate = $blogModel->getCreated();
        $this->title = $blogModel->getTitle();
        $this->author = $blogModel->getAuthor();
        $this->createdTime = $blogModel->getCreated();
        $this->tags = $blogModel->getTags();
        $this->image = $blogModel->getImage();
        $this->blog = $blogModel->getBlog();
    }

    public function getShortBlogPost(){
        if(is_null($this->blog) === false){

            return substr($this->blog, 0, 500);
        }else{
            return $this->blog;
        }
    }

}