<?php

/** Seduc DPID - Flavia Silva - 47093 em 16/05/2024  */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Eventos Controller
 *
 * @property \App\Model\Table\EventosTable $Eventos
 *
 * @method \App\Model\Entity\Evento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class EventosController extends AppController
{

    public function index()
    {
        $eventos = $this->paginate($this->Eventos->find()
            ->contain([
                'TpEventos'
            ]));

        $this->set(compact('eventos'));
    }

    public function add()
    {
        $evento = $this->Eventos->newEmptyEntity();

        if ($this->request->is('post')){

            // debug($this->request->getData());

            $evento = $this->Eventos->patchEntity($evento, $this->request->getData());
            $evento->ano_evento = date('Y') ;

            // debug($evento);
            // die;

            if($this->Eventos->save($evento)) {
                $this->Flash->success('Evento salvo com sucesso.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error("Houve algum problema.");
            }
            
        }
        $tp_eventos = $this->Eventos->TpEventos->find('list');
        $this->set(compact('evento','tp_eventos'));
    }

    public function edit($id)
    {
        $evento = $this->Eventos->get(
            $id,
            [
                'contain' => ['TpEventos']
            ]
        );

        if ($this->request->is(['patch', 'post', 'put'])) {
            $evento = $this->Eventos->patchEntity($evento, $this->request->getData());
            if($this->Eventos->save($evento)){
                $this->Flash->success('Evento Alterado.');

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Houve um erro, evento não foi alterado.');
            }
        }
        $tp_eventos = $this->Eventos->TpEventos->find('list');
        $this->set(compact('evento', 'tp_eventos'));
    }
}
