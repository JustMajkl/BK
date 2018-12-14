<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Homepage/uprav.latte

use Latte\Runtime as LR;

class Template29583641b8 extends Latte\Runtime\Template
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
		Tracy\Debugger::barDump(($post), '$post');
		$this->renderBlock('title', get_defined_vars());
		?>	<h2>Editace: <?php echo LR\Filters::escapeHtmlText($post->nadpis) /* line 7 */ ?></h2>
	<p class="text-justify"><?php echo $post->clanek /* line 8 */ ?></p>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>Novinky</h1>
<?php
	}

}
