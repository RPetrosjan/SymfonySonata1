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

class TwigsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('twigName', 'text')
            ->add('twigCss', 'text',array(
                'label' => 'Twig CSS',
                'required' => false,
                'empty_data' => '',
            ))
            ->add('twigJs', 'text', array(
                'label' => 'Twig Java Script',
                'required' => false,
                'empty_data' => '',
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('twigName');
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->add('twigName','text',array(
           'label' => 'Twig Name',
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