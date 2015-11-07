<?php 

namespace SIEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SIEBundle\Entity\Boleto;
use SIEBundle\Form\BoletoType;

class BoletosController extends Controller{

	public function nuevoAction(Request $request){
		$boleto = new Boleto();
		$form = $this->createForm(new BoletoType(), $boleto);
		$form->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$em = $this->getdoctrine()->getManager();
				$em->persist($boleto);
				$em->flush();
				return $this->redirectToRoute('boletos_new');				
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Boletos:nuevo.html.twig',array(
			'boleto' => $boleto,
			'form' => $form->createView(),
			)
		);
	}

	public function boletosAction(){
		$repository = $this->getDoctrien()->getRepository();
	}
}