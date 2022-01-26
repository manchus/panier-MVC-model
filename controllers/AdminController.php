<?php

class AdminController extends Controller
{
	/**
	 * Handles the contact form
	 * @param array $params Unused here
	 */
	public function process($params)
	{
		$adminManager = new AdminManager();
		// Sets HTML meta-data
		$this->head = array(
			'title' => 'Admin form',
			'description' => 'Admin form.'
		);

	//	var_dump($_SESSION);
		if (isset($_SESSION['logged_in_user_id'])) {
			$user_actuel = $adminManager->getClient($_SESSION['logged_in_user_id']);
			setcookie('logged_in_user_id', $user_actuel['id'], time() + 7200);
			setcookie('logged_in_user_prenom', $user_actuel['prenom'], time() + 7200);
			$_SESSION['logged_in_user_id'] = $user_actuel['id'];
			$_SESSION['logged_in_user_prenom'] = $user_actuel['prenom'];
			$_SESSION['admin'] = $user_actuel['admin'];
			// Setting template variables	
			$this->data['nom'] = $user_actuel['nom'];
			$this->data['prenom'] = $user_actuel['prenom'];
		}


		if (isset($_GET['logoff'])) {
			unset($_SESSION['logged_in_user_id']);
			unset($_SESSION['logged_in_user_prenom']);
			setcookie("logged_in_user_id", "", time() - 3600);
			setcookie("logged_in_user_prenom", "", time() - 3600);
			$this->redirect('mvc_pr/client');
		}


		$_SESSION['logged_in_admin_id'] = 'admin'; //$admin_actuel['id'];

		if (!empty($params[2])) {
			if ($_SESSION['adm_opt'] == 'produit') {
				if ($params[2] == 'delete') {
					$produit = $adminManager->getProduit($params[1]);
					$adminManager->deleteProduit($params[1]);
					$this->redirect('mvc_pr/admin?adminchoice=produit');
				}
				if ($params[2] == 'find') {
					$produit = $adminManager->getProduit($params[1]);
					$prdata[] = array(
						"nom" => $produit['titre_fr'],
						"prix" => $produit['prix'],
						"quantite" => $produit['stock']
					);
					echo json_encode($prdata);

				}
				if ($params[2] == 'update') {
					$produit = $adminManager->updateProduit($params[1], $_POST['prix'], $_POST['stock']);
				}
			} else if ($_SESSION['adm_opt'] == 'utilisateur') {
				var_dump($params[1]);
				$adminManager->deleteClient($params[1]);
				$this->redirect('mvc_pr/admin?adminchoice=utilisateur');
			}
		} else {
			if (isset($_GET['adminchoice'])) {
				if ($_GET['adminchoice'] == 'utilisateur') {
					$_SESSION['adm_opt'] = 'utilisateur';
					$clients = $adminManager->getAllClients();
					$this->data['clients'] = $clients;
					$this->view = 'adminutilisateur';
				}
				if ($_GET['adminchoice'] == 'produit') {
					$_SESSION['adm_opt'] = 'produit';
					$produits = $adminManager->getAllProduits();
					$this->data['produits'] = $produits;
					$this->view = 'adminproduit';
				}
			} else {
				$_SESSION['adm_opt'] = '';
				$this->view = 'admin';
			}
		}


		//	}

	}
}
