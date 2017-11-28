<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Twigs
 *
 * @ORM\Table(name="twigs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TwigsRepository")
 */
class Twigs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TwigCss", type="string", length=255)
     */
    private $twigCss = '';

    /**
     * @var string
     *
     * @ORM\Column(name="TwigName", type="string", length=255)
     */
    private $twigName;

    /**
     * @var string
     *
     * @ORM\Column(name="TwigJs", type="string", length=255)
     */
    private $twigJs = '';


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set twigCss
     *
     * @param string $twigCss
     *
     * @return Twigs
     */
    public function setTwigCss($twigCss)
    {
        $this->twigCss = $twigCss;

        return $this;
    }

    /**
     * Get twigCss
     *
     * @return string
     */
    public function getTwigCss()
    {
        return $this->twigCss;
    }

    /**
     * Set twigName
     *
     * @param string $twigName
     *
     * @return Twigs
     */
    public function setTwigName($twigName)
    {
        $this->twigName = $twigName;

        return $this;
    }

    /**
     * Get twigName
     *
     * @return string
     */
    public function getTwigName()
    {
        return $this->twigName;
    }

    /**
     * Set twigJs
     *
     * @param string $twigJs
     *
     * @return Twigs
     */
    public function setTwigJs($twigJs)
    {
        $this->twigJs = $twigJs;

        return $this;
    }

    /**
     * Get twigJs
     *
     * @return string
     */
    public function getTwigJs()
    {
        return $this->twigJs;
    }

    /**
     * @ORM\ManyToMany(targetEntity="WebPages")
     */
    protected $webpages;

    public function __construct()
    {
        $this->webpages = new ArrayCollection();
    }

    public function __toString() {

        if(is_null($this->twigName)) {
            return 'NULL';
        }
        return $this->twigName;
    }
}

