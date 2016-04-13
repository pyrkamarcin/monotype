<?php

namespace Monotype\Bundle\DirectControllBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class MachinesType
 * @package Monotype\Bundle\DirectControllBundle\Form
 */
class MachinesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('command')
            ->add('protocol')
            ->add('address')
            ->add('port', null, array('attr' => array('maxlength' => 4)))
            ->add('localtion');
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Monotype\Bundle\DirectControllBundle\Entity\Machines'
        ));
    }
}
