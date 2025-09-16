<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\Database\Query;
use Cake\Database\Query\SelectQuery;
use Cake\ORM\TableRegistry;

/**
 * Escolas Controller
 *
 * @property \App\Model\Table\EscolasTable $Escolas
 */
class EscolasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $query = $this->Escolas->find()->where(['Escolas.ic_ativo' => 1]);
        // $query->matching('EscolaTiposAnos', function ($q) {
        //     return $q->where(['EscolaTiposAnos.ic_ativo' => 1]);
        // });
        // ->group('EscolaTiposAnos.escola_id');


        // $query = $this->Escolas->EscolaTiposAnos->Tipos->find()->contain([
        //     'Escolas',
        //     'EscolaTiposAnos',
        //     function (SelectQuery $query) {
        //         return $query->select(['EscolaTiposAnos.escola_id', 'Escolas.nm_escola'])
        //             ->where(['EscolaTiposAnos.ic_ativo' => 1]);
        //     },
        // ]);
        // $query = $this->Escolas->EscolaTiposAnos->find()
        //     ->where(['EscolaTiposAnos.ic_ativo' => 1])
        //     ->contain(['Escolas', 'Tipos'])
        //     // ->select([
        //     //     'tipos' => 'GROUP_CONCAT(DISTINCT Tipos.nm_tipo SEPARATOR " / ")',
        //     //     'id' => 'Escolas.id',
        //     //     'nm_escola' => 'Escolas.nm_escola', 'ic_ativo' => 'Escolas.ic_ativo',
        //     // ])
        //     ->group('EscolaTiposAnos.escola_id');

        // debug($query->toArray());
        // die;

        $query = $this->Escolas->EscolaTiposAnos->find()
            ->select([
                'tipos' => 'GROUP_CONCAT(DISTINCT Tipos.nm_tipo SEPARATOR " / ")',
                'id' => 'Escolas.id',
                'nm_escola' => 'Escolas.nm_escola', 'ic_ativo' => 'Escolas.ic_ativo',
            ])

            ->join([
                'Escolas' => [
                    'table' => 'escolas',
                    'conditions' => 'Escolas.id = EscolaTiposAnos.escola_id'
                ],
                'Anos' => [
                    'table' => 'anos',
                    'conditions' => 'Anos.id = EscolaTiposAnos.ano_id'
                ],
                'Tipos' => [
                    'table' => 'tipos',
                    'conditions' => ['Tipos.id = Anos.tipo_id']
                ]
            ])
            ->where(['Escolas.ic_ativo' => 1])
            ->order(['Escolas.nm_escola' => 'ASC'])
            ->group('EscolaTiposAnos.escola_id');

        $escolas = $this->paginate($query);

        $this->set(compact('escolas'));
    }

    /**
     * View method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $escola = $this->Escolas->get($id, contain: ['EscolaTiposAnos' => ['Tipos', 'Anos']]);

        $infantils = $this->Escolas->EscolaTiposAnos->find()
            ->where(['EscolaTiposAnos.tipo_id' => 1, 'escola_id' => $id])
            ->contain(['Anos'])
            ->toArray();

        if ($infantils) {
            $this->set('infantils', $infantils);
        }
        $fundamentais = $this->Escolas->EscolaTiposAnos->find()
            ->where(['EscolaTiposAnos.tipo_id' => 2, 'escola_id' => $id])
            ->contain(['Anos'])
            ->toArray();

        if ($fundamentais) {
            $this->set('fundamentais', $fundamentais);
        }

        $medios = $this->Escolas->EscolaTiposAnos->find()
            ->where(['EscolaTiposAnos.tipo_id' => 3, 'escola_id' => $id])
            ->contain(['Anos'])
            ->toArray();

        if ($medios) {
            $this->set('medios', $medios);
        }


        // debug($escola);
        $this->set(compact('escola'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escola = $this->Escolas->newEmptyEntity();
        // $escola = $this->Escolas->newEntity($this->request->getData(), [
        //     'associated' => [
        //         'EscolaTiposAnos'
        //     ]
        // ]);
        if ($this->request->is('post')) {
            if ($this->request->getData('nm_escola') !== '') {

                $escola->nm_escola = $this->request->getData('nm_escola');
                $escola->ic_ativo = 1;
                $this->Escolas->save($escola);
                $escola_tipos_anos = $this->request->getData('escola_tipos_anos');

                // debug($this->request->getData());
                // die;

                foreach ($escola_tipos_anos as $i => $escola_tipo_ano) {

                    if (isset($escola_tipo_ano['ano_id'])) {

                        if ($escola_tipo_ano['ano_id'] !== '' && $escola_tipo_ano['tipo_id'] && $escola_tipo_ano['tipo_id'] !== '') {

                            $escola_tipos_anos = $this->Escolas->EscolaTiposAnos->newEmptyEntity();
                            $escola_tipos_anos = $this->Escolas->EscolaTiposAnos->patchEntity($escola_tipos_anos, $escola_tipo_ano);
                            $escola_tipos_anos->escola_id = $escola->id;
                            $this->Escolas->EscolaTiposAnos->save($escola_tipos_anos);
                        }
                    }
                }
                $this->Flash->success(__('Escola salva.'));

                return $this->redirect(['action' => 'index']);
            }
        }

        $educacao = $this->Escolas->Tipos->Anos->find('list', [
            // 'keyField' => 'id',
            'groupField' => 'tipo_id'
        ])->toArray();

        // debug($educacao->toArray());

        $educ_infantil = $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 1])->toArray();
        $educ_fundamental1 = $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 2])->toArray();
        $educ_fundamental2 = $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 3])->toArray();
        $educ_medio = $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 4])->toArray();

        $this->set(compact('escola', 'educ_infantil', 'educ_fundamental1', 'educ_fundamental2', 'educ_medio', 'educacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escola = $this->Escolas->get($id, ['contain' => ['EscolaTiposAnos' => ['Tipos', "Anos"]]]);

        $tp_infantil = $this->Escolas->EscolaTiposAnos->find()->contain(
            ['Tipos', 'Anos']
        )->where(['escola_id' => $id, 'EscolaTiposAnos.tipo_id' => 1, 'EscolaTiposAnos.ic_ativo' => 1])->first();

        $tp_fund1 = $this->Escolas->EscolaTiposAnos->find()->contain(
            ['Tipos', 'Anos']
        )->where(['escola_id' => $id, 'EscolaTiposAnos.tipo_id' => 2, 'EscolaTiposAnos.ic_ativo' => 1])->first();

        $tp_fund2 = $this->Escolas->EscolaTiposAnos->find()->contain(
            ['Tipos', 'Anos']
        )->where(['escola_id' => $id, 'EscolaTiposAnos.tipo_id' => 3, 'EscolaTiposAnos.ic_ativo' => 1])->first();

        $tp_medio = $this->Escolas->EscolaTiposAnos->find()->contain(
            ['Tipos', 'Anos']
        )->where(['escola_id' => $id, 'EscolaTiposAnos.tipo_id' => 4, 'EscolaTiposAnos.ic_ativo' => 1])->first();


        if ($this->request->is(['patch', 'post', 'put'])) {

            $escola = $this->Escolas->patchEntity(
                $escola,
                $this->request->getData(),
                [
                    'associated' => [
                        'EscolaTiposAnos'
                    ]
                ]
            );

            if ($this->Escolas->save($escola)) {
                $this->Flash->success(__('A escola foi editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A escola não foi editada. Por favor, tente novamente.'));
        }

        $educ_infantil =  $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 1])->contain(['EscolaTiposAnos' => ['conditions' => ['EscolaTiposAnos.escola_id' => $id]]])->toArray();

        $educ_fundamental1 = $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 2])->contain(['EscolaTiposAnos' => ['conditions' => ['EscolaTiposAnos.escola_id' => $id]]])->toArray();

        $educ_fundamental2 = $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 3])->contain(['EscolaTiposAnos' => ['conditions' => ['EscolaTiposAnos.escola_id' => $id]]])->toArray();

        $educ_medio = $this->Escolas->Tipos->Anos->find()->having(['tipo_id' => 4])->contain(['EscolaTiposAnos' => ['conditions' => ['EscolaTiposAnos.escola_id' => $id]]])->toArray();

        $this->set(compact('escola', 'educ_infantil', 'educ_fundamental1', 'educ_fundamental2', 'educ_medio', 'tp_infantil', 'tp_fund1', 'tp_fund2', 'tp_medio'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Escola id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $escola = $this->Escolas->get($id, contain: ['EscolaTiposAnos']);
        $escola->ic_ativo = 0;
        if ($this->Escolas->save($escola)) {
            $this->Flash->success(__('Escola excluída.'));
        } else {
            $this->Flash->error(__('A escola não pode ser excluída. Tente Novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
