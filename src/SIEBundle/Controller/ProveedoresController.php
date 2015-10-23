<?php 

namespace SIEBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SIEBundle\Entity\Proveedor;
use SIEBundle\Form\ProveedorType;

class ProveedoresController extends Controller{
	public function proveedoresAction(){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Proveedor');
		$proveedor = $repository->findAll();

		return $this->render('SIEBundle:Proveedor:all.html.twig',array(
			'proveedor'=>$proveedor,
			)
		);
	}

	public function detalleAction($id){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Proveedor');
		$proveedor = $repository->find($id);

		return $this->render('SIEBundle:Proveedor:detalle.html.twig',array(
			'proveedor'=>$proveedor,
			)
		);
	}

	public function nuevoAction(Request $request){
		$proveedor = new Proveedor();
		$form = $this->createForm(new ProveedorType(),$proveedor);
		$form->HandleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			try {
				$em = $this->getDoctrine->getManagger();
				$em->persist($proveedor);
				$em->flush();
				return $this->generateToRoute('proveedores_nuevo');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Proveedor:nuevo.html.twig',array(
			'form'=>$form->createView(),
			'proveedor'=>$proveedor,
			)
		);
	}
}