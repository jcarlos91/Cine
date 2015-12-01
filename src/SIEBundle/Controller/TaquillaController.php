<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Taquilla;
use SIEBundle\Form\TaquillaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaquillaController extends Controller{

	public function nuevoAction(Request $request){
		$taquilla = new Taquilla();
		$form = $this->createForm(new TaquillaType(), $taquilla);
		$form->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($taquilla);
				$em->flush();
				return $this->redirectToRoute('taquilla_new');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Taquilla:nuevo.html.twig',array(
			'taquilla'=>$taquilla,
			'form'=>$form->createForm(),
			)
		);
	}
}