<!-- SEDUC DPID - FLAVIA A S SILVA RF:47093 em 27/05/2024 -->

<?= $this->Form->create($escola, ['id' => 'form_escola', 'onsubmit' => "return validar_checkbox()"]); ?>
<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 mb-4 fw-bold align-items-center"> Cadastro das Escolas</h3>
</div>
<div class="hr_home bg-vermelho"></div>


<div class="row gx-0 justify-content-center">

    <div class="col-11 col-md-11 col-lg-6 d-md-flex">
        <div class="col-12 col-md-8 mx-1">
            <?= $this->Form->control('nm_escola', ['label' => 'Nome da Escola', 'placeholder' => 'Digite aqui o nome da Escola.']); ?>
        </div>
    </div>
    <div class="col-11 d-md-flex"></div>
    <div class="col-11 col-md-11 col-lg-6 d-md-flex justify-content-around radios">

        <div class="col-lg-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                <input type="checkbox" class="me-3 btn-check btn_inf" id="btncheck1" name="tipo_id" value="1" <?= $tp_infantil->tipo_id  ?? false ? "checked" : "" ?> onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary " for="btncheck1" id="lbl_inf">Ensino Infantil 
                </label>

            </div>

            <?php foreach ($educ_infantil as $i => $infantil) : ?>

             
                <?php // $infantil ?>

                <?= $this->Form->control('escola_tipos_anos.' . $infantil->id . '.id', ['type' => 'hidden', 'value' => $infantil->escola_tipos_anos[0]->id ?? null])  ?>
                <?= $this->Form->control('escola_tipos_anos.' . $infantil->id . '.ano_id', ['type' => 'hidden', 'value' => $infantil->id]) ?>
                <?= $this->Form->control('escola_tipos_anos.' . $infantil->id . '.tipo_id', ['type' => 'hidden', 'value' => $infantil->tipo_id]) ?>
                <?= $this->Form->control('escola_tipos_anos.' . $infantil->id . '.ic_ativo', ['type' => 'checkbox', 'onclick' => 'return false','readonly', 'checked' => $infantil->escola_tipos_anos[0]->ic_ativo ?? false,'value' => 1,'hiddenField' => '0', 'class' => 'me-3 opt_inf', 'label' => $infantil->nm_ano]) ?>
            <?php

            endforeach; ?>
        </div>
        <div class="col-lg-3 mx-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="me-3 btn-check" id="btncheck2" name="tipo_id" value= "2" <?= $tp_fund1->tipo_id == 2 ? "checked" : "" ?> onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btncheck2">Ensino Fundamental 1
                </label>
            </div>
            <?php foreach ($educ_fundamental1 as $i => $fund) : ?>
                <?php if ($fund->tipo_id == 2) { ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund->id . '.id', ['type' => 'hidden', 'value' => $fund->escola_tipos_anos[0]->id ?? null]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund->id . '.ano_id', ['type' => 'hidden', 'value' => $fund->id]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund->id . '.tipo_id', ['type' => 'hidden', 'value' => $fund->tipo_id]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund->id . '.ic_ativo', ['type' => 'checkbox', 'onclick' => 'return false','readonly', 'checked' => $fund->escola_tipos_anos[0]->ic_ativo ?? false,'value' => 1, 'hiddenField' => '0','class' => 'me-3 opt_fund1' ,'label' => $fund->nm_ano]) ?>
            <?php }
            endforeach; ?>

            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="me-3 btn-check" id="btncheck3" name="tipo_id" value= "3" onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary <?= (isset($tp_fund2->tipo_id) && $tp_fund2->tipo_id == 3) ? "active" : "" ?>" for="btncheck3">Ensino Fundamental 2
                </label>
            </div>
            <?php foreach ($educ_fundamental2 as $i => $fund2) : ?>
                <?php if ($fund2->tipo_id == 3) { ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund2->id . '.id', ['type' => 'hidden', 'value' => $fund2->escola_tipos_anos[0]->id ?? null]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund2->id . '.ano_id', ['type' => 'hidden', 'value' => $fund2->id ]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund2->id . '.tipo_id', ['type' => 'hidden', 'value' => $fund2->tipo_id]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $fund2->id . '.ic_ativo', ['type' => 'checkbox', 'onclick' => 'return false','readonly', 'checked' => $fund2->escola_tipos_anos[0]->ic_ativo ?? false,'value' => 1, 'hiddenField' => '0','class' => 'me-3 opt_fund2','label' => $fund2->nm_ano]) ?>
            <?php }
            endforeach; ?>
        </div>
        <div class="col-lg-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                <input type="checkbox" class="me-3 btn-check" id="btncheck4" name="tipo_id" value= "4" onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary <?= (isset($tp_medio->tipo_id) && $tp_medio->tipo_id == 4) ? "active" : "" ?>" for="btncheck4">Ensino Médio
                </label>

            </div>

            <?php foreach ($educ_medio as $i => $medio) : ?>
                <?php if ($medio->tipo_id == 4) { ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $medio->id . '.id', ['type' => 'hidden', 'value' => $medio->escola_tipos_anos[0]->id ?? null]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $medio->id . '.ano_id', ['type' => 'hidden']) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $medio->id . '.tipo_id', ['type' => 'hidden', 'value' => $medio->tipo_id]) ?>
                    <?= $this->Form->control('escola_tipos_anos.' . $medio->id . '.ic_ativo', ['type' => 'checkbox', 'onclick' => 'return false','readonly', 'checked' => $medio->escola_tipos_anos[0]->ic_ativo ?? false,'value' => 1, 'hiddenField' => '0','class' => 'me-3 opt_med','label' => $medio->nm_ano]) ?>
            <?php }
            endforeach; ?>
        </div>
    </div>
    <div class="d-flex justify-content-around mt-4">
        <button class="btn btn-warning mt-2 mb-2 px-4" type="button" onclick="history.back()">
            <i class="bi bi-arrow-return-left text-white"></i>
        </button>
        <button class="btn btn-success mt-2 mb-2 px-4" type="submit"><i class="bi bi-save"></i> </button>
    </div>
    <?= $this->Form->end() ?>
</div>
</div>
