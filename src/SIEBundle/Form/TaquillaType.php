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
            ->add('fila')
            ->add('columna')
            ->add('cantidad','text',array(
                'attr'=>array(
                    'id'=>'cantidad',
                    'name'=>'cantidad'
                    )
                )
            )
            ->add('total')
            ->add('cartelera','entity',array(
                'class'=>'SIEBundle\Entity\Cartelera',
                'required'=>true,
                'placeholder'=>'Seleciona una Cartelera',
                'property'=>'peliculaid'
                )
            )
            ->add('boleto','entity',array(
                'class'=>'SIEBundle\Entity\Boleto',
                'required'=>true,
                'placeholder'=>'seleciona un tipo de boleto',
                'property'=>'tipoBoleto'
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
