<?php
/**
 * Manages articles in the system
 * Class ArticleManager
 */
class ProduitManager
{
	/**
	 * Returns an article from the database by a URL
	 * @param string $url The URL
	 * @return array|false The article or false if not found
	 */

	public function getProduit($id)
	{
		return Db::queryOne('
			SELECT `id`, `reference`, `unity`, `unit_achat`, `prix`, `titre_en`, `description_en`, `titre_fr`, `description_fr`, `photo`, `stock`, `categorie`, `searchfield`
			FROM `produit`
			WHERE `id` = ?
		', array($id));
	}

	public function getProduitByCategory($category)
	{
		return Db::queryMany("
			SELECT `id`, `reference`, `unity`, `unit_achat`, `prix`, `titre_en`, `description_en`, `titre_fr`, `description_fr`, `photo`, `stock`, `categorie`, `searchfield`
			FROM `produit`
			WHERE `categorie` = ? 
			", array($category));
	}

	public function getProduitBySField($produit)
	{
		return Db::queryMany("
			SELECT `id`, `reference`, `unity`, `unit_achat`, `prix`, `titre_en`, `description_en`, `titre_fr`, `description_fr`, `photo`, `stock`, `categorie`, `searchfield`
			FROM `produit`
			WHERE `searchfield` LIKE '%$produit%'
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
	public function insert($params)
	{
		Db::insert("
		INSERT INTO produit (reference, unity, unit_achat, prix, titre_en, description_en, titre_fr, description_fr, photo, stock, categorie, searchfield) 
		values ('".$params['reference']."','".$params['unity']."','".$params['unit_achat']."','".$params['prix']."','".$params['titre_en']."','".$params['description_en']."','".$params['titre_fr']."','".$params['description_fr']."','".$params['photo']."','".$params['stock']."','".$params['categorie']."','".$params['searchfield']."')
		");
	}

	public function delete($id)
	{
		Db::delete("
		DELETE FROM produit WHERE id='$id';
		");
	}


}