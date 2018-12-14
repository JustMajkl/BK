<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template252ad2f283 extends Latte\Runtime\Template
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
		if (isset($this->params['post'])) trigger_error('Variable $post overwritten in foreach on line 6');
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
		$iterations = 0;
		foreach ($posts as $post) {
?>
		<div class="container bg-dark p-2 my-3">
			<h2><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:zobraz", [$post->id_clanek])) ?>">
				<?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->striptags, $post->nadpis)) /* line 9 */ ?></a>
<?php
			if (!$category) {
				?>					(<?php echo LR\Filters::escapeHtmlText($post->ref('c_sekce', 'id_sekce')->popis) /* line 11 */ ?>)
<?php
				Tracy\Debugger::barDump(($post->ref('c_sekce', 'id_sekce')), '$post->ref(\'c_sekce\', \'id_sekce\')');
			}
?>
			</h2>
			<sup>
				<?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $post->datum, '%d.%m.%Y %H:%I')) /* line 16 */ ?>&nbsp;
<?php
			if ($user->loggedIn) {
				?>				<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("uprav", [$post->id_clanek])) ?>">Upravit</a><?php
			}
?>
&nbsp;
<?php
			if ($user->loggedIn) {
?>				<a href="#" data-toggle="modal" data-target="#exampleModal">Smazat</a>
<?php
			}
?>

			</sup>
		</div>


<?php
			$iterations++;
		}
?>

	<div class="pagination justify-content-center">
<?php
		if (!$paginator->isFirst()) {
			?>		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$presenter->getRequest()->getParameter('id_category'), 1])) ?>">První</a>
		&nbsp;|&nbsp;
		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$presenter->getRequest()->getParameter('id_category'), $paginator->page-1])) ?>">Předchozí</a>
		&nbsp;|&nbsp;
<?php
		}
?>

		Stránka <?php echo LR\Filters::escapeHtmlText($paginator->page) /* line 35 */ ?> z <?php echo LR\Filters::escapeHtmlText($paginator->pageCount) /* line 35 */ ?>


<?php
		if (!$paginator->isLast()) {
?>
		&nbsp;|&nbsp;
		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$presenter->getRequest()->getParameter('id_category'), $paginator->page+1])) ?>">Další</a>
		&nbsp;|&nbsp;
		<a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$presenter->getRequest()->getParameter('id_category'), $paginator->pageCount])) ?>">Poslední</a>
<?php
		}
		Tracy\Debugger::barDump(($presenter->getRequest()->getParameter('id_category')), '$presenter->getRequest()->getParameter(\'id_category\')');
?>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Smazání příspěvku</h5>
					<button type="button" class="close " data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
		?>	<h1>Aktuality<?php
		if (isset($category->popis)) {
			?> > <?php
			echo LR\Filters::escapeHtmlText($category->popis) /* line 5 */;
		}
?></h1>
<?php
	}

}
