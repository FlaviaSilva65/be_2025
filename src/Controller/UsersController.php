<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Restore;
use Cake\Event\EventInterface;
use Cake\Mailer\Mailer;

class UsersController extends AppController
{
  public function beforeFilter(EventInterface $event)
  {
    parent::beforeFilter($event);
    $this->Authentication->allowUnauthenticated(['/Pages/home', 'login', 'novaSenha', 'redefinir']);
    // $this->Auth->allow();
  }

  public function index()
  {
    $users = $this->paginate($this->Users);
    $this->set(compact('users'));
  }

  public function add()
  {
    $user = $this->Users->newEmptyEntity();
    if ($this->request->is('post')) {
      $user = $this->Users->patchEntity($user, $this->request->getData());
      // debug($user);
      // die;

      if ($this->Users->save($user)) {
        $this->Flash->success('Usuário salvo com sucesso.');
        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error("Houve algum problema.");
      }
    }
    $grupos = $this->Users->Grupos->find('list');
    $sistema = ([1 => 'Bolsa Parcial', 2 => 'Bolsa Integral']);
    $this->set(compact('user', 'grupos', 'sistema'));
  }

  public function edit($id = null)
  {
    $user = $this->Users->get($id);
    // debug($user);
    // die;
    if ($this->request->is(['post', 'put'])) {

      $this->Users->patchEntity($user, $this->request->getData());
      // debug($user);
      // die;
      if ($this->Users->save($user)) {
        $this->Flash->success('Usuário salvo com sucesso.');
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error('Houve algum problema');
    }
    $grupos = $this->Users->Grupos->find('list');
    $sistema = ([1 => 'Bolsa Parcial', 2 => 'Bolsa Integral']);
    $this->set(compact('user', 'grupos', 'sistema'));
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);
    // debug($user);
    // die;
    if ($this->Users->delete($user)) {
      $this->Flash->success('Usuário excluído!');
      return $this->redirect(['action' => 'index']);
    }
  }

  public function login()
  {
    $result = $this->Authentication->getResult();

    if ($result->isValid()) {
      $target = $this->Authentication->getLoginRedirect() ?? '/users';
      return $this->redirect($target);
    } else {
      return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }
    if ($this->request->is('post')) {
      $this->Flash->error('Usuário/Senha inválido!');
    }
  }

  public function logout()
  {
    $this->Authentication->logout();
    return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
  }

  public function novaSenha($id, $senha)
  {
    $restores = $this->Users->Restores->find('all', ['order' => ['Restores.id' => 'DESC']])->where(['user_id' => $id])->first();
    $user = $this->Users->get($id);

    if ($this->request->is('post')) {

      if ($restores->new_pass === $senha) {
        if ($this->request->getData('password') == $this->request->getData('confirm_password')) {

          $restores->active = 0;
          $this->Users->Restores->save($restores);

          $user->password = $this->request->getData('password');
          $user->active = 1;

          $this->Users->save($user);
          $this->Flash->success('Senha Alterada.');
          return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        } else {
          $this->Flash->error('Digite mesma senha na verificação.');
          $this->redirect($this->referer());
        }
      } else {
        $this->Flash->error('Senha Expirada.');
        $this->redirect($this->referer());
      }
    }

    $this->set('user', $user);
    // $this->set('senha', $senha);
  }

  public function redefinir($id = null)
  {
    // debug($this->request->getData());

    if ($this->request->is(['post', 'put'])) {
      $this->request->allowMethod(['post', 'put']);

      // debug($this->request->getData());
      // die;

      if (is_null($id)) {
        $user = $this->Users->find()->where([
          'email' => $this->request->getData('email')
        ])->first();

        // debug($user);
        // die;

        if (!$user) {
          $this->Flash->error('Este e-mail não está cadastrado');
          return $this->redirect([
            'controller' => 'Pages',
            'action' => 'home'
          ]);
        } else {
          $id = $user->id;
        }
      } else {
        $user = $this->Users->get($id);
      }

      // debug($id);
      // die;
      $novaSenha = uniqid() . rand();

      $restores = $this->fetchTable('Restores'); //** Armazenando a tabela em uma variável */

      $restore = $restores->newEmptyEntity();
      $restore->user_id = $id;
      $restore->new_pass = $novaSenha;
      $restore->active = 1;
      $restores->save($restore);

      // $this->loadModel('Restores');

      // $user->password = $novaSenha;
      // $user->active = 0;
      if ($this->Users->save($user)) {

        $mailer = new Mailer('default');
        // $mailer->setFrom(['no-reply-seduc@praiagrande.sp.gov.br' => 'Secretaria de Educação de Praia Grande'])
        $mailer
          ->setEmailFormat('html')
          ->setTo(trim($user->email))
          ->setSubject('Senha')
          ->setViewVars(['userFind' => $user, 'nova_senha' => $novaSenha])
          ->viewBuilder()
          ->setTemplate('welcome')
          ->setLayout('fancy');

        // $mailer->deliver("minha mensagem");
        $mailer->send();

        if (!$user) {
          $this->Flash->success("Senha redefinida. Veja seu e-mail.");
          $this->redirect($this->referer());
        } else {
          $this->Flash->success("Senha redefinida.");
          $this->redirect($this->referer());
        }


        // $user == null ?
        //   $this->redirect($this->referer())
        //   : $this->redirect(
        //     [
        //       'controller' => 'Pages',
        //       'action' => 'home'
        //     ]
        //   );
      } else {
        $this->Flash->error('Senha não foi redefinida.');
      }
    }
  }

  public function view($id)
  {
    // $user = $this->Users->get($id);
    $user = $this->Users->get($id);

    $this->set('user', $user);
  }
}
