<?php

namespace SIEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SIEBundle\Entity\Puesto;
use SIEBundle\Form\PuestoType;
use Symfony\Component\HttpFoundation\Request;

class PuestoController extends Controller{

	public function nuevoAction(Request $request){
		$puesto = new Puesto();
		$form = $this->createForm(new PuestoType(),$puesto);
		$form->HandleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($puesto);
				$em->flush();
				return $this->redirectToRoute('puesto_nuevo');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());	
			}
		}
		return $this->render('SIEBundle:Puesto:nuevo.html.twig',array(
			'form'=>$form->createView(),
			)
		);
	}

	public function puestosAction(){
		$reposritory = $this->getDoctrine()->getRepository('SIEBundle:Puesto');
		$puesto = $reposritory->findAll();

		return $this->render('SIEBundle:Puesto:all.html.twig',array(
			'puesto'=>$puesto,
			)
		);
	}

	public function editarAction(Request $request, Puesto $puesto){
		$form = $this->createForm(new PuestoType(), $puesto);
		$form->HandleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($puesto);
				$em->flush();
				return $this->redirectToRoute('puestos');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Puesto:editar.html.twig',array(
				'form'=>$form->createView(),
				'puesto'=>$puesto,
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getRepository('SIEBundle:Puesto');
			$puesto = $repository->find($id);
			$this->getDoctrine()->getManager()->remove($puesto);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('puestos');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());			
		}
	}
}
