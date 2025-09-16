<!-- SEDUC DPID - FLAVIA A S SILVA RF:47093 em 27/05/2024 -->

<?= $this->Form->create($responsavel); ?>
<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 mb-4 fw-bold align-items-center"> Ficha de Inscrição - Edição do Cadastro</h3>
</div>
<div class="hr_home bg-vermelho"></div>


<div class="row gx-0 justify-content-center">

    <div class="col-11 col-md-11 col-lg-6 d-md-flex">
        <div class="col-12 col-md-8 mx-1">
            <?= $this->Form->control('nm_responsavel', ['label' => 'Nome completo do Responsável', 'value' => $responsavel->nm_responsavel]); ?>
            <?= $this->Form->control('id', ['label' => 'id', 'value' => $responsavel->id, 'type' => 'hidden']); ?>
        </div>
        <div class="col-12 col-md-4 mx-1">
            <?= $this->Form->control('dt_nascimento', ['label' => 'Dt. Nascimento', 'id' => 'nasc', 'value' => $responsavel->dt_nascimento ?? '']); ?>
        </div>
    </div>
    <div class="col-11 d-md-flex">

    </div>

    <div class="col-11 col-md-11 col-lg-6 d-md-flex">
        <div class="col-12 col-md-6 mx-1">
            <?= $this->Form->control('vl_rg_resp', ['id' => 'rg', 'maxlength' => 12, 'label' => 'RG', 'class' => 'rg',   'value' => $responsavel->vl_rg_resp]); ?>
        </div>
        <div class="col-12 col-md-6 mx-1">
            <?= $this->Form->control('vl_cpf', ['id' => 'cpf', 'maxlength' => 12, 'label' => 'CPF', 'class' => 'cpf',   'value' => $responsavel->vl_cpf ?? '']); ?>
        </div>
    </div>

    <div class="col-11 d-md-flex">

    </div>

    <div class="col-11 col-md-11 col-lg-6 d-md-flex">
        <div class="col-12 col-md-6 mx-1">
            <?= $this->Form->control('vl_titulo', ['id' => 'titulo', 'maxlength' => 12, 'class' => 'titulo', 'value' => $responsavel->vl_titulo, 'label' => 'Título eleitoral']); ?>
        </div>
        <div class="col-12 col-md-6 mx-1 d-flex justify-content-around">
            <?= $this->Form->control('vl_zona', ['id' => 'zona', 'type' => 'select', 'empty' => '---', 'options' => ['317' => '317', '406' => '406'], 'value' => $responsavel->vl_zona, 'label' => 'Zona']); ?>
            <?= $this->Form->control('vl_secao', ['id' => 'secao', 'maxlength' => 4, 'value' => $responsavel->vl_secao, 'label' => 'Seção']); ?>
        </div>
    </div>

    <div class="col-11 d-md-flex">

    </div>


    <div class="col-11 col-md-11 col-lg-6 d-md-flex">
        <div class="col-12 col-md-4 mx-1">
            <?= $this->Form->control('cd_cel', ['id' => 'cel', 'maxlength' => 13, 'value' => $responsavel->cd_cel, 'oninput' => 'phone(this)', 'label' => 'Celular']); ?>
        </div>
        <div class="col-12 col-md-8 mx-1">
            <?= $this->Form->control('nm_email', ['id' => 'email', 'value' => $responsavel->nm_email, 'label' => 'E-mail']); ?>
        </div>
    </div>

    <div class="col-11 d-md-flex"></div>

    <div class="col-11 col-md-11 col-lg-6 d-flex justify-content-around mt-4">
        <?= $this->Html->link('<i class="bi bi-arrow-return-left"></i> Voltar',
            ['controller' => 'Pages', 'action' => 'home'],
            [
                'escape' => false,
                'class' => 'btn btn-warning mt-2 mb-2 px-4 text-white'
            ]
        ) ?>




        <button class="btn btn-success mt-2 mb-2 px-4" type="submit"><i class="bi bi-arrow-right"></i> Avançar </button>
    </div>

</div>

<?= $this->Form->end() ?>