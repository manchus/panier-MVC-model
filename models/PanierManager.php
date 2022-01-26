<?php
/**
 * Manages articles in the system
 * Class ArticleManager
 */
class PanierManager
{
	/**
	 * Returns an article from the database by a URL
	 * @param string $url The URL
	 * @return array|false The article or false if not found
	 */

	public function getClient($id)
	{
		return Db::queryOne('
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`
			FROM `client`
			WHERE `id` = ?
		', array($id));
	}

	public function geClientByEmail($email)
	{
		return Db::queryMany("
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`
			FROM `client`
			WHERE `email` = ? 
			", array($email));
	}

	public function getClientByLogin($email,$password)
	{
		return Db::query("
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`
			FROM `client`
			WHERE `email` = ? AND `password` = ?
			", array($email,$password));
	}

	public function getClientByLoginPost($email,$password)
	{
		return Db::queryMany("
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`
			FROM `client`
			WHERE `email` = ? AND `password` = ?
			", array($email,$password));
	}

	/**
	 * Returns a list of all articles in the database
	 * @return array All the articles in the database
	 */
	public function getAllClients()
	{
		return Db::queryAll('
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`
			FROM `client`
			ORDER BY `nom` DESC
		');
	}
		/**
	 * Returns a list of all articles in the database
	 * @return array All the articles in the database
	 */
	public function insert($params)
	{
	
		Db::insert("
			INSERT INTO client ( nom, prenom, email, password, adresse, phone_number) 
			values ('".$params['nom']."','".$params['prenom']."','".$params['email']."','".$params['password']."','".$params['adresse']."','".$params['phone']."')
		");
	}

	public function addFact($id, $total, $tvq, $tvp, $time, $id_client)
	{
		//var_dump($params);
	
		Db::insert("
			INSERT INTO achat(id, total, tvq, tvp, time, id_client) 
			values ('".$id."','".$total."','".$tvq."','".$tvp."',current_timestamp(),'".$id_client."')
		");

	}

	public function addFactProduit($id_produit, $id_achat, $quantite, $prix)
	{
		//var_dump($params);
	
	//	Db::update("UPDATE FROM PRODUIT stock=stock-$quantite where id=$id_produit")
	
		Db::insert("
			INSERT INTO achat_produit (id_produit, id_achat, quantite, prix) 
			values ('".$id_produit."','".$id_achat."','".$quantite."','".$prix."')
		");

	}


	public function delete($id)
	{
		Db::delete("
			DELETE FROM client WHERE id='$id';
		");
	}

	public function getMaxId()
	{
		return Db::queryOne('
		SELECT max(id) from achat
		');
	}

}