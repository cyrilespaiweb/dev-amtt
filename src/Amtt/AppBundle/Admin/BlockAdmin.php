<?php

namespace Amtt\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class BlockAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Titre'))
            ->add('position', 'text', array('label' => 'Position'))
            ->add('column_width', 'text', array('label' => 'Largeur colonne'))
            ->add('content', 'textarea', array('attr' => array('class' => 'richEditor', 'rows' => '10', 'tinymce'=>'{"theme":"simple"}'),'label' => 'Texte' , 'required' => false));
        ;
    }
}