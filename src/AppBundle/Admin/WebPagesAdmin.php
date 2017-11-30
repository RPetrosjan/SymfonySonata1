<?php

/**
 * Created by PhpStorm.
 * User: Win10
 * Date: 12.11.2017
 * Time: 21:06
 */

namespace AppBundle\Admin;

use AppBundle\Entity\SaveBlock;
use AppBundle\Entity\Twigs;
use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\TwigsBlocks;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class WebPagesAdmin extends AbstractAdmin
{




    protected function configureFormFields(FormMapper $formMapper)
    {


        $builder = $formMapper->getFormBuilder();
        /** @var EntityManager $em */
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();


        //  Ruben 30/10/2017
        // Pres bumit pour verificatiob si le client (societe exist oui pas)

        //En cas si on choisisre Recuperer liste de projet par Alibeez on verifie si le client exist a la base
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) use($em) {

            //Recuperation des data(s) du formumlaire
            $data = $event->getData();
            $element = $event->getForm();
            dump($data);
            dump($element);



            foreach($data as $key => $block) {
                if(strstr($key, 'twigs_')) {
                    $myBlock = $em->getRepository('AppBundle:SaveBlock')->findOneBy(array('virtualNames' => $key));
                    if(is_null($myBlock)) {
                        $myBlock = new SaveBlock($key);
                    } else {
                        $myBlock->setTwigs([]);
                    }

                    foreach ($block as $twig) {
                        /** @var Twigs $twigInstance */
                        $twigInstance = $em->getRepository('AppBundle:Twigs')->find($twig);

                        $myBlock->addTwig($twigInstance);
                    }
                    $em->persist($myBlock);
                }
            }

            $em->flush();

            die('on est bien !');
        });

        $baseTwig = 'base_web.html.twig';
        $block = new TwigsBlocks();
        $ArrayBlocks = $block->getTotalBlocksBase($baseTwig);

        $formMapper
            ->add('pageTitle', 'text', array(
                'label' => $this->trans('page.title')
            ))
            ->add('pageName', 'text', array(
                'label' => $this->trans('page.name')
            ))
            ->add('pageRoute', 'text', array(
                'label' => $this->trans('page.route')
            ))
            ->add('twigs','entity',
                array(
                    'class' => 'AppBundle\Entity\Twigs',
                    'choice_label' => 'Twig Name',
                    'multiple' => true,
                )
            )
            ->add('pageKeyWord', 'text', array(
                'required' => false,
                'empty_data' => '',
            ))
            ->add('pageDescription', 'text', array(

                'required' => false,
                'empty_data' => '',

            ))
            ->end();

            foreach ($ArrayBlocks as $key=>$value){

                if(strstr($value,'block_'))
                {

                    $formMapper
                        ->with($value)
                        ->add('twigs_'.$key,'entity',
                            array(
                                'class' => 'AppBundle\Entity\Twigs',
                                'choice_label' => 'Twig Name',
                                'multiple' => true,
                                'mapped'=> false,
                            )
                        )
                        ->end();

                }
                //commandes
            }


        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('pageTitle');
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->add('pageTitle','text',array(
                'label' => 'Title',
                'editable' => true,
            ))
            ->add('twigs', 'entity', array(
                'class' => 'AppBundle\Entity\Twigs',
                'choice_label' => 'Twig Name',
                'editable' => true,
            ))
            ->add('pageKeyWord','text',array(
                'label' => 'KeyWords',
                'editable' => true,
            ))
            ->add('pageDescription','text',array(
                'label' => 'Description',
                'editable' => true,
            ))
            ->add('_action','actions',array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ));



    }
}