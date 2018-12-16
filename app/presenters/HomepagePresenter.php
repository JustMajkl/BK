<?php

namespace App\Presenters;

use Nette;
use app\model\PostManager;
use Nette\Application\UI\Form;
use Nette\Forms\Controls;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	private $postManager;

	public function __construct(PostManager $postManager)
	{
		$this->postManager = $postManager;
	}

	//	BĚŽNÁ SEKCE
	public  function renderDefault($id_category, $page = 1)
	{
		//	počet příspěvků pro účely stránkování
		$postsCount = $this->postManager->getPublicPostsCount($id_category);

		//	nastavení stránkování
		$paginator = new Nette\Utils\Paginator;
		$paginator->setItemCount($postsCount);
		$paginator->setItemsPerPage(10);
		$paginator->setPage($page);

		//	vyhledání příslušné články na základě stránkování
		$this->template->posts = $this->postManager->getPublicPosts($id_category, $paginator->getLength(), $paginator->getOffset());

		//	předání instance paginator šabloně
		$this->template->paginator = $paginator;

		$this->template->category = $this->postManager->getCategoryById($id_category);
		$this->template->sekce = $this->postManager->getCategories();
	}

	public function renderZobraz($id_post)
	{
		$this->template->post = $this->postManager->getPostById($id_post);
		$this->template->sekce = $this->postManager->getCategories();
	}

	/** @var Nette\Database\Context */
	/**private $database;

	public function __construct(Nette\Database\Context $database)
	{
	$this->database = $database;
	}

	public function renderDefault($id_category)
	{
	if (!$id_category) {
	$posts = $this->database->table('c_clanky_new')->where('publikovat = ', 1)->order('datum DESC')->limit(10);
	} else {
	$posts = $this->database->table('c_clanky_new')->where('publikovat = ', 1)->where('id_sekce', $id_category)->order('datum DESC')->limit(10);
	$category = $this->database->table('c_sekce')->get($id_category);
	}

	$this->template->posts = $posts;

	if ($id_category) {
	$this->template->category = $category->popis;
	}
	}*/

	//	ADMIN SEKCE
	public function actionVytvor()
	{
		$this->userCheck();

		$this->template->sekce = $this->postManager->getCategories();
	}

	public function createComponentPostForm()
	{
		$form = new Form;	// UI\Form instance

		$form->addText('nadpis', 'Název článku:')
			->setAttribute('autocomplete', 'off')
			->setRequired();

		$form->addSelect('sekce', 'Sekce:', $this->postManager->getCategories()->fetchAssoc('id_sekce=popis'))
			->setRequired();

		$form->addCheckbox('publikovat', 'Publikovat?');

		$form->addHidden('clanek_input');

		$form->addTextArea('clanek', 'Text:');

		$form->addSubmit('send', 'Vytvořit článek');

		$form->onSuccess[] = [$this, 'postFormSucceeded'];

		return $form;
	}

	public function postFormSucceeded(Form $form, \stdClass $values)
	{
		$redaktorId = $this->getUser()->getId();

		$postId = $this->postManager->createPost($redaktorId, $values);

		$this->flashMessage('Článek byl úspěšně vytvořen.', 'success');
		$this->redirect('zobraz', $postId);
	}

	public function actionUprav($id)
	{
		$this->userCheck();

		$post = $this->postManager->getPostById($id);
		if(!$post) {
			$this->error('Příspěvek nebyl nalezen!');
		}
		//$this['postForm']->setDefaults($post->toArray());
		$this->template->post = $post;
		$this->template->sekce = $this->postManager->getCategories();
	}

	public function actionSmaz($id)
	{
		$this->userCheck();
	}

	//	Kontrola zda je uživatel přihlášen
	public function userCheck() {
		if (!$this->getUser()->isLoggedIn()) {
			$this->redirect('Sign:in');
		}
	}
}