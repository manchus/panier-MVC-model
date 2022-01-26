<?php

class ProduitController extends Controller
{
	public function process($params)
	{
		// Creating a model instance which allows us to access produits
		$produitManager = new ProduitManager();

		if (!isset($_SESSION['panier'])){
			$_SESSION['panier']=array();
			$_SESSION['panier']['id_produit'] = array();
			$_SESSION['panier']['titre'] = array();
			$_SESSION['panier']['qteProduit'] = array();
			$_SESSION['panier']['prixProduit'] = array();
			$_SESSION['panier']['verrou'] = false;
		 }

		// The URL for displaying produit is entered
		if (!empty($params[1]))
		{
			// Retrieving an produit by the URL
			$produit = $produitManager->getProduit($params[1]);
			// If no produit was found we redirect to the ErrorController	
			if (!$produit)
				$this->redirect('mvc_pr/error');

			// HTML head
			$this->head = array(
					'title' => $produit['reference'],
					'description' => $produit['description_fr'],
			);

			// Setting template variables
			$this->data['id'] = $produit['id'];
			$this->data['reference'] = $produit['reference'];
			$this->data['unity'] = $produit['unity'];
			$this->data['unit_achat'] = $produit['unit_achat'];
			$this->data['prix'] = $produit['prix'];
			$this->data['titre_en'] = $produit['titre_en'];
			$this->data['description_en'] = $produit['description_en'];
			$this->data['titre_fr'] = $produit['titre_fr'];
			$this->data['description_fr'] = $produit['description_fr'];
			$this->data['photo'] = $produit['photo'];
			$this->data['stock'] = $produit['stock'];
			$this->data['categorie'] = $produit['categorie'];
			$this->data['searchfield'] = $produit['searchfield'];

			// Setting the template
			$this->view = 'produit';			
		}
		else
			// No URL entered so we list all produits
		{
			if(isset($_GET['choix']))
			{
				$produits = $produitManager->getProduitByCategory($_GET['choix']);
			}	
			else if(isset($_GET['produit'])) 
			{
				$produits = $produitManager->getProduitBySField($_GET['produit']);
			}
			else{
				$produits = $produitManager->getAllProduits();
			} 

			if(isset($_POST["ajout"]))
			{   
				$produit=$produitManager->getProduit($_POST["produit"]);
				$kk =-1;
				foreach ($_SESSION['panier']['id_produit'] as $key => $value) {
					echo "KEy:".$key;
				if($value==$produit["id"])
				{
					$kk = $key;
				}   
				}
			 	if($kk ==-1)
				{
				array_push( $_SESSION['panier']['id_produit'],$produit["id"]);
				array_push( $_SESSION['panier']['titre'],$produit["titre_fr"]);
				array_push( $_SESSION['panier']['qteProduit'],$_POST["qte"]);
				array_push( $_SESSION['panier']['prixProduit'],$produit["prix"]);
				}
				else
					{
						$_SESSION['panier']['qteProduit'][$kk] += $_POST["qte"] ;

					}

			}

			$this->data['produits'] = $produits;
			
			$this->view = 'produits';
		}
			
		//Aparece siempre, como no se genera dentro de la vista se muestra encima de la barra de menu			

	}

}