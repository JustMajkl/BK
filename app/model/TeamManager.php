<?php
/**
 * Created by PhpStorm.
 * User: Majkl
 * Date: 11/15/2018
 * Time: 1:51 PM
 */

namespace app\model;

use Nette;

class TeamManager
{
	use Nette\SmartObject;

	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function getTeams()
	{
		return $this->database->table('t_tymy');
	}

	public function getTeamById($id_team)
	{
		return $this->database->table('t_tymy')
			->get($id_team);
	}

	public function getPlayersByTeam($id_team)
	{
		if(isset($id_team))
		return $this->database->table('t_hraci')
			->where('id_tym = ', $id_team)
			->order('prijmeni');
	}

	public function getSummary()
	{
		return
			[
				0 => $this->database->table('t_treneri')->count('*'),
				1 => $this->database->table('t_treneri'),
				2 => $this->database->table('t_hraci')->count('*'),
				3 => ($this->database->table('t_hraci')->sum('vyska') / $this->database->table('t_hraci')->where('vyska')->count()),
				4 => $this->database->table('t_hraci')->order('vyska DESC')->fetch(),
				5 => $this->database->table('t_hraci')->where('vyska')->order('vyska')->fetch()
			];
	}
}