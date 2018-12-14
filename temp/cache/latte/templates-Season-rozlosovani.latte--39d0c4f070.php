<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Season/rozlosovani.latte

use Latte\Runtime as LR;

class Template39d0c4f070 extends Latte\Runtime\Template
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
		if (isset($this->params['match'])) trigger_error('Variable $match overwritten in foreach on line 9');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockSubmenu($_args)
	{
		extract($_args);
		/* line 2 */
		$this->createTemplate('../seasonsubmenu.latte', $this->params, "include")->renderToContentType('html');
		
	}


	function blockContent($_args)
	{
		extract($_args);
		$this->renderBlock('title', get_defined_vars());
		if ($this->global->uiPresenter->isLinkCurrent("Season:rozlosovani")) {
?>
		<h2>Nejbližší zápasy:</h2>
<?php
			if (count($nextMatches) > 0) {
				$iterations = 0;
				foreach ($iterator = $this->global->its[] = new LR\CachingIterator($nextMatches) as $match) {
					if ($iterator->isFirst()) {
?>
					<table class="table table-dark table-striped">
					<thead class="thead-dark">
					<th>Kdo</th>
					<th>S kým</th>
					<th>Kde</th>
					<th>Kdy</th>
					</thead>
					<tbody>
<?php
					}
?>
				<tr>
					<td><?php echo LR\Filters::escapeHtmlText($match->ref('t_tymy', 'id_tym')->nazev) /* line 21 */ ?></td>
					<td><?php echo LR\Filters::escapeHtmlText($match->tym) /* line 22 */ ?></td>
					<td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->replace, call_user_func($this->filters->replace, $match->kde, '0', 'doma'), '1', 'venku')) /* line 23 */ ?></td>
					<td><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $match->kdy, '%d.%m.%Y')) /* line 24 */ ?></td>
				</tr>
<?php
					if ($iterator->isLast()) {
?>
					</tbody>
					</table>
<?php
					}
					$iterations++;
				}
				array_pop($this->global->its);
				$iterator = end($this->global->its);
			}
			else {
?>
			<p>Nenalezeny žádné další zápasy.</p>
<?php
			}
		}
		
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>Rozlosování</h1>
<?php
	}

}
