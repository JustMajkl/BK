<?php
// source: C:\xampp\htdocs\BK\app\presenters\templates\seasonsubmenu.latte

use Latte\Runtime as LR;

class Templatef4d9d27ecb extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<nav class="nav pt-3 pb-3">
	<a class="nav-item mx-1 mb-1 btn btn-sm btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Season:rozlosovani")) {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Season:rozlosovani")) ?>">Rozlosování</a>
<?php
		$iterations = 0;
		foreach ($sezony as $sezonaMenu) {
			?>		<a class="nav-item mx-1 mb-1 btn btn-sm btn-outline-light <?php
			if ($this->global->uiPresenter->isLinkCurrent("Season:", [$sezonaMenu->id_sezona])) {
				?> active<?php
			}
			?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Season:", [$sezonaMenu->id_sezona])) ?>"><?php
			echo LR\Filters::escapeHtmlText($sezonaMenu->nazev) /* line 4 */ ?></a>
<?php
			$iterations++;
		}
		?></nav><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['sezonaMenu'])) trigger_error('Variable $sezonaMenu overwritten in foreach on line 3');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
