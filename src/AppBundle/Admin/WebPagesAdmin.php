<?php

/**
 * Created by PhpStorm.
 * User: Win10
 * Date: 12.11.2017
 * Time: 21:06
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class WebPagesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
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