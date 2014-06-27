<?php

namespace Amtt\AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PageAdmin extends Admin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('content', $this->getRouterIdParameter().'/content');
        $collection->add('blockList', $this->getRouterIdParameter().'/blockList');
        $collection->add('editBlock', $this->getRouterIdParameter().'/editBlock');
        $collection->add('deleteBlock', $this->getRouterIdParameter().'/deleteBlock');
        $collection->add('createBlock', $this->getRouterIdParameter().'/createBlock');
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('website', 'entity', array('label' => 'Site associé',
                                             'class' => 'Amtt\AppBundle\Entity\Website',
                                             'empty_value' => 'Page  par défaut (non atribuée à un site)',
                                             'required' => false))
            ->add('name', 'text', array('label' => 'Nom de la page'))
            ->add('slug', 'text', array('label' => 'Url de la page' , 'required' => false))
            ->add('title', 'text', array('label' => 'Balise title de la page', 'required' => false))
            ->add('meta_description', 'text', array('label' => 'Balise meta description de la page', 'required' => false))
            ->add('meta_keywords', 'text', array('label' => 'Balise meta keyword de la page', 'required' => false))
            ->add('position', 'text', array('label' => 'Position'))
            ->add('enabled', 'checkbox', array('label' => 'Active'))
            ->add('default', 'checkbox', array('label' => 'Page par défaut'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('enabled')
            ->add('default')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name',null, array('label' => 'Nom de la page'))
            ->add('slug',null, array('label' => 'Url de la page'))
            ->add('enabled')
            ->add('default')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'Editer le contenu' => array(
                        'template' => 'AmttAppBundle:Admin:Page/list__action_edit_content.html.twig'
                    ),
                    'Modifier' => array(
                        'template' => 'SonataAdminBundle:CRUD:list__action_edit.html.twig'
                    )
                )
            ))
        ;
    }

    public function prePersist($page)
    {
        $page->setInternalCode('');
    }
} 