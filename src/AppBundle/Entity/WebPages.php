<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * WebPages
 *
 * @ORM\Table(name="web_pages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WebPagesRepository")
 */
class WebPages
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
     * @ORM\ManyToMany(targetEntity="Twigs")
     */
    private $twigs;

    /**
     * @var string
     *
     * @ORM\Column(name="PageTitle", type="string", length=255)
     */
    private $pageTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="PageName", type="string", length=255)
     */
    private $pageName;

    /**
     * @var string
     *
     * @ORM\Column(name="PageRoute", type="string", length=255)
     */
    private $pageRoute;


    /**
     * @var string
     *
     * @ORM\Column(name="PageKeyWord", type="string", length=255)
     */
    private $pageKeyWord;

    /**
     * @var string
     *
     * @ORM\Column(name="PageDescription", type="string", length=255)
     */
    private $pageDescription;

    public function __construct()
    {
        $this->twigs = new ArrayCollection();
    }

    /**
     * Add twigs
     *
     * @param string \AppBundle\Entity\Twigs $twigs
     *
     * @return Twigs
     */
    public function addTwigs(Twigs $twigs)
    {
        $this->twigs[] = $twigs;
        return $this;
    }

    /**
     * Remove twigs
     *
     * @param \AppBundle\Entity\Twigs $twigs
     */
    public function removeTwigs(Twigs $twigs)
    {
        $this->twigs->removeElement($twigs);
    }

    /**
     * Get twigs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTwigs()
    {
        return $this->twigs;
    }

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
     * Set pageTitle
     *
     * @param string $pageTitle
     *
     * @return WebPages
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    /**
     * Get pageTitle
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }


    /**
     * Set pageName
     *
     * @param string $pageName
     *
     * @return WebPages
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;
        return $this;
    }

    /**
     * Get pageName
     *
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }



    /**
     * Set PageRoute
     *
     * @param string $pageRoute
     *
     * @return WebPages
     */
    public function setPageRoute($pageRoute)
    {
        $this->pageRoute = $pageRoute;
        return $this;
    }

    /**
     * Get pageName
     *
     * @return string
     */
    public function getPageRoute()
    {
        return $this->pageRoute;
    }


    /**
     * Set pageKeyWord
     *
     * @param string $pageKeyWord
     *
     * @return WebPages
     */
    public function setPageKeyWord($pageKeyWord)
    {
        $this->pageKeyWord = $pageKeyWord;

        return $this;
    }

    /**
     * Get pageKeyWord
     *
     * @return string
     */
    public function getPageKeyWord()
    {
        return $this->pageKeyWord;
    }

    /**
     * Set pageDescription
     *
     * @param string $pageDescription
     *
     * @return WebPages
     */
    public function setPageDescription($pageDescription)
    {
        $this->pageDescription = $pageDescription;

        return $this;
    }

    /**
     * Get pageDescription
     *
     * @return string
     */
    public function getPageDescription()
    {
        return $this->pageDescription;
    }
}

