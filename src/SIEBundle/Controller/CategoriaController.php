<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Categoria;
use SIEBundle\Form\CategoriaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoriaController extends Controller {

	public function nuevoAction(Request $request){
		$categoria = new Categoria();
		$form = $this->createForm(new CategoriaType(), $categoria);
		$form ->handleRequest($request);
		if($form->isValid() && $form->isSubmitted()){
			try{
				$em = $this->getDoctrine()->getManager();
				$em->persist($categoria);
				$em->flush();
				return $this->redirectToRoute('categoria_new');
			}
			catch(\Exception $e){
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Categoria:nuevo.html.twig',array(
				'form'=>$form->createView(),
				'categoria'=>$categoria,
			)
		);
	}

	public function categoriasAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Categoria');
		$categoria = $repository->findAll();

		return $this->render('SIEBundle:Categoria:categorias.html.twig',array(
			'categoria'=>$categoria,
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getRepository('SIEBundle:Categoria');
			$puesto = $repository->find($id);
			$this->getDoctrine()->getManager()->remove($puesto);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('categorias');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());			
		}

	}

	public function editarAction(Request $request, Categoria $categoria){
		$form = $this->createForm(new CategoriaType(), $categoria);
		$form->HandleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($categoria);
				$em->flush();
				return $this->redirectToRoute('categorias');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Categoria:editar.html.twig',array(
				'form'=>$form->createView(),
				'categoria'=>$categoria,
			)
		);
	}
}