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
				return $this->redirecToRoute('productos_new');
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
}