<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace AppBundle\Admin;

use AppBundle\Entity\Article;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('content')
            ->add("user")
            ->add("category")
            ->add("tags")
            ->add('enabled', null,
                [
                    "required" => false
                ])
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('enabled')
            ->add("user")
            ->add("category")
            ->add("tags")
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('title')
            ->add('content')
            ->add("user")
            ->add("category")
            ->add("tags")
            ->add("enabled")
            ->add("createdAt")
            ->add('_action', 'actions', [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('content')
            ->add("user")
            ->add("category")
            ->add("tags")
            ->add("enabled")
            ->add("createdAt")
        ;
    }
}