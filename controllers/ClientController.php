<?php

class ClientController extends Controller
{
	/**
	 * Handles the contact form
	 * @param array $params Unused here
	 */
	public function process($params)
	{
		$clientManager = new ClientManager();
		// Sets HTML meta-data
		$this->head = array(
			'title' => 'Contact form',
			'description' => 'Contact us using our email form.'
		);

		// The form has been submitted?
		if (isset($_GET['logoff'])) {
			unset($_SESSION['logged_in_user_id']);
			unset($_SESSION['logged_in_user_prenom']);
			setcookie("logged_in_user_id", "", time() - 3600);
			setcookie("logged_in_user_prenom", "", time() - 3600);
			$this->redirect('mvc_pr/client');
		}

		if (isset($_POST['register'])) {
			if ($_POST['register'] == 'olduser') {
				var_dump($_POST);
				if (isset($_POST['email']) && isset($_POST['password'])) {


					if ($clientManager->getClientByLogin($_POST['email'], $_POST['password']) > 0) {

						$user_actuel = $clientManager->getClientByLoginPost($_POST['email'], $_POST['password']);
						setcookie('logged_in_user_id', $user_actuel[0]['id'], time() + 7200);
						setcookie('logged_in_user_prenom', $user_actuel[0]['prenom'], time() + 7200);
						$_SESSION['logged_in_user_id'] = $user_actuel[0]['id'];
						$_SESSION['logged_in_user_prenom'] = $user_actuel[0]['prenom'];
						$_SESSION['admin'] = $user_actuel[0]['admin'];
						// Setting template variables	
						$this->data['nom'] = $user_actuel[0]['nom'];
						$this->data['prenom'] = $user_actuel[0]['prenom'];
						$this->redirect('mvc_pr/client');
					} else {
						$this->view = 'clienterror';
						//echo '<script>$("#pastrouve").modal("show"); </script>';
					}
				}
			} else if ($_POST['register'] == 'newuser') {

				$exist_newuser = $clientManager->geClientByEmail($_POST['email']);
				if (isset($exist_newuser[0]['email'])) {
					$this->view = 'clientexist';
				} else {
					if ($_POST['password'] != $_POST['password_2']) {
						$this->view = 'clientbadpass';
					} else {
						$clientManager->insert($_POST);
						$user_actuel = $clientManager->getClientByLoginPost($_POST['email'], $_POST['password']);
						setcookie('logged_in_user_id', $user_actuel[0]['id'], time() + 7200);
						setcookie('logged_in_user_prenom', $user_actuel[0]['prenom'], time() + 7200);
						$_SESSION['logged_in_user_id'] = $user_actuel[0]['id'];
						$_SESSION['logged_in_user_prenom'] = $user_actuel[0]['prenom'];
						// Setting template variables	
						$this->data['nom'] = $user_actuel[0]['nom'];
						$this->data['prenom'] = $user_actuel[0]['prenom'];
						$this->redirect('mvc_pr/produit');
					}
				}
			}

			if ($_POST['register'] == 'admin') {
				if (isset($_POST['email']) && isset($_POST['password'])) {

					var_dump($_POST);
					if ($clientManager->getAdminByLogin($_POST['email'], $_POST['password']) > 0) {

						$user_actuel = $clientManager->getClientByLoginPost($_POST['email'], $_POST['password']);
						setcookie('logged_in_user_id', $user_actuel[0]['id'], time() + 7200);
						setcookie('logged_in_user_prenom', $user_actuel[0]['prenom'], time() + 7200);
						$_SESSION['logged_in_user_id'] = $user_actuel[0]['id'];
						$_SESSION['logged_in_user_prenom'] = $user_actuel[0]['prenom'];
						$_SESSION['admin'] = $user_actuel[0]['admin'];
						// Setting template variables	
						$this->data['nom'] = $user_actuel[0]['nom'];
						$this->data['prenom'] = $user_actuel[0]['prenom'];
						$this->redirect('mvc_pr/admin');
					} else {
						$this->view = 'clienterror';
						//echo '<script>$("#pastrouve").modal("show"); </script>';
					}
				}
			}
		}

		// Sets the view
		if (isset($_SESSION['logged_in_user_id'])) {
			$user_actuel = $clientManager->getClient($_SESSION['logged_in_user_id']);
			$this->data['nom'] = $user_actuel['nom'];
			$this->data['prenom'] = $user_actuel['prenom'];
			$this->data['adresse'] = $user_actuel['adresse'];
			$this->data['phone_number'] = $user_actuel['phone_number'];

			$this->view = 'client';
		}
	}
}
