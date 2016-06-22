<?php

namespace Monotype\Bundle\ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PlanType
 * @package Monotype\Bundle\ManagerBundle\Form
 */
class PlanType extends AbstractType
{

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
