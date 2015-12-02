<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('descripcion','textarea',array(
                'max_length'=>250,
                )
            )
            ->add('cantidad','integer',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('costo','integer',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('precio','integer',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('proveedor','entity',array(
                'class'=>'SIEBundle\Entity\Proveedor',
                'required'=>true,
                'placeholder'=>'Selecciona un Proveedor',
                'property'=>'razonsocial',
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
            'data_class' => 'SIEBundle\Entity\Productos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_productos';
    }
}
