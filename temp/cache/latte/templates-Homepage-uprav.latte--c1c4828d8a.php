<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Homepage/uprav.latte

use Latte\Runtime as LR;

class Templatec1c4828d8a extends Latte\Runtime\Template
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
		extract($_args);
		/* line 2 */
		$this->createTemplate('../postsubmenu.latte', $this->params, "include")->renderToContentType('html');
		
	}


	function blockContent($_args)
	{
		extract($_args);
		$this->renderBlock('title', get_defined_vars());
		?>	<h2>Editace: <?php echo LR\Filters::escapeHtmlText($post->nadpis) /* line 6 */ ?></h2>
	<p class="text-justify"><?php echo $post->clanek /* line 7 */ ?></p>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>Novinky</h1>
<?php
	}

}
