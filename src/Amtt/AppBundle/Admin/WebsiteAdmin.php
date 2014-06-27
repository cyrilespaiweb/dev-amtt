<?php

namespace Amtt\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class WebsiteAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Nom du site'))
            ->add('uri', 'text', array('label' => 'Url du site'))
            ->add('internal_code', 'text', array('label' => 'Code interne'))
            ->add('phone', 'text', array('label' => 'Téléphone'))
            ->add('internal_id', 'text', array('label' => 'Numéro interne'))
            ->add('enabled')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('uri')
            ->add('phone')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name',null, array('label' => 'Nom du site'))
            ->add('uri',null, array('label' => 'Url du site'))
            ->add('phone',null, array('label' => 'Téléphone'))
            ->add('enabled')
        ;
    }
}