<?php
// source: C:\xampp\htdocs\BK\app\presenters\templates\contactsubmenu.latte

use Latte\Runtime as LR;

class Templateaf33ca4c73 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<nav class="nav pt-3 pb-3">
	<a class="nav-item mx-1 btn btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Contact:")) {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Contact:")) ?>">BK Přelouč</a>
	<a class="nav-item mx-1 btn btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Contact:web")) {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Contact:web")) ?>">Web</a>
</nav><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
