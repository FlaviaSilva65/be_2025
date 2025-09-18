<!-- SEDUC DPID - FLAVIA A S SILVA RF:47093 em 27/05/2024 -->

<?= $this->Form->create($responsavel); ?>
<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 mb-4 fw-bold align-items-center"> Ficha de Inscrição - Cadastro do Responsável</h3>
</div>
<div class="hr_home bg-vermelho"></div>


<div class="col-11 col-lg-11 mx-auto d-flex justify-content-center my-2 flex-wrap">

    <div class="col-11 col-md-11 col-lg-6 d-md-flex">
        <div class="col-12 col-md-8 pe-md-1">
            <?= $this->Form->control('nm_responsavel', ['label' => 'Nome completo do Responsável', 'value' => $responsavel->nm_responsavel]); ?>
            <?= $this->Form->control('id', ['label' => 'id', 'value' => $responsavel->id, 'type' => 'hidden']); ?>
        </div>
        <div class="col-12 col-md-4 ps-md-1">
            <?= $this->Form->control('dt_nascimento', ['label' => 'Dt. Nascimento', 'id' => 'nasc', 'value' => $nasc ?? '']); ?>
        </div>
    </div>
    <div class="col-11 d-md-flex"></div>

    <div class="col-11 col-md-11 col-lg-6 d-md-flex mx-auto">
        <div class="col-12 col-md-6 pe-md-1">
            <?= $this->Form->control('vl_rg_resp', ['id' => 'rg', 'maxlength' => 12, 'label' => 'RG', 'class' => 'rg',   'value' => $responsavel->vl_rg_resp]); ?>
        </div>
        <div class="col-12 col-md-6 ps-md-1">
            <?= $this->Form->control('vl_cpf', ['id' => 'cpf', 'maxlength' => 12, 'label' => 'CPF', 'class' => 'cpf',   'value' => $cpf ?? '']); ?>
        </div>
    </div>

    <div class="col-11 d-md-flex"></div>

    <div class="col-11 col-md-11 col-lg-6 d-md-flex mx-auto">
        <div class="col-12 col-md-6 pe-md-1">
            <?= $this->Form->control('vl_titulo', ['id' => 'titulo', 'maxlength' => 12, 'class' => 'titulo', 'value' => $responsavel->vl_titulo, 'label' => 'Título eleitoral']); ?>
        </div>
        <div class="col-12 col-md-2 px-md-1">
            <?= $this->Form->control('vl_zona', ['id' => 'zona', 'type' => 'select', 'empty' => '---', 'options' => ['317' => '317', '406' => '406'], 'value' => $responsavel->vl_zona, 'label' => 'Zona']); ?>
        </div>
        <div class="col-12 col-md-4 ps-md-1">
            <?= $this->Form->control('vl_secao', ['id' => 'secao', 'maxlength' => 4, 'value' => $responsavel->vl_secao, 'label' => 'Seção']); ?>
        </div>
    </div>

    <div class="col-11 d-md-flex"></div>


    <div class="col-11 col-md-11 col-lg-6 d-md-flex">
        <div class="col-12 col-md-4 pe-md-1">
            <?= $this->Form->control('cd_cel', ['id' => 'cel', 'maxlength' => 13, 'value' => $responsavel->cd_cel, 'oninput' => 'phone(this)', 'label' => 'Celular']); ?>
        </div>
        <div class="col-12 col-md-8 ps-md-1">
            <?= $this->Form->control('nm_email', ['id' => 'email', 'value' => $responsavel->nm_email, 'label' => 'E-mail']); ?>
        </div>
    </div>
    <div class="col-11 d-md-flex"></div>
    <div class="col-11 col-md-11 col-lg-6 d-md-flex my-3 brTitle">
        <p class="mb-lg-2">Bens Patrimoniais - Bens Móveis</p>
    </div>
    <div class="col-11 d-md-flex"></div>
    <div class="col-11 col-md-11 col-lg-6 d-md-flex bg-danger ">
        <div class="w-50 flex-wrap bg-striped py-2 my-2">
            <h6 class="d-flex text-center mx-3 fw-bold">
                Você possui algum bem móvel (carro/moto ...)?
            </h6>
        </div>
        <div class="w-50 d-flex align-items-center justify-content-center flex-wrap bg-striped py-2 my-2">
            <?= $this->Form->control(
                'ic_bens_moveis',
                [
                    'type' => 'radio',
                    'options' => ['1' => 'Sim', '0' => 'Não'],
                    'value' => null,
                    'label' => false,
                    'legend' => false,
                    'templates' => [
                        'radioWrapper' => '<div class="d-inline mx-3">{{label}}</div>',
                        'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}} class="form-check-input styled-radio mt-0 me-2">',
                    ]
                ]
            ); ?>
        </div>
    </div>

    <div class="col-11 d-md-flex"></div>

    <div class="col-11 col-md-11 col-lg-6 d-flex justify-content-around mt-4">
        <button class="btn btn-warning mt-2 mb-2 px-4 text-white" onclick="history.back()">
            <i class="bi bi-arrow-return-left "></i>
            Voltar
        </button>
        <button class="btn btn-success mt-2 mb-2 px-4" type="submit"><i class="bi bi-arrow-right"></i> Avançar </button>
    </div>

</div>

<?= $this->Form->end() ?>