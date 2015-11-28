<?php

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',array(
                'attr'=>array(
                    'class'=>'form-control'
                    )
                )
            )
            ->add('password','password',array(
                    'required'=> true,
                    'max_length' => 8,
                    'attr'=>array(
                        'class'=>'form-control'
                        )
                    )
                )
            ->add('email','email',array(
                    'required'=> true,
                    'attr'=>array(
                        'class'=>'form-control'
                        )
                    )
                )
            ->add('isActive','choice',[
                    'choices'=>[
                    '1'=>'Si',
                    '2'=>'No'
                    ],
                    'required'=>true
                ],array(
                    'attr'=>array(
                        'class'=>'form-control'
                        )
                    )
                )
            ->add('roles','entity',array(
                    'class'=>'SIEBundle\Entity\Roles',
                    'required'=>true,
                    'placeholder'=>'Selecione un Rol',
                    'property'=>'role',
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
            'data_class' => 'SIEBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siebundle_user';
    }
}