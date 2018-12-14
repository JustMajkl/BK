<?php
/**
 * Created by PhpStorm.
 * User: Majkl
 * Date: 11/15/2018
 * Time: 1:51 PM
 */

namespace app\model;

use Nette;

class SeasonManager
{
	use Nette\SmartObject;

	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function getSeasonById($id_season)
	{
		return $this->database->table('s_sezony')
			->get($id_season);
	}

	public function getRozlosovaniByTeam($id_team)
	{
			return $this->database->table('r_rozlosovani')
				->where('id_tym = ', $id_team)
				->order('kdy');
	}

	public function getNextMatches()
	{
		return $this->database->table('r_rozlosovani')
			->where('kdy >= ', new \DateTime())
			->order('kdy')
			->limit(10);
	}

	public function getSeasons()
	{
		return $this->database->table('s_sezony')
			->order('nazev DESC');
	}
}