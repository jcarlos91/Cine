<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Productos;
use SIEBundle\Form\ProductosType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductosController extends Controller{

	public function nuevoAction(Request $request){
		$producto = new Productos();
		$form = $this->createForm(new ProductosType(), $producto);
		$form->handleRequest($request);

		if($form->isValid() && $form->isSubmitted()){
			try {
				$em=$this->getDoctrine()->getManager();
				$em->persist($producto);
				$em->flush();
				return $this->redirectToRoute('productos_new');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Productos:nuevo.html.twig',array(
			'producto'=>$producto,
			'form'=>$form->createView(),
			)
		);
	}

	public function productosAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Productos');
		$producto = $repository->findAll();

		return $this->render('SIEBundle:Productos:all.html.twig',array(
			'producto'=>$producto
			)
		);
	}

	public function editarAction(Request $request, Productos $producto){
		$form = $this->createForm(new ProductosType(), $producto);
		$form->handleRequest($request);

		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine()->getManager();
				$em->persist($producto);
				$em->flush();
				return $this->redirectToRoute('productos');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}

		return $this->render('SIEBundle:Productos:editar.html.twig',array(
			'producto'=>$producto,
			'form'=>$form->createView(),
			)
		);
	}

	public function eliminarAction($id){
		try {
			$repository = $this->getDoctrine()->getRepository('SIEBundle:Productos');
			$producto = $repository->find($id);
			$this->getDoctrine()->getManager();
			$this->getDoctrine()->getManager()->remove($producto);
			$this->getDoctrine()->getManager()->flush();
			return $this->redirectToRoute('productos');
		} catch (\Exception $e) {
			throw new \Exception("Error Processing Request".$e->getMessage());			
		}
	}
}