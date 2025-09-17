<!-- SEDUC DPID - FLAVIA A S SILVA RF:47093 em 10/06/2024 -->

<?= $this->Html->script(['formescolascript']); ?>
<?= $this->Form->create($candidato); ?>
<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 fw-bold align-items-center"> Ficha de Inscrição - Cadastro do Candidato</h3>
</div>
<div class="hr_home bg-vermelho"></div>

<div class="container">
    <div class="row gx-2 justify-content-around">
        <div class="col-12 d-flex justify-content-center">
            <div class="d-inline-flex col-12 col-md-6 p-3 mt-2 justify-content-between border bg-light rounded">
                <p class="fw-bold required">Possuiu o benefício no ano anterior ?</p>
                <?= $this->Form->radio('ic_ano_anterior', ['1' => 'Sim', '0' => 'Não'], ['class' => 'me-2 formcontrol', 'label' => ['class' => 'mt-0']]); ?>
            </div>
        </div>

        <?= $this->Form->control('responsavel_id', ['type' => 'hidden', 'value' => $responsavel['id']]) ?>
        <?= $this->Form->control('mov_cad', ['value' => '', 'type' => 'hidden']) ?>
        <div class="col-12 col-md-6">
            <?= $this->Form->control('nm_candidato', ['label' => 'Nome completo do Candidato', 'value' => $candidato->nm_candidato]); ?>
        </div>
        <div class="col-12 col-md-3">
            <?= $this->Form->control('vl_rg', ['id' => 'rg', 'maxlength' => 12, 'label' => 'RG', 'class' => 'rg', 'value' => $responsavel->vl_rg_resp, 'placeholder' => 'RG do candidato']); ?>
        </div>
        <div class="col-12 col-md-3">
            <?= $this->Form->control('vl_cpf', ['id' => 'cpf', 'minlength' => 14, 'onfocusout' => "return valida_cpf(this)", 'label' => 'CPF', 'class' => 'cpf', 'placeholder' => 'CPF do candidato']); ?>
        </div>


        <div class="col-12 col-md-3">
            <?= $this->Form->control('dt_nascimento', ['label' => 'Dt. Nascimento', 'id' => 'nasc']); ?>
        </div>
        <div class="col-12 col-md-3">
            <?= $this->Form->control('vl_ctnumero', [
                'id' => 'termo',
                'maxlength' => 12,
                'label' => 'Certidão Nasc.(Termo)'
                    . '<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Exemplo de Cert. Nascimento" class="text-danger"><i class="bi bi-question-lg"> </i></a>',
                'escape' => false,
                'placeholder' => 'Núm. da certidão de nascimento'
            ]); ?>
        </div>
        <div class="col-12 col-md-3">
            <?= $this->Form->control('vl_ctlivro', ['id' => 'ctLivro', 'maxlength' => 5, 'label' => 'Livro',  'placeholder' => 'Número do livro']); ?>
        </div>
        <div class="col-12 col-md-3">
            <?= $this->Form->control('vl_ctfolha', ['id' => 'ctFolha', 'maxlength' => 5, 'label' => 'Folha', 'placeholder' => 'Número da folha']); ?>
        </div>

        <div class="col-12 d-flex justify-content-center mt-2">
            <div class="d-inline-flex col-12 col-md-6 p-3 justify-content-between border bg-light rounded">
                <p class="fw-bold required">Possuiu alguma deficiência ?</p>
                <?= $this->Form->radio('ic_deficiente', ['1' => 'Sim', '0' => 'Não'], ['class' =>  'me-2 formcontrol',  'label' => ['class' => 'mt-0']]); ?>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <?= $this->Form->control('nm_filiacao1', ['label' => 'Filiação 1',  'type' => 'text',  'placeholder' => 'Nome completo da filiação 1']); ?>
        </div>
        <div class="col-12 col-md-6">
            <?= $this->Form->control('nm_filiacao2', ['label' => 'Filiação 2', 'placeholder' => 'Nome completo da filiação 2 (não obrigatório)']); ?>
        </div>
        <div class="col-12 col-md-2">
            <?= $this->Form->control('vl_cep', ['id' => 'cep', 'label' => 'CEP', 'class' => 'cep', 'placeholder' => 'CEP ex:. 11999999...']); ?>
        </div>
        <div class="col-10 col-sm-10 col-md-8">
            <?= $this->Form->control('nm_rua', ['label' => 'Endereço', 'id' => 'logradouro', 'class' => 'logradouro', 'placeholder' => 'Ex:. rua abc...']); ?>
        </div>
        <div class="col-2 col-sm-2 col-md-2">
            <?= $this->Form->control('vl_numero', ['label' => 'Núm.', 'placeholder' => 'Número', 'maxlength' => '7']); ?>
        </div>
        <div class="col-12 col-md-4">
            <?= $this->Form->control('nm_bairro', ['label' => 'Bairro', 'id' => 'bairro', 'placeholder' => 'Bairro']); ?>
        </div>
        <div class="col-12 col-md-4">
            <?= $this->Form->control('nm_cidade', ['label' => 'Cidade', 'id' => 'cidade', 'placeholder' => 'Cidade']); ?>
        </div>
        <div class="col-12 col-md-4">
            <?= $this->Form->control('nm_complemento', ['label' => 'Complemento (apto/bloco)', 'placeholder' => 'Complemento ex:. apto/bloco']); ?>
        </div>
        <div class="col-12 col-md-4">
            <label class="required">Telefone Res. / Contato</label>
            <?= $this->Form->control('vl_tel', ['id' => 'tel', 'class' => 'phone_with_ddd', 'placeholder' => 'Telefone para contato', 'label' => false]); ?>
        </div>

        <div class="col-12 col-md-4">
            <?= $this->Form->control('vl_cel', ['id' => 'cel', 'label' => 'Celular', 'class' => 'cel',  'placeholder' => 'Celular']); ?>
        </div>

        <div class="col-12 col-md-4">
            <?= $this->Form->control('vl_tempo_res', ['label' => 'Res. no município', 'placeholder' => 'Tempo de residência no município']); ?>
        </div>
        <div class="col-12 mt-5 my-2 border-bottom border-5 border-dark-subtle">
            <h4 class="fw-bold">Unidades Escolares - Opções</h4>
        </div>
        <div class="col-md-12 px-0 d-sm-flex flex-sm-wrap" id="formescola">
            <div class="col-12 col-sm-4 col-md-4 pe-2">
                <?= $this->Form->control('escola_id', ['id' => 'escola', 'class' => 'p-1 w-100 rounded b-sencondary',  'label' => 'Selecione a escola', 'empty' => '---', 'options' => $escolas, 'onclick' => 'verificaContato()']); ?>
                <?= $this->Form->control('escolaid', ['name' => 'idescola', 'type' => 'hidden']) ?>
            </div>
            <div class="col-12 col-sm-4 px-2" id="xx">
                <?= $this->Form->control('tipo_id', ['id' => 'tipos', 'class' => 'p-1 w-100', 'empty' => '---', 'type' => 'select', 'label' => 'Nível de Ensino', 'empty' => '---', 'options' => $tipos,]); ?>
            </div>
            <div class="col-12 col-sm-4 ps-2" id="anoid">
                <?= $this->Form->control('ano_id', [
                    'id' => 'ano',
                    'class' => 'p-1 w-100',
                    'empty' => '---',
                    'type' => 'select',
                    'label' => 'Anos Escolares ',
                    'empty' => '---',
                    'options' => $anos,
                    'onblur' => 'alerta()'
                ]); ?>
            </div>
        </div>
        <div class="col-12 mt-5 my-2 border-bottom border-5 border-dark-subtle">
            <h4 class="fw-bold">Questionário Sócio-Econômico</h4>
        </div>
        <div class="col-md-12 px-0 d-sm-flex flex-sm-wrap">
            <div class="col-sm-6 col-md-3 pe-2">
                <?= $this->Form->control('ds_moradia', [
                    'type' => 'select',
                    'class' => 'p-1 w-100',
                    'options' => ['empty' => '---', '1' => 'Área de Reg. Fundiária', '2' => 'Própria', '3' => 'Cedida', '4' => 'Financiada', '5' => 'Alugada'],
                    'label' => 'Tipo de Moradia'
                ]); ?>
            </div>
            <div class="col-sm-6 col-md-3 px-2">
                <?= $this->Form->control('ds_dependentes', ['type' => 'select', 'class' => 'p-1 w-100', 'options' => ['empty' => '---', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => 'mais de 4'], 'label' => 'Depend. menor(s) de 18 anos.']); ?>
            </div>
            <div class="col-sm-6 col-md-3 px-2">
                <?= $this->Form->control('ds_rendafamiliar', ['type' => 'select', 'class' => 'p-1 w-100', 'options' => ['empty' => '---', '5' => 'Até 2 Salários Mínimos', '4' => '3 a 5', '3' => '6 a 10', '2' => '11 a 15', '1' => ' mais de 16'], 'label' => 'Renda familiar / Salário mínimo']); ?>
            </div>
            <div class="col-sm-6 col-md-3 ps-2">
                <!-- 
                            Ao Final do Projeto excluir esse bloco 
                        -->
                <?= $this->Form->control('ds_patrimonio', [
                    'type' => 'select',
                    'class' => 'p-1 w-100',
                    'options' => [
                        'empty' => '---',
                        '5' => '0 A R$ 150.000,00',
                        '4' => 'R$ 151.000,00 A R$ 300.000,00',
                        '3' => 'R$ 301.000,00 A R$ 450.000,00',
                        '2' => 'Acima de R$ 451.000,00'
                    ],
                    'label' => 'Patrimônio Familiar'
                ]); ?>
                <?php $this->Form->control('ds_transporte', ['type' => 'select', 'class' => 'p-1 w-100', 'options' => ['empty' => '---', '5' => 'Coletivo', '4' => 'Fretado', '3' => 'Particular'], 'label' => 'Meio de transporte']); ?>
            </div>
        </div>

    </div>
    <div class="row my-4 d-flex justify-content-center">
        <div class="col-12 col-md-6 d-flex justify-content-around">
            <button type="button" onclick="voltar_pagina_add();" class="btn btn-warning mt-4 ml-4 px-4" style="color: white;"><i class="fas fa-reply" style="padding-right: 5px"></i>Voltar</button>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-around">
            <button class="btn btn-success mt-4 ml-4 px-4" type="submit"><i class="bi bi-save"></i> Avançar </button>
        </div>

    </div>

    <div class="row gx-0 justify-content-around">

        <!-- VER SE HÁ NECESSIDADE DE COLOCAR AS MSGs DE ERROS-->
    </div>
    <div>
        <input id="urltipo" value="<?= $this->Url->build(['controller' => 'Candidatos', 'action' => 'opcoestipos']) ?>" class="d-none">
    </div>
    <div>
        <input id="urlano" value="<?= $this->Url->build(['controller' => 'Candidatos', 'action' => 'opcoesanos']) ?>" class="d-none">

        <input id="urlcad" value="<?= $this->Url->build(['controller' => 'Candidatos', 'action' => 'vercadastro']) ?>" class="d-none">

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="p-3 bg-white">
                <?= $this->Html->image('Informe.jpg', ['class' => 'w-100 mb-2']) ?>
                <p class="alert alert-danger text-justify"><b>Atenção:</b> O número da certidão de nascimento, corresponde ao <b style="font-size:16px">Número do Termo</b> de 7 dígitos, caso seja menos completar com 0 no início.</p>
            </div>
        </div>
    </div>