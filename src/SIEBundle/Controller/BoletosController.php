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
				$em = $this->getDoctrine()->getManager();
				$em->persist($boleto);
				$em->flush();
				return $this->redirectToRoute('boletos	');				
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
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Boleto');
		$boleto = $repository->findAll();

		return $this->render('SIEBundle:Boletos:boletos.html.twig',array(
			'boleto'=>$boleto,
			)
		);
	}

	public function editarAction(Request $request, Boleto $boleto){
		$form = $this->createForm(new BoletoType(), $boleto);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($boleto);
				$em->flush();
				return $this->redirectToRoute('boletos');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Boletos:editar.html.twig', array(
			'form'=>$form->createView(),
			'boleto'=>$boleto,
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getRepository('SIEBundle:Boleto');
			$boleto  = $repository->find($id);
			$this->getDoctrine()->getManager()->remove($boleto);
			$this->getDoctrine()->getManager()->flush();
			return $this->redirectToRoute('boletos');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request". $e->getMessage());			
		}
	}
}