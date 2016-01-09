<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\EstatusPelicula;
use SIEBundle\Form\EstatusPeliculaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EstatusPeliController extends Controller{

	public function nuevoAction(Request $request){
		$estatus = new EstatusPelicula();
		$form = $this->createForm(new EstatusPeliculaType(), $estatus);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($estatus);
				$em->flush();
				return $this->redirectToRoute('estatus_peli');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:EstatusPeli:nuevo.html.twig',array(
			'estatus'=>$estatus,
			'form'=>$form->createView()
			)
		);
	}

	public function editarAction(Request $request, EstatusPelicula $estatus){
		$form = $this->createForm(new EstatusPeliculaType(), $estatus);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($estatus);
				$em->flush();
				return $this->redirectToRoute('estatus_peli');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:EstatusPeli:nuevo.html.twig',array(
			'estatus'=>$estatus,
			'form'=>$form->createView()
			)
		);
	}

	public function estatusAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:EstatusPelicula');
		$estatus = $repository->findAll();

		return $this->render('SIEBundle:EstatusPeli:estatus.html.twig',array(
			'estatus'=>$estatus
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getReposiory('SIEBundle:EstatusPelicula');
			$estatus = $repository->find($id);
			$this->getDoctrine()->getManager()->remove($estatus);
			$this->getDoctrine()->getManager()->flush();
			return $this->redirectToRoute('estatus_peli');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());			
		}
	}
}