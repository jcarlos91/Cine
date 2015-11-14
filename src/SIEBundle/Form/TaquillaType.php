<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaquillaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vendedor')
            ->add('fila')
            ->add('columna')
            ->add('cantidad')
            ->add('total')
            ->add('hrVta')
            ->add('pelicula')
            ->add('boleto')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIEBundle\Entity\Taquilla'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_taquilla';
    }
}