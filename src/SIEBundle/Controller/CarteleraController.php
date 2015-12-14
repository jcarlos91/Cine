<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Cartelera;
use SIEBundle\Form\CarteleraType;
use SIEBundle\Entity\Peliculas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CarteleraController extends Controller{

	public function carteleraAction(){
		$estatus = 1;
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Peliculas');
		$cartelera = $repository->findByEstatus($estatus);
		//$movies = array('peli' => $cartelera['id']);
		return $this->render('SIEBundle:Cartelera:cartelera.html.twig',array(
			'cartelera'=>$cartelera,
			//'movies'=>$movies,
			)
		);
	}

	public function nuevoAction(Request $request){
		$cartelera = new Cartelera();
		$form = $this->createForm(new CarteleraType(), $cartelera);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($cartelera);
				$em->flush();
				return $this->redirectToRoute('cartelera_new');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Cartelera:nuevo.html.twig',array(
				'cartelera'=>$cartelera,
				'form'=>$form->createView(),
			)
		);
	}
}