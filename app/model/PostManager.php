<?php
/**
 * Created by PhpStorm.
 * User: Majkl
 * Date: 11/15/2018
 * Time: 1:51 PM
 */

namespace app\model;

use Nette;

class PostManager
{
	use Nette\SmartObject;

	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	//	POSTY
	public function getPublicPostsCount($id_category)
	{
		if(isset($id_category)) {
			return $this->database->table('c_clanek_new')
				->where('publikovat = ', 1)
				->where('id_sekce = ', $id_category)
				->count();
		} else {
			return $this->database->table('c_clanek_new')
				->where('publikovat = ', 1)
				->count();
		}
	}

	public function getPublicPosts($id_category, $limit, $offset)
	{
		if(isset($id_category)) {
			return $this->database->table('c_clanek_new')
				/**->select('c_clanek_new.*, c_sekce.popis AS Popis_sekce')**/
				->where('publikovat = ', 1)
				->where('id_sekce = ', $id_category)
				->order('datum DESC')
				->limit($limit, $offset);
		} else {
			return $this->database->table('c_clanek_new')
				->where('publikovat = ', 1)
				->order('datum DESC')
				->limit($limit, $offset);
		}
	}

	public function getPosts($id_category)
	{
		if(isset($id_category)) {
			return $this->database->table('c_clanek_new')
				->where('id_sekce = ', $id_category)
				->order('datum DESC');
		} else {
			return $this->database->table('c_clanek_new')
				->order('datum DESC');
		}
	}

	public function getPostById($id_post)
	{
		return $this->database->table('c_clanek_new')
			->get($id_post);
	}

	//	KATEGORIE
	public function getCategoryById($id_category)
	{
		return $this->database->table('c_sekce')
			->get($id_category);
	}

	public function getCategories()
	{
		return $this->database->table('c_sekce');
	}

	public function editPost($id, $array) {
		$this->database->table('c_clanek_new')
			->get($id)
			->update($array);
	}

	public function deletePost($id_post) {
		$this->database->table('c_clanek_new')
			->get($id_post)
			->delete();
	}
}