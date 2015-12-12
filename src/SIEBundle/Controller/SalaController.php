<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Sala;
use SIEBundle\Form\SalaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SalaController extends Controller{

	public function nuevoAction(Request $request){
		$sala = new Sala();
		$form = $this->createForm(new SalaType(), $sala);
		$form->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$em = $this->getDoctrine()->getManager()->persist($sala);
				$em = $this->getDoctrine()->getManager()->flush();
				return $this->redirectToRoute('salas');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Sala:nuevo.html.twig',array(
			'form'=>$form->createView(),
			'sala'=>$sala,
			)
		);
	}

	public function salasAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Sala');
		$sala = $repository->findAll();

		return $this->render('SIEBundle:Sala:salas.html.twig',array(
			'sala'=>$sala,
			)
		);
	}

	public function editarAction(Request $request, Sala $sala){
		$form= $this->createForm(new SalaType(), $sala);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager()->persist($sala);
				$em = $this->getDoctrine()->getManager()->flush();
				return $this->redirectToRoute('salas');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Sala:editar.html.twig',array(
			'sala'=>$sala,
			'form'=>$form->createView(),
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getRepository('SIEBundle:Sala');
			$sala = $repository->find($id);
			$this->getDoctrine()->getManager()->remove($sala);
			$this->getDoctrine()->getManager()->flush();
			return $this->redirectToRoute('salas');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());			
		}
	}
}