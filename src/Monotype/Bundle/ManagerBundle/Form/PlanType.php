<?php

namespace Monotype\Bundle\ManagerBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PlanType
 * @package Monotype\Bundle\ManagerBundle\Form
 */
class PlanType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orderNumber', TextType::class)
            ->add('orderPosition', TextType::class)
            ->add('description', TextType::class, array(
                'required' => false
            ))
            ->add('pc', NumberType::class)
            ->add('customer', EntityType::class, array(
                'class' => 'Monotype\Bundle\ManagerBundle\Entity\Customer',
                'choice_label' => 'name'
            ))
            ->add('assortment', EntityType::class, array(
                'class' => 'Monotype\Bundle\ManagerBundle\Entity\Assortment',
                'choice_label' => 'name'
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Monotype\Bundle\ManagerBundle\Entity\Plan'
        ));
    }
}
