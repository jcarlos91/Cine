<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\EstadoAsientos;
use SIEBundle\Form\EstadoAsientosType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EdoAcientoController extends Controller{

	public function nuevoAction(Request $request){
		$edo = new EstadoAsientos();
		$form = $this->createForm(new EstadoAsientosType(), $edo);
		$form->handleRequest($request);

		if ($form->isvalid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($edo);
				$em->flush();
				return $this->redirectToRoute('edo_asiento');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}
		return $this->render('SIEBundle:EdoAciento:nuevo.html.twig',array(
			'edo'=> $edo,
			'form'=>$form->createView(),
			)
		);
	}

	public function asientosAction(){
		$reposytori = $this->getDoctrine()->getRepository('SIEBundle:EstadoAsientos');
		$edo = $reposytori->findAll();

		return $this->render('SIEBundle:EdoAciento:asientos.html.twig',array(
			'edo'=>$edo,
			)
		);
	}

	public function eliminaraction($id){
		try {
			$reposytori = $this->getDoctrine()->getRepository('SIEBundle:EstadoAsientos');
			$edo = $reposytori->find($id);
			$this->getDoctrine()->getManager()->remove($edo);
			$this->getDoctrine()->getManager()->flush();
			return $this->redirectToRoute('edo_asiento');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request". $e->getMessage());			
		}
	}

	public function editarAction(Request $request, EstadoAsientos $edo){
		$form = $this->createForm(new EstadoAsientosType, $edo);
		$form->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($edo);
				$em->flush();
				return $this->redirectToRoute('edo_asiento');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}

		return $this->render('SIEBundle:EdoAciento:editar.html.twig',array(
			'edo'=>$edo,
			'form'=>$form->createView(),
			)
		);
	}
}