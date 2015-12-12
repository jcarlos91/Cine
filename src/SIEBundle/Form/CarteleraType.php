<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarteleraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('peliculaId','entity',array(
                'class'=>'SIEBundle\Entity\Peliculas',
                'required'=>true,
                'placeholder'=>'Selecciona una Pelicula',
                'property'=>'titulo',
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('salaId','entity',array(
                'class'=>'SIEBundle\Entity\Sala',
                'required'=>true,
                'placeholder'=>'Seleciona una Sala',
                'property'=>'tipoSala',
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('funcionId','entity',array(
                'class'=>'SIEBundle\Entity\Funcion',
                'required'=>true,
                'placeholder'=>'Seleciona una funcion',
                
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('audioId','entity',array(
                'class'=>'SIEBundle\Entity\Audio',
                'required'=>true,
                'placeholder'=>'Seleciona un tipo de audio',
                'property'=>'audio',
                'attr'=>array(
                    'class'=>'form-control'
                    )
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
            'data_class' => 'SIEBundle\Entity\Cartelera'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_cartelera';
    }
}
