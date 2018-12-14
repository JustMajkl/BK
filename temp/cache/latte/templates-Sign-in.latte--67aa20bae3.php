<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Sign/in.latte

use Latte\Runtime as LR;

class Template67aa20bae3 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="vertical-center">
	<div class="login-main container p-3 align-middle text-md-center align-items-center rounded">
<?php
		$this->renderBlock('title', get_defined_vars());
?>


		<?php
		/* line 7 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["signInForm"], []);
?>

		<div class="form-group mx-auto">
			<?php if ($_label = end($this->global->formsStack)["username"]->getLabel()) echo $_label ?>

				<?php echo end($this->global->formsStack)["username"]->getControl() /* line 10 */ ?>

		</div>
		<div class="form-group mx-auto">
			<?php if ($_label = end($this->global->formsStack)["password"]->getLabel()) echo $_label ?>

				<?php echo end($this->global->formsStack)["password"]->getControl() /* line 14 */ ?>

		</div>
		<?php echo end($this->global->formsStack)["send"]->getControl() /* line 16 */ ?>

		<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

	</div>
</div><?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>		<h1 class="text-center">Přihlášení</h1>
<?php
	}

}
