<?php
/**
 * Created by PhpStorm.
 * User: Majkl
 * Date: 3/29/2018
 * Time: 5:28 PM
 */

namespace App\Presenters;

use Nette;
use app\model\TeamManager;


class TeamPresenter extends Nette\Application\UI\Presenter
{
	private $teamManager;

	public function __construct(TeamManager $teamManager)
	{
		$this->teamManager = $teamManager;
	}

	public function renderDefault($id_tym)
	{
		$this->template->tymy = $this->teamManager->getTeams();
		$this->template->hraci = $this->teamManager->getPlayersByTeam($id_tym);
		$this->template->tym = $this->teamManager->getTeamById($id_tym);

		$this->template->summary = $this->teamManager->getSummary();
	}

	/** @var Nette\Database\Context */
	/**
	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function renderDefault($id_tym)
	{
		if($id_tym) {
			$hraci = $this->database->table('t_hraci')->where('id_tym', $id_tym)->order('prijmeni');
			$tym = $this->database->table('t_tymy')->get($id_tym);

			$this->template->hraci = $hraci;
			$this->template->tym = $tym->nazev;
		}
	}*/
}