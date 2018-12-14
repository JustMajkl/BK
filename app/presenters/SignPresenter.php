<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


class SignPresenter extends Nette\Application\UI\Presenter
{

	protected function createComponentSignInForm()
	{
		$form = new Form;
		$form->getElementPrototype()->class = 'login_form';
		$form->getElementPrototype()->autocomplete = 'off';
		$form->addText('username', 'Uživatelské jméno')
			->setRequired('Please enter your username.')
			->setHtmlAttribute('class','form-control');

		$form->addPassword('password', 'Heslo')
			->setRequired('Please enter your password.')
			->setHtmlAttribute('class','form-control');

		$form->addSubmit('send', 'Přihlásit se')
		->setHtmlAttribute('class','btn btn-outline-light center-block');

		$form->onSuccess[] = [$this, 'signInFormSucceeded'];
		return $form;
	}

	public function signInFormSucceeded($form, $values)
	{
		try {
			$this->getUser()->login($values->username, $values->password);
			$this->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError('Nesprávné přihlašovací jméno nebo heslo.');
		}
	}

	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('Byl jsi úspěšně odhlášen.');
		$this->redirect('Homepage:');
	}
}                                                        