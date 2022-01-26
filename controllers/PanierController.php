<?php

class PanierController extends Controller
{
	public function process($params)
	{
		// Creating a model instance which allows us to access produits	
		$panierManager  = new PanierManager();
		$produitManager = new ProduitManager();

		
//		$this->data['produits'] = $produits;
//		$this->view = 'produits';
		if (!isset($_SESSION['panier'])){
			$_SESSION['panier']=array();
			$_SESSION['panier']['id_produit'] = array();
			$_SESSION['panier']['titre'] = array();
			$_SESSION['panier']['qteProduit'] = array();
			$_SESSION['panier']['prixProduit'] = array();
			$_SESSION['panier']['verrou'] = false;
		}

		if(isset($_GET["idd"]))
		{
			
				$idproduit =$_GET["idd"];
				$tmp=array();
				$tmp['id_produit'] = array();
				$tmp['titre'] = array();
				$tmp['qteProduit'] = array();
				$tmp['prixProduit'] = array();
				$tmp['verrou'] = $_SESSION['panier']['verrou'];
				for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
				{   
					
					if ($_SESSION['panier']['id_produit'][$i] !== intval($idproduit))
					{
					array_push( $tmp['id_produit'],$_SESSION['panier']['id_produit'][$i]);
					array_push( $tmp['titre'],$_SESSION['panier']['titre'][$i]);
					array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
					array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
					}
				}
				//On remplace le panier en session par notre panier temporaire à jour
				$_SESSION['panier'] =  $tmp;			   
				//On efface notre panier temporaire
				unset($tmp);

		}
		if(isset($_REQUEST["txn_id"]))
		{
				echo("<h2 class='text-light'>Transaction réussie</h2>");
				echo("<h3 class='text-light'>Transaction id:".$_REQUEST["txn_id"]."</h3>");
				echo("<h3 class='text-light'>Transaction temp: ".$_REQUEST["payment_date"]."</h3>");
				echo("<h3 class='text-light'>Merci pour votre achat, continuez à utiliser nos services.</h3>");
				session_destroy();	
		}
		
		
		if(isset($_SESSION))
		{
		if(count($_SESSION['panier']['id_produit'])>0){

			$count = count($_SESSION['panier']['id_produit']);
			
			for($i=0;$i<$count;$i++){
				$this->data['paniers'][$i]['titre'] = $_SESSION['panier']['titre'][$i];
				$this->data['paniers'][$i]['id_produit'] = $_SESSION['panier']['id_produit'][$i];
				$this->data['paniers'][$i]['qteProduit'] = $_SESSION['panier']['qteProduit'][$i];
				$this->data['paniers'][$i]['prixProduit'] = $_SESSION['panier']['prixProduit'][$i];

			}
			$this->data['total'] = PanierController::montant_global();

			$this->view = 'paniers';

		}	
		else	
			$this->view = 'panier';	

		}

		if(isset($_GET["param"]))
		{
			session_destroy();
				var_dump($_SESSION);
			$this->view = 'panier';	

		}

		if(isset($_GET["param2"]))
		{
			$achat_actuel=$panierManager->getMaxId();
			$n_fact = intval($achat_actuel['max(id)'])+1;
			$total = (PanierController::montant_global()+round(PanierController::montant_global()*0.14975,2));
			$this->data['n_fact'] = $n_fact;
			$this->data['total'] = $total;
	//		var_dump($n_fact );	
	//		var_dump($total );
			
			$count = count($_SESSION['panier']['id_produit']);
			$this->data['n_fact'] = $n_fact;
			$this->data['total'] = $total;
			$this->data['count'] = $count;

			for($i=0;$i<$count;$i++){
				$this->data['paniers'][$i]['titre'] = $_SESSION['panier']['titre'][$i];
				$this->data['paniers'][$i]['id_produit'] = $_SESSION['panier']['id_produit'][$i];
				$this->data['paniers'][$i]['qteProduit'] = $_SESSION['panier']['qteProduit'][$i];
				$this->data['paniers'][$i]['prixProduit'] = $_SESSION['panier']['prixProduit'][$i];
			}

			$panierManager->addFact( $n_fact,$total,(round(PanierController::montant_global()*0.09975,2)),
			(round(PanierController::montant_global()*0.05,2)),1,$_SESSION['logged_in_user_id']);

			for ($i=0; $i <$count ; $i++) {
				$panierManager->addFactProduit($_SESSION['panier']['id_produit'][$i],$n_fact,
				$_SESSION['panier']['qteProduit'][$i],$_SESSION['panier']['prixProduit'][$i]); 
			}
			$this->view = 'panierachat';						
		}
	
	}

	private function montant_global()
	{
		$total=0;
		$count=count($_SESSION['panier']['id_produit']);
		for ($i=0; $i <$count ; $i++) { 
			$total+=round((float)$_SESSION['panier']['qteProduit'][$i]*(float)$_SESSION['panier']['prixProduit'][$i],2);
		}
		return $total;
	}
}