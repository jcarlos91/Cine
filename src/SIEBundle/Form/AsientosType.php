<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsientosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fila','integer')
            ->add('columna','integer')
            ->add('sala','entity',array(
                'class'=>'SIEBundle\Entity\Sala',
                'required'=>true,
                'placeholder'=>'Seleciona un tipo de sala',
                'property'=>'tipoSala'
                )
            )
            ->add('estado','entity',array(
                'class'=>'SIEBundle\Entity\EstadoAsientos',
                'required'=>true,
                'placeholder'=>'Estado de los Acientos',
                'property'=>'estado'
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
            'data_class' => 'SIEBundle\Entity\Asientos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_asientos';
    }
}
