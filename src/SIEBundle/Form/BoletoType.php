<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoletoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoboleto','text',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('precio','money',array(
                'currency'=> 'MXN',
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
            'data_class' => 'SIEBundle\Entity\Boleto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_boleto';
    }
}
