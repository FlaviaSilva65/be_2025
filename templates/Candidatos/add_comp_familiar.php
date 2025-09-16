<?= $this->Html->script(['formescolascript']); ?>
<?php // $this->Form->create($comp_familiares); ?>
<?= $this->Form->create(null); ?>
<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 fw-bold align-items-center"> Ficha de Inscrição - Cadastro do Candidato</h3>
</div>
<div class="hr_home bg-vermelho"></div>

<div class="container">
    <div class="col-12 d-flex justify-content-center">
        <div class="form-group col-md-6 mt-4 justify-content-center alert alert-danger rounded" id="divalerta" style="">
            <div>
                Informe todos os membros da FAMILIA, incluindo o RESPONSÁVEL / DEPENDENTES, mesmo que menores de idade.
            </div>
        </div>
    </div>
    <div class="row gx-2 justify-content-around">
        <?php // $this->Form->control('responsavel_id', ['type' => 'hidden', 'value' => $candidato->responsavel_id]) ?>
    </div>
    <?php $i = 0; ?>
    <div class="fam" id="containerfam">
        <?php

        // foreach ($comp_familiares as $comp_familiar) :
        ?>

        <div class="col-md-12 px-0 d-sm-flex flex-sm-wrap" id="compfam">
            <div class="col-sm-6 col-md-3 pe-2">
                <?= $this->Form->control('comp_familiares.' . $i . '.responsavel_id', ['type' => 'hidden', 'value' => $candidato->responsavel_id]) ?>
                <?= $this->Form->control('comp_familiares.' . $i . '.nm_comp_fam', ['label' => 'Nome'], ['placeholder' => 'Nome do Parente']); ?>
            </div>
            <div class="col-sm-6 col-md-1 px-2">
                <?= $this->Form->control('comp_familiares.' . $i . '.nm_parentesco', ['value' => $comp_familiares ? $comp_familiares->nm_parentesco : '', 'label' => 'Parentesco',  'placeholder' => 'Pai/Irmão...']); ?>
            </div>
            <div class="col-sm-6 col-md-2 px-2">
                <?= $this->Form->control('comp_familiares.' . $i . '.nm_profis_comp_fam', ['value' => $comp_familiares ? $comp_familiares->nm_profis_comp_fam : '', 'label' => 'Profissão',  'placeholder' => 'Autónomo/Servidor...']); ?>
            </div>
            <div class="col-sm-6 col-md-3 px-2">
                <?= $this->Form->control('comp_familiares.' . $i . '.nm_end_trab', ['value' => $comp_familiares ? $comp_familiares->nm_end_trab : '', 'label' => 'Local de Trabalho']); ?>
            </div>
            <div class="col-sm-6 col-md-2 ps-2">
                <?= $this->Form->control(
                    'comp_familiares.' . $i . '.vl_renda',
                    [
                        'value' => '0,00',
                        'onfocus' => 'this.value=""',
                        'type' => 'text',
                        'class' => 'money', 'max' => '9', 'label' => 'Renda Bruta'
                    ]
                ); ?>
            </div>

            <div class="col-1 mt-md-4">
                <button class="btnexcluirdoc d-flex mt-2 ms-4" style="background-color:transparent;" type="button" onclick="modal_exclusao(this)">
                    <i class="bi bi-trash3 text-danger"></i>
                </button>
            </div>

        </div>
        <?php
        $i++;
        // endforeach;
        ?>
    </div>
    <div class="d-flex justify-content-around mt-4">
        <button class="btn btn-primary mt-2 mb-2 px-4" type="button" onclick="adicionarCampos()" title="Click para adicionar mais familiar">
            <i class="bi bi-plus text-white"></i> Adicionar familiar
        </button>
    </div>
    <div class="d-flex justify-content-around mt-4">
        <div class="col-12 col-md-6 d-flex justify-content-around">
            <button class="btn btn-warning mt-4 text-white" onclick="history.back()"><i class="bi bi-arrow-return-left"></i> Voltar </button>
        </div>

        <div class="col-12 col-md-6 d-flex justify-content-around">
            <button class="btn btn-success mt-4" type="submit"><i class="bi bi-save text-white"></i> Avançar </button>
        </div>

    </div>
</div>