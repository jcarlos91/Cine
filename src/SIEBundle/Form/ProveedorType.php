<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProveedorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razonsocial','text',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('rFC','text',array(
                'max_length'=>12,
                'attr'=>array(
                    'class'=>'form-control text-'
                    )
                )
            )
            ->add('direccion','textarea',array(
                'attr'=>array(
                    'class'=>'form-control',
                    'rows'=>3
                    )
                )
            )
            ->add('telefono','number',array(
                'max_length'=>10,
                /*'attr'=>array(
                    'class'=>'form-control'
                    )*/
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
            'data_class' => 'SIEBundle\Entity\Proveedor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_proveedor';
    }
}
