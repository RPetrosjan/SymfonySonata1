<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaveBlock
 *
 * @ORM\Table(name="save_block")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaveBlockRepository")
 */
class SaveBlock
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
     * @ORM\Column(name="virtualNames", type="string", length=255)
     */
    private $virtualNames;

    /**
     * @ORM\ManyToMany(targetEntity="Twigs")
     */
     private $twigs;

    /**
     * @ORM\ManyToOne(targetEntity="WebPages")
     */
    private $WebPages;


    /**
     * SaveBlock constructor.
     */
    public function __construct($name)
    {
        $this->twigs = [];
        $this->setVirtualNames($name);

        $this->WebPages = null;
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
     * Set virtualNames
     *
     * @param string $virtualNames
     *
     * @return SaveBlock
     */
    public function setVirtualNames($virtualNames)
    {
        $this->virtualNames = $virtualNames;

        return $this;
    }

    /**
     * Get virtualNames
     *
     * @return string
     */
    public function getVirtualNames()
    {
        return $this->virtualNames;
    }

    /**
     * @return Twigs[]
     */
    public function getTwigs()
    {
        return $this->twigs;
    }

    /**
     * @param Twigs $twig
     */
    public function addTwig(Twigs $twig) {
        array_push($this->twigs, $twig);
    }

    /**
     * @param Twigs[] $twigs
     */
    public function setTwigs($twigs)
    {
        $this->twigs = $twigs;
    }

    /**
     * @return WebPages
     */
    public function getWebPages()
    {
        return $this->WebPages;
    }

    /**
     * @param WebPages[] $WebPages
     */
    public function setWebPages($WebPages)
    {
        $this->WebPages = $WebPages;
    }
}

