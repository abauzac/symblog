<?php

namespace Blogger\BlogBundle\ViewModels;

use Symfony\Component\Validator\Constraints as Assert;

class EnquiryViewModel
{
    /**
     * @var
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var
     * @Assert\Email(message="We want a real email !")
     */
    protected $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max = 50)
     */
    protected $subject;

    /**
     * @Assert\Length(min = 50, minMessage="too short !")
     */
    protected $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }



}