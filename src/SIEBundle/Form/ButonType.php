<?php 

namespace SIEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ButonType extends AbstractType{

	/**
	 *  @param FormBuilderInterface $builder
	 *	@param array $option
	 */

	public function buildForm(FormBuilderInterface $builder, array $option){
		$builder
			->add('Confirmar','submitt')
		;
	}	
}