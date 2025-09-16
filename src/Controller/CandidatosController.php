<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Ilovepdf\Ilovepdf;
use Ilovepdf\ImagepdfTask;
use Dompdf\Dompdf;
use Ilovepdf\HtmlpdfTask;

/**
 * Candidatos Controller
 *
 */
class CandidatosController extends AppController
{

    // public function beforeFilter(EventInterface $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Authentication->allowUnauthenticated(['add']);
    // }
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['add', 'opcoestipos','arquivospdf', 'cron']);
        // $this->Auth->allow(['add','opcoestipos']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Candidatos->find()->contain(['Inscricoes']);
        $candidatos = $this->paginate($query);

        $this->set(compact('candidatos'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidato id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidato = $this->Candidatos->get($id, contain: []);
        $this->set(compact('candidato'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $candidato = $this->Candidatos->newEmptyEntity();

        $comp_familiares = $this->Candidatos->Responsavels->CompFamiliares->find()->where(['responsavel_id ' => $id]);

        // debug($comp_familiares->count());
        if ($comp_familiares->count() > 0) {

            $this->set('comp_familiares', $comp_familiares);
        } else {
            $comp_familiares = $this->Candidatos->Responsavels->CompFamiliares->newEmptyEntity();
            $this->set('comp_familiares', $comp_familiares);
        }
        $bem_moveis = $this->Candidatos->Responsavels->BemMoveis->find()->where(['responsavel_id ' => $id]);
        if ($bem_moveis->count() > 0) {
            $this->set('bem_moveis', $bem_moveis);
        } else {
            $bem_moveis = $this->Candidatos->Responsavels->BemMoveis->newEmptyEntity();
            $this->set('bem_moveis', $bem_moveis);
        }
        $bem_imoveis = $this->Candidatos->Responsavels->BemImoveis->find()->where(['responsavel_id' => $id]);
        if ($bem_imoveis->count() > 0) {
            $this->set('bem_imoveis', $bem_imoveis);
        } else {
            $bem_imoveis = $this->Candidatos->Responsavels->BemImoveis->newEmptyEntity();
            $this->set('bem_imoveis', $bem_imoveis);
        }
        // debug($comp_familiares);
        // die;

        if ($this->request->is('post')) {
            $candidato = $this->Candidatos->patchEntity($candidato, $this->request->getData());

            // debug($this->request->getData());
            // debug($candidato);
            // die;
            if ($this->Candidatos->save($candidato)) {
                $this->Flash->success(__('O candidato foi salvo - Lembrar de tirar esse Flash.'));

                // return $this->redirect(['action' => 'index']);

                /** Avan�a para a pr�xima Tela onde salva as Informações dos Componentes familiares */
                return $this->redirect(['action' => 'addCompFamiliar', $candidato->id, $candidato->responsavel_id]);
            }
            $this->Flash->error(__('The candidato could not be saved. Please, try again.'));
        }
        $escolas = $this->Candidatos->Escolas->find('list', ['limit' => 200])->where(['ic_ativo' => 1]);
        // $tipos = $this->Candidatos->Escolas->EscolaTiposAnos->find('list')
        //     ->select(['tipo_id' => 'EscolaTiposAnos.tipo_id', 'nm_tipo' => 'Tipos.nm_tipo'])
        //     ->contain(['Anos', 'Tipos'])
        //     ->where(['escola_id' => 1]);

        // $tipos = $this->Candidatos->Escolas->EscolaTiposAnos->find()
        //     ->where(['escola_id' => 1])
        //     ->contain(['Anos' => ['Tipos']]);

        // $this->Candidatos->EscolaTiposAnos->find('list')->where(['escola_id' => 1]);
        // $this->set(compact('candidato', 'escolas', 'tipos'));
        $this->set(compact('candidato', 'escolas'));
    }

    public function addCompFamiliar($cand, $resp)
    {
        // $familiares = TableRegistry::getTableLocator()->get('CompFamiliares');
        // $comp_familiares = $familiares->newEntities($this->request->getData());
        $comp_familiares = $this->Candidatos->Responsavels->CompFamiliares->newEntities($this->request->getData());

        $candidato = $this->Candidatos->find()->where(['id' => $cand])->first();

        if ($this->request->is('post')) {

            $recebidos = $this->request->getData('comp_familiares');

            debug($recebidos);
            // $cont = (count((array)$recebidos));
            // die;

            foreach ($recebidos as $recebido):


                $entities = $this->Candidatos->Responsavels->CompFamiliares->patchEntity($comp_familiares, $recebido);

                // foreach ($recebidos as $entity){
                debug($entities);
                $result = $this->Candidatos->Responsavels->CompFamiliares->save($entities);

                debug($result);
            // if($this->Candidatos->Responsavels->CompFamiliares->saveMany($entities)){
            //     $this->Flash->success(__('A Composição Familiar salva - Lembrar de tirar esse Flash.'));
            // } else {
            //     $this->Flash->error(__('A Composição Familiar não foi salva - Lembrar de tirar esse Flash.'));
            // }
            // }
            // $comp_familiares->responsavel_id = $candidato->responsavel_id;

            // debug($comp_familiares);

            //    if($this->Candidatos->Responsavels->CompFamiliares->save($comp_familiares)){


            // $comp_familiares = $this->Candidatos->Responsavels->CompFamiliares->newEmptyEntity();
            //    }

            endforeach;

            die;

            // if($this->Candidatos->Responsavels->CompFamiliares->save($comp_familiares)){
            $this->Flash->success(__('A Composição Familiar salva - Lembrar de tirar esse Flash.'));

            return $this->redirect(['action' => 'addCompFamiliar', $candidato->id, $candidato->responsavel_id]);
            // }
            // $this->Flash->error(__('A Composição Familiar não foi salva - Lembrar de tirar esse Flash.'));

            // debug($comp_familiares);
            // die;
        }

        $this->set('comp_familiares', $comp_familiares);
        $this->set('candidato', $candidato);
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidato id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidato = $this->Candidatos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidato = $this->Candidatos->patchEntity($candidato, $this->request->getData());
            if ($this->Candidatos->save($candidato)) {
                $this->Flash->success(__('The candidato has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidato could not be saved. Please, try again.'));
        }
        $this->set(compact('candidato'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidato = $this->Candidatos->get($id);
        if ($this->Candidatos->delete($candidato)) {
            $this->Flash->success(__('The candidato has been deleted.'));
        } else {
            $this->Flash->error(__('The candidato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function opcoestipos()
    {
        $this->viewBuilder()->disableAutoLayout(false);

        if ($_GET['id'] != '') {

            $resultados = $this->Candidatos->Escolas->EscolaTiposAnos->find()

                ->where(['escola_id' => $_GET['id']])
                // ->where(['escola_id' => 1])
                ->select(['tipo_id' => 'EscolaTiposAnos.tipo_id', 'nm_tipo' => 'Tipos.nm_tipo'])
                ->contain(['Anos', 'Tipos'])
                // ->contain(['Anos' => ['Tipos']]);
                ->groupBy('EscolaTiposAnos.tipo_id')
                ->toArray();

            /** keyField, ValueField */
            foreach ($resultados as $r) $tipos[$r->tipo_id] = $r->nm_tipo;
        } else {
            $tipos = 'Selecione uma escola';
        }
        // foreach ($tipos as $tipo) :
        //     debug($tipo->ano->tipo);
        // endforeach;
        // die;
        $this->set(compact('tipos'));
    }

    public function opcoesanos()
    {
        $this->viewBuilder()->disableAutoLayout(false);
        if ($_GET['id'] != '') {
            $buscaAnos = $this->Candidatos->Anos->find()
                ->where(['tipo_id' => $_GET['id']])
                ->select(['id' => 'Anos.id', 'nm_ano' => 'Anos.nm_ano'])
                ->toArray();

            foreach ($buscaAnos as $a) $anos[$a->id] = $a->nm_ano;
        } else {
            $tipos = 'Selecione um tipo';
        }

        $this->set(compact('anos'));
    }

    public function fichapdf($id, $output = false)
    {
        $eventos = $this->fetchTable('Eventos');

        $evento = $eventos->find()
            ->where(['tp_eventos_id' => 1])->first();

        $ano = $evento->ano_evento;

        $bolsa = $this->Candidatos->Inscricoes->find()
            ->where(['Candidatos.id' => $id, 'Inscricoes.ano' => $ano])
            ->contain([
                'Candidatos' => ['Escolas', 'Tipos', 'Anos'],
                'Responsavels' => ['BemMoveis', 'BemImoveis', 'CompFamiliares']
            ])
            ->first();

        $anexos = $this->Candidatos->Anexos->find()
            ->where(['candidato_id' => $id])
            ->contain(['TpAnexos'])->all();

        $vl_renda = $bolsa->responsavel->vl_salarial;
        if ($bolsa->responsavel->comp_familiares !== null) {
            foreach ($bolsa->responsavel->comp_familiares as $comp_familiar) {
                $vl_renda += $comp_familiar->vl_renda;
            }
        }
        $this->set('renda_familiar', $vl_renda);
        if ($bolsa->responsavel->bem_imoveis !== null) {
            $vl_imovel = 0;
            foreach ($bolsa->responsavel->bem_imoveis as $bemimoveis) {
                $vl_imovel += $bemimoveis->vl_imovel;
            }
        }
        if ($bolsa->responsavel->bem_moveis !== null) {
            $vl_movel = 0;
            foreach ($bolsa->responsavel->bem_moveis as $bemmoveis) {
                $vl_movel += $bemmoveis->vl_veiculo;
            }
        }
        $this->set('patrimonio', $vl_imovel + $vl_movel);

        // debug($bolsa);
        // die;
        $this->set(compact('evento', 'bolsa', 'anexos'));

        $builder = $this->viewBuilder();

        $builder->setTemplate('fichapdf');
        $builder->disableAutoLayout(false);

        // if (!$this->request->getQuery('view')) {
           
            $data = $this->render()->__toString();

            $ilovepdf = new HtmlpdfTask('project_public_f45ba906cde789b346503a196911b510_SaGpH09e943a9000c63dbf068c8a9d25facee', 'secret_key_d42c2ffec51f44be00c83e7c4cb658b0_IPA9O7e4a022ba8e82ae715f5752b6b4b6c55');

            $myTaskOffice = $ilovepdf->newTask('htmlpdf');
            $myTaskOffice->setPageMargin(50);
            $file1 = $myTaskOffice->addUrl('https://dpid.cidadaopg.sp.gov.br/be_2024/candidatos/fichapdf/1/1');
            // $file1 = $myTaskOffice->addUrl($data);
            $myTaskOffice->execute();
            $myTaskOffice->download();

            return $myTaskOffice->outputFileName;

            // return $this->response->withStringBody($myTaskOffice->blob())->withType('pdf')->withDownload($id . '.pdf');
        // }
    }


    public function arquivospdf($id)
    {
        set_time_limit(300);
        $anexos = $this->Candidatos->Anexos->find()
            ->where(['candidato_id' => $id])
            ->contain(['TpAnexos'])
            ->all();

        // '../files/ano-2024' . '/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo

        // $ilovepdf = new Ilovepdf('project_public_id','project_secret_key');

        $allowed = array('png', 'jpg', 'jpeg');

        // $imageToPdf = new ImagepdfTask('project_public_f45ba906cde789b346503a196911b510_SaGpH09e943a9000c63dbf068c8a9d25facee', 'secret_key_d42c2ffec51f44be00c83e7c4cb658b0_IPA9O7e4a022ba8e82ae715f5752b6b4b6c55');

        $ilovepdf = new Ilovepdf('project_public_f45ba906cde789b346503a196911b510_SaGpH09e943a9000c63dbf068c8a9d25facee', 'secret_key_d42c2ffec51f44be00c83e7c4cb658b0_IPA9O7e4a022ba8e82ae715f5752b6b4b6c55');
        $ilovepdf2 = new Ilovepdf('project_public_f45ba906cde789b346503a196911b510_SaGpH09e943a9000c63dbf068c8a9d25facee', 'secret_key_d42c2ffec51f44be00c83e7c4cb658b0_IPA9O7e4a022ba8e82ae715f5752b6b4b6c55');
        $myTaskMerge = $ilovepdf->newTask('merge');
        $fileA = $myTaskMerge->addFile($this->fichapdf($id, true));

        foreach ($anexos as $anexo):
            $caminho = WWW_ROOT . 'files' . DS . 'ano-2025' . DS . 'Inscricoes' . DS . $anexo->inscricao_id;
            // $imageType = exif_imagetype('files/ano-2024/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo);
            if (in_array(substr(strrchr($anexo->nm_anexo, '.'), 1), $allowed)) {

                $imageToPdf = $ilovepdf2->newTask('imagepdf');

                $fileA = $imageToPdf->addFile('files/ano-2025/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo);
                // $fileA = $imageToPdf->addFileFromUrl('https://dpid.cidadaopg.sp.gov.br/bolsaestudo/files/ano-2025/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo);

                $imageToPdf->execute();
                $imageToPdf->download();

                $fileA = $imageToPdf->result->download_filename;

                $fileB = $myTaskMerge->addFile($fileA);
            } else {

                $fileB = $myTaskMerge->addFile('files/ano-2025/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo);
                // $fileB = $myTaskMerge->addFileFromUrl('https://dpid.cidadaopg.sp.gov.br/bolsaestudo/files/ano-2025/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo);
            }

        endforeach;
        $myTaskMerge->setOutputFilename('inscr_' . $anexo->inscricao_id);
        $myTaskMerge->execute();
        $myTaskMerge->download('procDig');

        $candidato = $this->Candidatos->get($id);
        $candidato->download = 1;

        $this->Candidatos->save($candidato);

        return $this->response->withStringBody($myTaskMerge->blob())->withType('pdf')->withDownload($anexo->inscricao_id . '.pdf');

        $this->set('anexos', $anexos);
    }

    public function cron()
    {
        $candidatos = $this->Candidatos->find()->where(['download' => 0])->limit(2);

        foreach ($candidatos as $candidato) $this->arquivospdf($candidato->id);

        return $this->response->withStringBody('ok');
    }
}
