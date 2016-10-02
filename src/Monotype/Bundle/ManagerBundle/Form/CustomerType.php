<?php

namespace Monotype\Bundle\ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerType
 * @package Monotype\Bundle\ManagerBundle\Form
 */
class CustomerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('shortName', TextType::class)
            ->add('description', TextType::class, array(
                'required' => false
            ))
            ->add('address', TextType::class, array(
                'required' => false
            ))
            ->add('city', TextType::class, array(
                'required' => false
            ))
            ->add('country', TextType::class, array(
                'required' => false
            ))
            ->add('phone', TextType::class, array(
                'required' => false
            ))
            ->add('fax', TextType::class, array(
                'required' => false
            ))
            ->add('email', EmailType::class, array(
                'required' => false
            ))
            ->add('web', TextType::class, array(
                'required' => false
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Monotype\Bundle\ManagerBundle\Entity\Customer'
        ));
    }
}
