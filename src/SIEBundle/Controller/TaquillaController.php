<?php 

namespace SIEBundle\Controller;

use SIEBundle\Entity\Taquilla;
use SIEBundle\Form\BoletoType;
use SIEBundle\Entity\Cartelera;
use SIEBundle\Entity\Boleto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaquillaController extends Controller{

	public function nuevoAction(Request $request, Cartelera $cartelera){
		$postData = $request->request->all();       
		$taquilla = new Taquilla();
		$sala = $cartelera->getSalaId();//Se obtione el Id de la Sala evienda el el post
		$repository = $this->getDoctrine()->getRepository('SIEBundle:Asientos');//se accede al la entidad Asientos 
		$asientos = $repository->findBySala($sala);//Se obtienen los asiento de la sala obtenida.
		//Se obtienes los limites de la sala 
		foreach ($asientos as $key => $x) {
			$a = $x->getFila();//limite de la fila
			$b = $x->getColumna();//limite de la columna 
		}
		//se obtiene la suma de los boletos
		$totalBoletos = array_sum($postData);

		$fil = rand(1,$a);//Se obtiene un nuemro ramdom para el asiento sin pasarse del limite de la fila
		$col = rand(1,$b - $totalBoletos);//Se obtiene un nuemro ramdom para el asiento sin pasarse del limite de la columna
		//print_r ($postData);
		
		
		/*for ($i=1; $i < count($postData); $i++) { 
			$boleto = $postData[$i];
			$cantidad = $postData[$i];
		}
		*/
		
		//if($request->getMethod() == 'POST' && $this->get('request')->request->get('confirmar')){
			try {
				$user = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
				$id = $userId->getId();
				$taquilla->setVendedor($user);
				$taquilla->setCartelera($cartelera);
				$taquilla->setCantidad($totalBoletos);
				$em = $this->getDoctrine()->getManager();
				$em->persist($taquilla);
				$em->flush();
				//return $this->redirectToRoute('taquilla_venta',array(''));
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request".$e->getMessage());				
			}
		//}

		return $this->render('SIEBundle:Taquilla:nuevo.html.twig',array(
			'taquilla'=>$taquilla,
			'cartelera'=>$cartelera,
			'sala'=>$sala,
			'asientos'=>$asientos,
			'fil' => $fil,
			'col' => $col,
			'posData'=>$postData,
			'totalBoletos'=>$totalBoletos,
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

	public function ventaAction(Request $request, Cartelera $cartelera){
		$postData = $request->request->all();

		return $this->render('SIEBundle:Taquilla:venta.html.twig',array(
			'postData'=>$postData,
			)
		);
	}
}