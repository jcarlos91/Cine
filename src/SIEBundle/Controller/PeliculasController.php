<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Peliculas;
use SIEBundle\Form\PeliculasType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PeliculasController extends Controller{

	/**
     * @Route("/peliculas", name="peliculas", requirements={"peliculas" = ".+"})
     */
	public function nuevoAction(Request $request){
		$pelicula = new Peliculas();
		$form = $this->createForm(new PeliculasType(), $pelicula);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($pelicula);
				$em->flush();
				return $this->redirectToRoute('peliculas');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Peliculas:nuevo.html.twig',array(
			'pelicula'=>$pelicula,
			'form'=>$form->createView(),
			)
		);
	}

	public function peliculasAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Peliculas');
		$peliculas = $repository->findAll();

		return $this->render('SIEBundle:Peliculas:peliculas.html.twig',array(
			'peliculas'=>$peliculas,
			)
		);
	}

	public function editarAction(Request $request, Peliculas $pelicula){
		$form = $this->createForm(new PeliculasType, $pelicula);
		$form->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$this->getDoctrine()->getManager()->persist($pelicula);
				$this->getDoctrine()->getManager()->flush();
				return $this->redirectToRoute('peliculas');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Peliculas:editar.html.twig',array(
			'pelicula'=>$pelicula,
			'form'=>$form->createView(),
			)
		);
	}
}