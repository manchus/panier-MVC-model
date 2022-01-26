<?php
/**
 * Manages articles in the system
 * Class ArticleManager
 */
class AdminManager
{
	/**
	 * Returns an article from the database by a URL
	 * @param string $url The URL
	 * @return array|false The article or false if not found
	 */

	public function getClient($id)
	{
		return Db::queryOne('
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`, `admin`
			FROM `client`
			WHERE `id` = ?
		', array($id));
	}

	public function getProduit($id)
	{
		return Db::queryOne("
			SELECT `id`, `reference`, `unity`, `unit_achat`, `prix`, `titre_en`, `description_en`, `titre_fr`, `description_fr`, `photo`, `stock`, `categorie`, `searchfield`
			FROM `produit`
			WHERE `id` = ?
			", array($id));
	}


	public function geClientByEmail($email)
	{
		return Db::queryMany("
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`, `admin`
			FROM `client`
			WHERE `email` = ? 
			", array($email));
	}

	public function getClientByLogin($email,$password)
	{
		return Db::query("
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`, `admin`
			FROM `client`
			WHERE `email` = ? AND `password` = ?
			", array($email,$password));
	}

	public function getAdminByLogin($email,$password)
	{
		return Db::query("
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`, `admin`
			FROM `client`
			WHERE `email` = ? AND `password` = ? AND `admin` = 'true'
			", array($email,$password));
	}

	public function getClientByLoginPost($email,$password)
	{
		return Db::queryMany("
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`, `admin`
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
			SELECT `id`, `nom`, `prenom`, `email`, `password`, `adresse`, `phone_number`, `admin`
			FROM `client`
			WHERE `admin` = "false"
			ORDER BY `nom` DESC
		');
	}
		/**
	 * Returns a list of all articles in the database
	 * @return array All the articles in the database
	 */
	public function insertClient($params)
	{
	
		Db::insert("
			INSERT INTO client ( nom, prenom, email, password, adresse, phone_number, `admin`) 
			values ('".$params['nom']."','".$params['prenom']."','".$params['email']."','".$params['password']."','".$params['adresse']."','".$params['phone']."','false')
		");
	}

	

	public function deleteClient($id)
	{
		Db::delete("
			DELETE FROM client WHERE id='$id';
		");
	}

		/**
	 * Returns a list of all articles in the database
	 * @return array All the articles in the database
	 */
	public function getAllProduits()
	{
		return Db::queryAll('
			SELECT `id`, `reference`, `unity`, `unit_achat`, `prix`, `titre_en`, `description_en`, `titre_fr`, `description_fr`, `photo`, `stock`, `categorie`, `searchfield`
			FROM `produit`
			ORDER BY `reference` DESC
		');
	}

	/**
	 * Returns a list of all articles in the database
	 * @return array All the articles in the database
	 */
	public function insertProduit($params)
	{
		Db::insert("
			INSERT INTO produit (reference, unity, unit_achat, prix, titre_en, description_en, titre_fr, description_fr, photo, stock, categorie, searchfield) 
			values ('".$params['reference']."','".$params['unity']."','".$params['unit_achat']."','".$params['prix']."','".$params['titre_en']."','".$params['description_en']."','".$params['titre_fr']."','".$params['description_fr']."','".$params['photo']."','".$params['stock']."','".$params['categorie']."','".$params['searchfield']."')
		");
	}

	

	public function deleteProduit($id)
	{
		Db::delete("
			DELETE FROM produit WHERE id='$id';
		");
	}

	public function updateProduit($id,$prix,$stock)
	{
 		Db::update("
		UPDATE produit
		SET prix='".$prix."', stock='".$stock."' 
		WHERE id=$id;
		"
		); 

/* 		Db::insert("
		INSERT INTO produit (reference, unity, unit_achat, prix, titre_en, description_en, titre_fr, description_fr, photo, stock, categorie, searchfield) 
		values ('111','113','114','115','116','117','118','119','120','121','122','123')
	"); */
	}

}