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

