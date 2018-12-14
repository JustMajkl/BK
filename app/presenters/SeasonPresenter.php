<?php
/**
 * Created by PhpStorm.
 * User: Majkl
 * Date: 3/29/2018
 * Time: 5:28 PM
 */

namespace App\Presenters;

use Nette;
use app\model\SeasonManager;
use app\model\StatisticsManager;

class SeasonPresenter extends Nette\Application\UI\Presenter
{
	/** @var Nette\Database\Context */
	private $seasonManager;
	private $statisticsManager;

	public function __construct(SeasonManager $seasonManager, StatisticsManager $statisticsManager)
	{
		$this->seasonManager = $seasonManager;
		$this->statisticsManager = $statisticsManager;
	}

	public function renderDefault($id_sezona)
	{
		$this->template->sezony = $this->seasonManager->getSeasons();
		if(isset($id_sezona)) {
			$this->template->sezona = $this->seasonManager->getSeasonById($id_sezona);
			$this->template->statistiky = $this->statisticsManager->getYearRecords($id_sezona);
		}
	}

	public function renderRozlosovani($id_team)
	{
		$this->template->sezony = $this->seasonManager->getSeasons();
		if($id_team)
		{
			$this->template->rozlosovani = $this->seasonManager->getRozlosovaniByTeam($id_team);
		} else {
			$this->template->nextMatches = $this->seasonManager->getNextMatches();
		}
	}
}