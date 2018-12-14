<?php
// source: C:\xampp\htdocs\BK\app\presenters\templates\adminmenu.latte

use Latte\Runtime as LR;

class Template54abdbb859 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div class="btn-group-vertical position-fixed mt-5">
<?php
		if (!$user->loggedIn) {
			?>		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Přihlásit se">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 5 */ ?>/images/icon-key-small.png" class="img-fluid">
			</button>
		</a>
<?php
		}
		else {
			?>		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Odhlásit se">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/images/icon-cross-small.png" class="img-fluid">
			</button>
		</a>

		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:vytvor")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Vytvořit článek">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 17 */ ?>/images/icon-pencil-small.png" class="img-fluid">
			</button>
		</a>

		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Team:vytvorHrace")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Přidat hráče/trenéra">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 23 */ ?>/images/icon-user-small.png" class="img-fluid">
			</button>
		</a>

		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Team:vytvorTym")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Přidat tým">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 29 */ ?>/images/icon-usergroup-small.png" class="img-fluid">
			</button>
		</a>

		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Season:pridejRozlosovani")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Přidat rozlosování">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 35 */ ?>/images/icon-calendar-small.png" class="img-fluid">
			</button>
		</a>

		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Season:pridejStatistiky")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Přidat statistiky">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 41 */ ?>/images/icon-bars-small.png" class="img-fluid">
			</button>
		</a>

		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Photo:pridej")) ?>">
			<button type="button" class="btn btn-light admin-gateway" data-toggle="tooltip" data-placement="right" title="Přidat fotku/galerii">
				<img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 47 */ ?>/images/icon-picture-small.png" class="img-fluid">
			</button>
		</a>
<?php
		}
		?></div><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
