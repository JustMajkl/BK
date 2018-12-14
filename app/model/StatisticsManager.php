<?php
/**
 * Created by PhpStorm.
 * User: Majkl
 * Date: 11/28/2018
 * Time: 2:56 PM
 */

namespace app\model;

use Nette;

class StatisticsManager
{
	use Nette\SmartObject;

	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function getLifetimeRecords()
	{
		// TODO
	}

	public function getYearRecords($id_season)
	{
		$limit = 5;
		// select vsech statistik z daneho roku
		$statistiky = $this->database->table('statistiky')
		->where('id_sezona = ', $id_season);

		// top X hracu v poctu odehranych zapasu
		$odehrano = $statistiky->order('odehranych DESC')
			->limit($limit);
		/**
		$odehrano = $this->database->table('statistiky')
			->where('id_sezona = ', $id_season)
			->order('odehranych DESC')
			->limit(5);
		 */

		// top X hracu v poctu celkovych bodu
		$body = $statistiky->order('body_celkem DESC')
			->limit($limit);
		/**
		$body = $this->database->table('statistiky')
			->where('id_sezona = ', $id_season)
			->order('body_celkem DESC')
			->limit(5);
		 */

		// top X hracu v prumeru bodu na zapas	=> pocitano primo v latte
		/**
		$body_prumer = $this->database->table('statistiky')
		->where('id_sezona = ', $id_season)
		->order('(body_celkem/odehranych) DESC')
		->limit(5);
		 */

		// top X hracu v poctu vystrelenych trojek
		$trojky = $statistiky->order('trojky_strelba DESC')
			->limit($limit);
		/**
		$trojky = $this->database->table('statistiky')
			->where('id_sezona = ', $id_season)
			->order('trojky_dane DESC')
			->limit(5);
		 */

		// top X hracu v poctu danych trojek
		$trojky_dane = $statistiky->order('trojky_dane DESC')
			->limit($limit);

		// top X hracu v poctu strelenych sestek
		$sestky = $statistiky->order('sestky_strelba')
			->limit($limit);
		/**
		$sestky = $this->database->table('statistiky')
			->where('id_sezona = ', $id_season)
			->order('sestky_strelba DESC')
			->limit(5);
		 */

		// top X hracu v poctu danych sestek
		$sestky_dane = $statistiky->order('sestky_dane')
			->limit($limit);
		/**
		$sestky_dane = $this->database->table('statistiky')
			->where('id_sezona = ', $id_season)
			->order('sestky_dane DESC')
			->limit(5);
		 */

		// top X hracu v poctu celkovych faulu
		$fauly = $statistiky->order('fauly_celkem')
			->limit($limit);
		/**
		$fauly = $this->database->table('statistiky')
			->where('id_sezona = ', $id_season)
			->order('fauly_celkem DESC')
			->limit(5);
		 */

		// top X hracu v poctu faulu na zapas
		/**
		$fauly_prumer = $this->database->table('statistiky')
		->where('id_sezona = ', $id_season)
		->order('(fauly_celkem/odehranych) DESC')
		->limit(5);
		 **/

		return [
			'odehrano' => $odehrano,
			'body' => $body,
			'trojky_strelba' => $trojky,
			'trojky_dane' => $trojky_dane,
			'sestky_strelba' => $sestky,
			'sestky_dane' => $sestky_dane,
			'fauly' => $fauly
		];
	}
}