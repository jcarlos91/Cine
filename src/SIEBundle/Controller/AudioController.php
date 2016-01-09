<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Audio;
use SIEBundle\Form\AudioType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AudioController extends Controller{
	
	public function audioAction(){
		$repository = $this->getdoctrine()->getRepository('SIEBundle:Audio');
		$audio = $repository->findAll();

		return $this->render('SIEBundle:Audio:audio.html.twig',array(
			'audio'=>$audio
			)
		);
	}

	public function nuevoAction(Request $request){
		$audio = new Audio();
		$form = $this->createForm(new AudioType(), $audio);
		$form->handleRequest($request);

		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($audio);
				$em->flush();
				return $this->redirectToRoute('audio');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Audio:nuevo.html.twig',array(
			'audio'=>$audio,
			'form'=>$form->createView(),
			)
		);
	}

	public function editarAction(Request $request, Audio $audio){
		$form = $this->createForm(new AudioType(), $audio);
		$form->handleRequest($request);

		if($form->isValid() && $form->isSubmitted()){
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($audio);
				$em->flush();
				return $this->redirectToRoute('audio');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Audio:editar.html.twig',array(
			'audio'=>$audio,
			'form'=>$form->createView(),
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getRepository('SIEbundle:Audio');
			$audio = $repository->find($id);
			$em = $this->getDoctrine()->getManager();
			$em->remove($audio);
			$em->flush();
			return $this->redirectToRoute('audio');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());			
		}
	}
}