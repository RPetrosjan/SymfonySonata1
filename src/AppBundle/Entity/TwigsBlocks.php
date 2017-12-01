<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Twig\Environment;

/**
 * TwigsBlocks
 *
 * @ORM\Table(name="twigs_blocks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TwigsBlocksRepository")
 */
class TwigsBlocks
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
     * @ORM\Column(name="Blocks", type="string", length=255)
     */
    private $blocks;


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
     * Set blocks
     *
     * @param string $blocks
     *
     * @return TwigsBlocks
     */
    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * Get blocks
     *
     * @return string
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /*
     * Recuperation nom des block defini sur base_web.html.twig
     */
    public function getTotalBlocksBase($twigs){
        // Make Folder Dossier ou se trouve mes twigs
        $loader = new \Twig_Loader_Filesystem(array('../app/Resources/views/'));
        // Charger son environement
        $twig = new \Twig_Environment($loader);
        //Charger la base du twig
        $template = $twig->loadTemplate($twigs);
       /// $result = $template->renderBlock('blockname',array());
        return $template->getBlockNames();
    }
}

