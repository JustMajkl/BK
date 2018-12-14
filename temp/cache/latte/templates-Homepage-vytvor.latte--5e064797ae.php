<?php
// source: C:\xampp\htdocs\BK\app\presenters/templates/Homepage/vytvor.latte

use Latte\Runtime as LR;

class Template5e064797ae extends Latte\Runtime\Template
{
	public $blocks = [
		'submenu' => 'blockSubmenu',
		'content' => 'blockContent',
		'title' => 'blockTitle',
		'script' => 'blockScript',
	];

	public $blockTypes = [
		'submenu' => 'html',
		'content' => 'html',
		'title' => 'html',
		'script' => 'html',
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
?>
	<!-- CSS pro Quill editor -->
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 6 */ ?>/css/quill.snow.css">

<?php
		$this->renderBlock('title', get_defined_vars());
?>
	<h2>Nový článek</h2>

	<!-- Vytvoření kontejneru pro editor -->
	<div id="editor-container">
		<div id="toolbar-container">
    <span class="ql-formats">
      <select class="ql-font"></select>
      <select class="ql-size"></select>
    </span>
			<span class="ql-formats">
      <button class="ql-bold"></button>
      <button class="ql-italic"></button>
      <button class="ql-underline"></button>
      <button class="ql-strike"></button>
    </span>
			<span class="ql-formats">
      <select class="ql-color"></select>
      <select class="ql-background"></select>
    </span>
			<span class="ql-formats">
      <button class="ql-script" value="sub"></button>
      <button class="ql-script" value="super"></button>
    </span>
			<span class="ql-formats">
      <button class="ql-header" value="1"></button>
      <button class="ql-header" value="2"></button>
      <button class="ql-blockquote"></button>
      <button class="ql-code-block"></button>
    </span>
			<span class="ql-formats">
      <button class="ql-list" value="ordered"></button>
      <button class="ql-list" value="bullet"></button>
      <button class="ql-indent" value="-1"></button>
      <button class="ql-indent" value="+1"></button>
    </span>
			<span class="ql-formats">
      <button class="ql-direction" value="rtl"></button>
      <select class="ql-align"></select>
    </span>
			<span class="ql-formats">
      <button class="ql-link"></button>
      <button class="ql-image"></button>
      <button class="ql-video"></button>
      <button class="ql-formula"></button>
    </span>
			<span class="ql-formats">
      <button class="ql-clean"></button>
    </span>
		</div>
		<div id="editor" class="ql-editor">
		</div>
	</div>

<?php
		$this->renderBlock('script', get_defined_vars());
		
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>Novinky</h1>
<?php
	}


	function blockScript($_args)
	{
		extract($_args);
?>
		<!-- Vložení Quill knihovny -->
		<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 64 */ ?>/js/quill.js"></script>

		<!-- Inicializace Quill editoru -->
		<script type="text/javascript">
			var quill = new Quill('#editor', {
				modules: {
					formula: true,
					syntax: true,
					toolbar: '#toolbar-container'
				},
				placeholder: 'Compose an epic...',
				theme: 'snow'
			});
		</script>
<?php
	}

}
