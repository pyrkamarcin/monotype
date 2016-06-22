<?php

namespace Monotype\Bundle\ManagerBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssortmentType
 * @package Monotype\Bundle\ManagerBundle\Form
 */
class AssortmentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class)
            ->add('name', TextType::class)
            ->add('customer', EntityType::class, array(
                'class' => 'Monotype\Bundle\ManagerBundle\Entity\Customer',
                'choice_label' => 'name'
            ));;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Monotype\Bundle\ManagerBundle\Entity\Assortment'
        ));
    }
}
