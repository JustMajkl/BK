<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Team/default.latte

use Latte\Runtime as LR;

class Templatec0bf40468c extends Latte\Runtime\Template
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
		if (isset($this->params['trainer'])) trigger_error('Variable $trainer overwritten in foreach on line 19');
		if (isset($this->params['hrac'])) trigger_error('Variable $hrac overwritten in foreach on line 46');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockSubmenu($_args)
	{
		extract($_args);
		/* line 2 */
		$this->createTemplate('../teamsubmenu.latte', $this->params, "include")->renderToContentType('html');
		
	}


	function blockContent($_args)
	{
		extract($_args);
		$this->renderBlock('title', get_defined_vars());
		if ((!isset($hraci))) {
?>
		<h2>Shrnutí:</h2>
		<b>Počet trenérů:</b>
		<?php echo LR\Filters::escapeHtmlText($summary[0]) /* line 17 */ ?>

		<p>Jmenovitě:
<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($summary[1]) as $trainer) {
				?>			<?php echo LR\Filters::escapeHtmlText($trainer->jmeno) /* line 21 */ ?> <?php
				echo LR\Filters::escapeHtmlText($trainer->prijmeni) /* line 21 */;
				if (!$iterator->isLast()) {
					?>, <?php
				}
?>

<?php
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
?>
			<br>
			<b>Počet hráčů: </b>
			<?php echo LR\Filters::escapeHtmlText($summary[2]) /* line 25 */ ?>

			<br>
			<b>Průměrná výška: </b>
			<?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $summary[3], 2)) /* line 28 */ ?> cm
			<br>
			<br>
			Nejvyšší hráč je <?php echo LR\Filters::escapeHtmlText($summary[4]->jmeno) /* line 31 */ ?> <?php
			echo LR\Filters::escapeHtmlText($summary[4]->prijmeni) /* line 31 */ ?> měřící <?php echo LR\Filters::escapeHtmlText($summary[4]->vyska) /* line 31 */ ?>.
			<br>
			Nejnižší hráč je <?php echo LR\Filters::escapeHtmlText($summary[5]->jmeno) /* line 33 */ ?> <?php
			echo LR\Filters::escapeHtmlText($summary[5]->prijmeni) /* line 33 */ ?> měřící <?php echo LR\Filters::escapeHtmlText($summary[5]->vyska) /* line 33 */ ?>.
			<br>
			<p>Pozn.: Všechny hodnoty jsou vygenerované z databáze a nemusejí přesně odpovídat realitě.</p>
<?php
		}
		else {
?>
		<table class="table table-dark table-striped">
			<thead class="thead-dark">
				<th>Foto</th>
				<th>Jméno</th>
				<th>Narozen</th>
				<th>Výška</th>
				<th>Post</th>
			</thead>
			<tbody>
<?php
			$iterations = 0;
			foreach ($hraci as $hrac) {
?>
				<tr>
					<td></td>
					<td><?php echo LR\Filters::escapeHtmlText($hrac->jmeno) /* line 49 */ ?> <?php echo LR\Filters::escapeHtmlText($hrac->prijmeni) /* line 49 */ ?></td>
					<td><?php echo LR\Filters::escapeHtmlText($hrac->rocnik) /* line 50 */ ?></td>
					<td><?php echo LR\Filters::escapeHtmlText($hrac->vyska) /* line 51 */ ?></td>
					<td><?php echo LR\Filters::escapeHtmlText($hrac->post) /* line 52 */ ?></td>
				</tr>
<?php
				$iterations++;
			}
?>
			</tbody>
		</table>
<?php
		}
		
	}


	function blockTitle($_args)
	{
		extract($_args);
		?>	<h1>Týmy<?php
		if (isset($tym->nazev)) {
			?> > <?php
			echo LR\Filters::escapeHtmlText($tym->nazev) /* line 13 */;
		}
?></h1>
<?php
	}

}
