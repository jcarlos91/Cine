<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Taquilla;
use SIEBundle\Form\TaquillaType;
use SIEBundle\Entity\Cartelera;
use SIEBundle\Entity\Boleto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaquillaController extends Controller{

	public function nuevoAction(Request $request, Cartelera $cartelera){
		$postData = $request->request->all();       
		$taquilla = new Taquilla();
		$form = $this->createForm(new TaquillaType(), $taquilla);
		$form->handleRequest($request);
		$sala = $cartelera->getSalaId();
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Asientos');
		$asientos = $repository->findBySala($sala);
		foreach ($asientos as $key => $x) {
			//$x = get_object_vars($value);
			$a = $x->getFila();
			$b = $x->getColumna();
		}
		$fil = rand(1,$a);
		$col = rand(1,$b);
		print_r ($postData);
		
		for ($i=1; $i < count($postData) ; $i++) { 
			$boleto = $postData[$i];
			$cantidad = $postData[$i];
		}
		print_r($boleto);
		print_r($cantidad);
		if($form->isValid() && $form->isSubmitted()){
			try {
				$cantidad = $postData['cantidad'];
		        $fila = $postData['fila'];
		        $columna = $postData['columna'];
				$user = $this->getUser();
				$taquilla->setVendedor($user);
				$taquilla->setCartelera($cartelera);
				$em = $this->getDoctrine()->getManager();
				$em->persist($taquilla);
				$em->flush();
				return $this->redirectToRoute('taquilla_new');
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Taquilla:nuevo.html.twig',array(
			'taquilla'=>$taquilla,
			'form'=>$form->createView(),
			'cartelera'=>$cartelera,
			'sala'=>$sala,
			'asientos'=>$asientos,
			'fil' => $fil,
			'col' => $col,
			'posData'=>$postData,
			'boleto'=>$boleto,
			'cantidad'=>$cantidad,
			)
		);
	}

	public function boletosAction(Request $request, Cartelera $cartelera){
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Boleto');
		$boleto = $repository->findAll();

		return $this->render('SIEBundle:Taquilla:selectBoleto.html.twig',array(
			'cartelera'=>$cartelera,
			'boleto'=>$boleto
			)
		);
	}
}