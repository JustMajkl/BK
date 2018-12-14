<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template500c4200cb extends Latte\Runtime\Template
{
	public $blocks = [
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- responsive meta tag -->

	<link rel="stylesheet" type="text/css" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */ ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/css/custom.css">

	<script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */ ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/js/bootstrap.bundle.js"></script>

	<title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
		}
?> | BK Přelouč</title>

</head>

<body>

<?php
		/* line 19 */
		$this->createTemplate("adminmenu.latte", $this->params, "include")->renderToContentType('html');
?>


<div class="main container pb-3 mb-3">

<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	<div<?php if ($_tmp = array_filter(['flash', $flash->type, 'alert', 'alert-info'])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 24 */ ?></div>
<?php
			$iterations++;
		}
?>

	<nav class="nav pt-3 pb-3">
		<a class="nav-item mx-1 btn btn-lg btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Homepage:*")) {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:")) ?>">Aktuality</a>
		<a class="nav-item mx-1 btn btn-lg btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Team:*")) {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Team:")) ?>">Týmy</a>
		<a class="nav-item mx-1 btn btn-lg btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Season:*")) {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Season:")) ?>">Sezóny</a>
		<a class="nav-item mx-1 btn btn-lg btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Photo:*")) {
			?> active<?php
		}
		?> disabled" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Photo:")) ?>">Fotky</a>
		<a class="nav-item mx-1 btn btn-lg btn-outline-light <?php
		if ($this->global->uiPresenter->isLinkCurrent("Contact:*")) {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Contact:")) ?>">Kontakt</a>
	</nav>

<?php
		$this->renderBlock('submenu', $this->params, 'html');
		$this->renderBlock('content', $this->params, 'html');
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('scripts', get_defined_vars());
?>
</div>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 24');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
		<script>
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
		</script>
<?php
	}

}
