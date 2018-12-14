<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Contact/default.latte

use Latte\Runtime as LR;

class Template6ec1646e28 extends Latte\Runtime\Template
{
	public $blocks = [
		'submenu' => 'blockSubmenu',
		'content' => 'blockContent',
		'title' => 'blockTitle',
	];

	public $blockTypes = [
		'submenu' => 'html',
		'content' => 'html',
		'title' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('submenu', get_defined_vars());
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockSubmenu($_args)
	{
		
	}


	function blockContent($_args)
	{
		extract($_args);
		$this->renderBlock('title', get_defined_vars());
?>
		<div class="container bg-dark p-2 my-3">
			<h2>Informace</h2>
		</div>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>BK Přelouč</h1>
<?php
	}

}
