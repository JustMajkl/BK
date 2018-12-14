<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Season/default.latte

use Latte\Runtime as LR;

class Template20c3b50044 extends Latte\Runtime\Template
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
		if (isset($this->params['odehranych'])) trigger_error('Variable $odehranych overwritten in foreach on line 9');
		if (isset($this->params['body'])) trigger_error('Variable $body overwritten in foreach on line 45, 81');
		if (isset($this->params['trojky'])) trigger_error('Variable $trojky overwritten in foreach on line 117, 153');
		if (isset($this->params['sestky'])) trigger_error('Variable $sestky overwritten in foreach on line 189, 225');
		if (isset($this->params['fauly'])) trigger_error('Variable $fauly overwritten in foreach on line 261, 297');
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
		if (isset($statistiky)) {
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['odehrano']) as $odehranych) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Odehraných zápasů
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($odehranych->ref('t_hraci', 'id_hrac')->jmeno) /* line 29 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($odehranych->ref('t_hraci', 'id_hrac')->prijmeni) /* line 32 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText($odehranych->odehranych) /* line 35 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['body']) as $body) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Počet bodů
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($body->ref('t_hraci', 'id_hrac')->jmeno) /* line 65 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($body->ref('t_hraci', 'id_hrac')->prijmeni) /* line 68 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText($body->body_celkem) /* line 71 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['body']) as $body) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Průměr bodů
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($body->ref('t_hraci', 'id_hrac')->jmeno) /* line 101 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($body->ref('t_hraci', 'id_hrac')->prijmeni) /* line 104 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $body->body_celkem/$body->odehranych, 1)) /* line 107 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['trojky_strelba']) as $trojky) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Vystřelené trojky
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($trojky->ref('t_hraci', 'id_hrac')->jmeno) /* line 137 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($trojky->ref('t_hraci', 'id_hrac')->prijmeni) /* line 140 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText($trojky->trojky_dane) /* line 143 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['trojky_dane']) as $trojky) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Dané trojky
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($trojky->ref('t_hraci', 'id_hrac')->jmeno) /* line 173 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($trojky->ref('t_hraci', 'id_hrac')->prijmeni) /* line 176 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText($trojky->trojky_dane) /* line 179 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['sestky_strelba']) as $sestky) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Vystřelené šestky
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($sestky->ref('t_hraci', 'id_hrac')->jmeno) /* line 209 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($sestky->ref('t_hraci', 'id_hrac')->prijmeni) /* line 212 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText($sestky->sestky_strelba) /* line 215 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['sestky_dane']) as $sestky) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Průměr bodů
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($sestky->ref('t_hraci', 'id_hrac')->jmeno) /* line 245 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($sestky->ref('t_hraci', 'id_hrac')->prijmeni) /* line 248 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText($sestky->sestky_dane) /* line 251 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['fauly']) as $fauly) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Průměr bodů
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($fauly->ref('t_hraci', 'id_hrac')->jmeno) /* line 281 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($fauly->ref('t_hraci', 'id_hrac')->prijmeni) /* line 284 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText($fauly->fauly_celkem) /* line 287 */ ?>

				</td>
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
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($statistiky['fauly']) as $fauly) {
				if ($iterator->isFirst()) {
?>
				<table class="table table-dark table-striped table-sm">
				<thead>
				<tr>
					<th>
						Jméno
					</th>
					<th>
						Příjmení
					</th>
					<th>
						Průměr bodů
					</th>
				</tr>
				</thead>
				<tbody>
<?php
				}
?>
			<tr>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($fauly->ref('t_hraci', 'id_hrac')->jmeno) /* line 317 */ ?>

				</td>
				<td class="td-40">
					<?php echo LR\Filters::escapeHtmlText($fauly->ref('t_hraci', 'id_hrac')->prijmeni) /* line 320 */ ?>

				</td>
				<td class="td-20">
					<?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $fauly->fauly_celkem/$fauly->odehranych, 1)) /* line 323 */ ?>

				</td>
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
		
	}


	function blockTitle($_args)
	{
		extract($_args);
		?>	<h1>Sezóny<?php
		if (isset($sezona->nazev)) {
			?> > <?php
			echo LR\Filters::escapeHtmlText($sezona->nazev) /* line 5 */;
		}
?></h1>
<?php
	}

}
