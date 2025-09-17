<?php

/** Seduc DPID - Flavia Silva - 47093 em 16/05/2024  */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Event\EventInterface;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;

/**
 * Responsavels Controller
 *
 * @property \App\Model\Table\ResponsavelsTable $Responsavels
 *
 * @method \App\Model\Entity\Responsavel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class ResponsavelsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['add', 'newAdd', 'index', 'edit']);
        // $this->Auth->allow(['newAdd']);
    }

    public function isAuthorized($user)
    {
        if ($this->request->getParam('action') === 'newAdd') {
            return true;
        }
    }

    public function index()
    {
        $responsavels = $this->paginate($this->Responsavels);

        $this->set(compact('responsavels'));
    }

    public function add()
    {
        $responsavel = $this->Responsavels->newEmptyEntity();

        if ($this->request->is(['post', 'put'])) {

            $resp = $this->Responsavels->find()
                ->where(['vl_cpf' => $this->request->getData('vl_cpf')])->first();

            // debug($this->request->getData());
            // die;

            if (!$resp) {
                $dados = ([
                    'cpf' => $this->request->getData('vl_cpf'),
                    'nasc' => $this->request->getData('dt_nascimento')
                ]);

                return $this->redirect(['action' => 'new_add', $dados['cpf'], $dados['nasc']]);
                // } elseif ($resp->dt_nascimento == $this->request->getData('responsavel')['dt_nascimento']) {
            } elseif ($resp->dt_nascimento->equals($resp->dt_nascimento->parse($this->request->getData('dt_nascimento'))) && $this->request->getData('ok') == 'Verificar') {

                /** Aqui verifica se existe o Responsável e volta para receber o código de verificação */
                $responsavel = $resp;
                // $this->request->getSession()->write(['Auth' => ['responsavel' => $resp]]);

            } elseif ($resp->dt_nascimento->equals($resp->dt_nascimento->parse($this->request->getData('dt_nascimento'))) && $this->request->getData('cd_verificacao') !== '') {

                if (($this->request->getData('cd_verificacao')) == $resp->cd_verificacao) {

                    $this->request->getSession()->write(['Auth' => ['responsavel' => $resp]]);

                    return $this->redirect(['action' => 'edit', $resp->id]);
                } else {
                    $responsavel = $resp;
                    $responsavel->setError('cd_verificacao','Código Inválido');
                    
                }
            }
        }


        $this->set(compact('responsavel'));
    }

    public function newAdd($cpf = null, $nasc = null)
    {

        $responsavel = $this->Responsavels->newEmptyEntity();

        if ($this->request->is('post')) {

            $randomString = rand(100000, 999999);
            $responsavel->cd_verificacao = $randomString;

            $responsavel = $this->Responsavels->patchEntity($responsavel, $this->request->getData());

            if ($this->Responsavels->save($responsavel)) {

                $mailer = new Mailer('default');
                $mailer
                    ->setEmailFormat('html')
                    ->setTo(trim($responsavel->nm_email))
                    ->setSubject('Senha')
                    ->setViewVars(['userFind' => $responsavel])
                    ->viewBuilder()
                    ->setTemplate('acesso')
                    ->setLayout('fancy');

                $mailer->send();

                $this->Flash->success('Responsável salvo com sucesso.');
                // return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'candidatos','action' => 'add']);
            } else {
                $this->Flash->error('Houve um erro, não podemos salvar as informações.');
            }
        }

        if (!is_null($cpf && $nasc)) {
            $this->set(compact('cpf', 'nasc'));
        }
        $this->set(compact('responsavel'));
    }

    public function edit($id)
    {
        $responsavel = $this->Responsavels->get($id);

        $table_candidatos =  $this->fetchTable('Candidatos');

        // debug($responsavel);
        // die;

        if ($this->request->is(['post', 'put'])) {
            $this->Responsavels->patchEntity($responsavel, $this->request->getData());

            if ($this->Responsavels->save($responsavel)) {

                $assunto = 'edicao';

                $mailer = new Mailer('default');
                $mailer
                    ->setEmailFormat('html')
                    ->setTo(trim($responsavel->nm_email))
                    ->setSubject('Acesso ao Sistema.')
                    ->setViewVars(['userFind' => $responsavel, 'assunto' => $assunto])
                    ->viewBuilder()
                    ->setTemplate('edit')
                    ->setLayout('fancy');

                $mailer->send();

                $this->Flash->success('Cadastro alterado com sucesso.');

                // return $this->redirect(['action' => 'index']);

                /** Verifica se tem algum candidato cadastrado, 
                 * se não tiver vai direto para o Candidatos/add 
                 * do contrário vai para a Candidatos/index
                 */
                $candidatos = $table_candidatos->find('all')->where(['responsavel_id' => $responsavel->id]);

                if ($candidatos) {

                    return $this->redirect(['controller' => 'candidatos', 'action' => 'indexCand', $responsavel->id]);

                    // debug($candidatos);
                    // die;
                } else {
                    return $this->redirect(['controller' => 'candidatos', 'action' => 'add', $responsavel->id]);
                }
            }

            $this->Flash->error('Houve algum erro, não salvou os dados.');
        }

        $this->set(compact('responsavel'));
    }
}
