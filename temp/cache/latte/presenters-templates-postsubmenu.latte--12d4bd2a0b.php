<?php
// source: C:\xampp\htdocs\BK\app\presenters\templates\postsubmenu.latte

use Latte\Runtime as LR;

class Template12d4bd2a0b extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<nav class="nav pt-3 pb-3">
<?php
		$iterations = 0;
		foreach ($sekce as $sekceMenu) {
			?>		<?php
			if ($sekceMenu->id_sekce != 22) {
				?>			<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:", [$sekceMenu->id_sekce])) ?>"<?php
				if ($_tmp = array_filter(['nav-item','mx-1','mb-1','btn','btn-sm','btn-outline-light',$presenter->isLinkCurrent('Homepage:', $sekceMenu->id_sekce) ? 'active' : NULL])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
				echo LR\Filters::escapeHtmlText($sekceMenu->popis) /* line 4 */ ?></a>
<?php
			}
			$iterations++;
		}
?>
</nav>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['sekceMenu'])) trigger_error('Variable $sekceMenu overwritten in foreach on line 2');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
