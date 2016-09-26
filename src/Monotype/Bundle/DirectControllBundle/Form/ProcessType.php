<?php

namespace Monotype\Bundle\DirectControllBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ProcessType
 * @package Monotype\Bundle\DirectControllBundle\Form
 */
class ProcessType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pid', TextType::class)
            ->add('script', TextType::class)
            ->add('uid', TextType::class)
            ->add('datetime', DateTimeType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Monotype\Bundle\DirectControllBundle\Entity\Process'
        ));
    }
}
