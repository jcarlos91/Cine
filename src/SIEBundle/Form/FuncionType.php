<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FuncionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hora','time')
            ->add('pelicula','entity',array(
                'class'=>'SIEBundle\Entity\Peliculas',
                'required'=>true,
                'placeholder'=>'Agrega una pelicula',
                'property'=>'titulo'
                )
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIEBundle\Entity\Funcion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_funcion';
    }
}
