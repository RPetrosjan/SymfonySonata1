<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\WebPages;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Route("/{page}", requirements = { "path" = "^(?!login|admin).+" }  )
     * @Route("/{page}/{page_n1}", requirements = { "page" = "^(?!admin|login|blog|dashboard|create).+"} )
     */
    public function indexAction(Request $request)
    {

    ///    $translated = $this->get('translator')->trans('layout.logout');

        $em = $this->getDoctrine()->getManager();
        $WebPages = $em->getRepository('AppBundle:WebPages');


        $infoPage = $WebPages->findBy(array(
            'pageTitle'=>'Title Accueil',
        ));

        ///dump($infoPage->toArray());
        dump($infoPage[0]->getTwigs()->toArray()[0]->getTwigName());
        dump($infoPage[0]->getPageTitle());
        dump($infoPage[0]->getPageKeyWord());
        dump($infoPage[0]->getPageDescription());




        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'page' => $request->getPathInfo(),
        ]);
    }
}
