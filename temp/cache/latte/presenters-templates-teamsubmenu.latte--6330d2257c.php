<?php
// source: C:\xampp\htdocs\BK\app\presenters\templates\teamsubmenu.latte

use Latte\Runtime as LR;

class Template6330d2257c extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<nav class="nav pt-3 pb-3">
<?php
		$iterations = 0;
		foreach ($tymy as $tymMenu) {
			?>		<?php
			if ($tymMenu->id_tym != 22) {
				?>			<a class="nav-item mx-1 mb-1 btn btn-sm btn-outline-light <?php
				if ($this->global->uiPresenter->isLinkCurrent("Team:", [$tymMenu->id_tym])) {
					?> active<?php
				}
				?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Team:", [$tymMenu->id_tym])) ?>"><?php
				echo LR\Filters::escapeHtmlText($tymMenu->nazev) /* line 4 */ ?></a>
<?php
			}
			$iterations++;
		}
		?></nav><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['tymMenu'])) trigger_error('Variable $tymMenu overwritten in foreach on line 2');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
