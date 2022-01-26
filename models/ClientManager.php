<?php
/**
 * Manages articles in the system
 * Class ArticleManager
 */
class ClientManager
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
			WHERE `email` = ? AND `password` = ? AND `admin` = 'false'
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
			INSERT INTO client ( nom, prenom, email, password, adresse, phone_number, `admin`) 
			values ('".$params['nom']."','".$params['prenom']."','".$params['email']."','".$params['password']."','".$params['adresse']."','".$params['phone']."','false')
		");
	}

	

	public function delete($id)
	{
		Db::delete("
			DELETE FROM client WHERE id='$id';
		");
	}


}