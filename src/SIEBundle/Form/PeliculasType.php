<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PeliculasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo','text',array(
                'max_length'=>250,
                'attr' => array(
                  'class' => 'form-control'
                    )
                )
            )
            ->add('categoria','entity',array(
                'class'=>'SIEBundle\Entity\Categoria',
                'required'=>true,
                'placeholder'=>'Seleciona una Categoría',
                'property'=>'categoria',
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('imagen','url',array(
                'attr' => array(
                  'class' => 'form-control'
                    )
                )
            )
            ->add('descripcion','textarea',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('duracion','text',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('sala','entity',array(
                'class'=>'SIEBundle\Entity\Sala',
                'required'=>true,
                'placeholder'=>'Asignale una Sala',
                'property'=>'tipoSala',
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
            'data_class' => 'SIEBundle\Entity\Peliculas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_peliculas';
    }
}