<?php

namespace Monotype\Bundle\ManagerBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RateType
 * @package Monotype\Bundle\ManagerBundle\Form
 */
class RateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', TextType::class)
            ->add('description', TextType::class)
            ->add('assortment', EntityType::class, array(
                'class' => 'Monotype\Bundle\ManagerBundle\Entity\Assortment',
                'choice_label' => 'name'
            ))
            ->add('operation', EntityType::class, array(
                'class' => 'Monotype\Bundle\ManagerBundle\Entity\Operation',
                'choice_label' => 'name'
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Monotype\Bundle\ManagerBundle\Entity\Rate'
        ));
    }
}
