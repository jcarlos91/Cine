<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Funcion;
use SIEBundle\Form\FuncionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FuncionesController extends Controller{

	public function nuevoAction(Request $request){
		$funcion = new Funcion();
		$form = $this->createForm(new FuncionType(), $funcion);
		$form->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($funcion);
				$em->flush();
				return $this->redirectToRoute('funciones_new');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Funciones:nuevo.html.twig',array(
			'funcion'=>$funcion,
			'form'=>$form->createView(),
			)
		);
	}

	public function funcionesAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Funcion');
		$funcion = $repository->findAll();

		return $this->render('SIEBundle:Funciones:funciones.html.twig',array(
			'funcion'=>$funcion,
			)
		);
	}

	public function editarAction(Request $request, Funcion $funcion){
		$form = $this->createForm(new FuncionType(), $funcion);
		$form->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($funcion);
				$em->flush();
				return $this->redirectToRoute('funciones');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Funciones:editar.html.twig',array(
			'funcion'=>$funcion,
			'form'=>$form->createView(),
			)
		);
	}

	public function eliminarAction($id){
		try {
			$em = $this->getDoctrine()->getRepository('SIEBundle:Funcion');
			$funcion = $em->find($id);
			$this->getDoctrine()->getManager()->remove($funcion);
			$this->getDoctrine()->getManager()->flush();
			return $this->redirectToRoute('funciones');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());
			
		}
	}
}