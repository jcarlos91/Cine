<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Asientos;
use SIEBundle\Form\AsientosType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AsientosController extends Controller{

	public function  nuevoAction(Request $request){
		$asientos = new Asientos();
		$form = $this->createForm(new AsientosType(), $asientos);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($asientos);
				$em->flush();
				return $this->redirectToRoute('asientos');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Asientos:nuevo.html.twig',array(
			'asientos'=>$asientos,
			'form'=>$form->createView(),
			)
		);
	}

	public function asientosAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Asientos');
		$asientos = $repository->findAll();

		return $this->render('SIEBundle:Asientos:asiento.html.twig',array(
			'asientos'=>$asientos
			)
		);
	}

	public function editarAction(Request $request, Asientos $asientos){
		$form = $this->createForm(new AsientosType(), $asientos);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($asientos);
				$em->flush();
				return $this->redirectToRoute('asientos');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Asientos:editar.html.twig',array(
			'asientos'=>$asientos,
			'form'=>$form->createView()
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getRepository('SIEBundle:Asientos');
			$asiento = $repository->find($id);
			$this->getDoctrine()->getManager()->remove($asiento);
			$this->getDoctrine()->getManager()->flush();
			return $this->redirectToRoute('asientos');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());			
		}
	}
}