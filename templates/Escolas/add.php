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
            <?= $this->Form->control('nm_escola', ['label' => 'Nome da Escola', 'id' => 'nm_escola', 'placeholder' => 'Digite aqui o nome da Escola.']); ?>
        </div>
    </div>
    <div class="col-11 d-md-flex"></div>
    <div class="col-md-10 col-lg-8 d-lg-flex justify-content-around">
        <div class="col-lg-2">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                <input type="checkbox" class="me-3 btn-check" id="btncheck1" name="tipo_id" value="1" onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btncheck1">Ensino Infantil</label>

            </div>

            <?php foreach ($educ_infantil as $i => $infantil) : ?>
                <?= $this->Form->control('escola_tipos_anos.'.$infantil->id.'.ano_id', ['type' => 'checkbox', 'onclick' => 'return false','readonly', 'value' => $infantil->id, 'hiddenField' => false, 'class' => 'me-3 opt_inf', 'label' => $infantil->nm_ano]) ?>
                <?= $this->Form->control('escola_tipos_anos.'.$infantil->id. '.tipo_id', ['type' => 'hidden', 'value' => $infantil->tipo_id]) ?>
            <?php endforeach; ?>
        </div>

        <div class="col-lg-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                <input type="checkbox" class="me-3 btn-check" id="btncheck2" name="tipo_id" value="2" onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btncheck2">Ensino Fundamental 1</label>

            </div>
            <?php foreach ($educ_fundamental1 as $i => $fund) : ?>
                <?= $this->Form->control('escola_tipos_anos.'.$fund->id.'.ano_id', ['type' => 'checkbox', 'onclick' => 'return false','readonly', 'value' => $fund->id, 'hiddenField' => false, 'class' => 'me-3 opt_fund1', 'label' => $fund->nm_ano]) ?>
                <?= $this->Form->control('escola_tipos_anos.'.$fund->id.'.tipo_id', ['type' => 'hidden', 'value' => $fund->tipo_id]) ?>
            <?php endforeach; ?>

            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                <input type="checkbox" class="me-3 btn-check" id="btncheck3" name="tipo_id" value="3" onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btncheck3">Ensino Fundamental 2</label>

            </div>
            <?php foreach ($educ_fundamental2 as $i => $fund2) : ?>
                <?= $this->Form->control('escola_tipos_anos.'.$fund2->id.'.ano_id', ['type' => 'checkbox', 'onclick' => 'return false', 'readonly', 'value' => $fund2->id, 'hiddenField' => false, 'class' => 'me-3 opt_fund2', 'label' => $fund2->nm_ano]) ?>
                <?= $this->Form->control('escola_tipos_anos.'.$fund2->id.'.tipo_id', ['type' => 'hidden', 'value' => $fund2->tipo_id]) ?>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-2">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                <input type="checkbox" class="me-3 btn-check" id="btncheck4" name="tipo_id" value="4" onclick="seleciona_ano(this)" autocomplete="off">
                <label class="btn btn-outline-secondary" for="btncheck4">Ensino Médio</label>
            </div>
            <?php foreach ($educ_medio as $i => $medio) : ?>
                <?= $this->Form->control('escola_tipos_anos.'.$medio->id.'.ano_id', ['type' => 'checkbox','onclick' => 'return false',  'readonly','value' => $medio->id, 'hiddenField' => false, 'class' => 'me-3 opt_med', 'label' => $medio->nm_ano]) ?>
                <?= $this->Form->control('escola_tipos_anos.'.$medio->id.'.tipo_id', ['type' => 'hidden', 'value' => $medio->tipo_id]) ?>
            <?php endforeach; ?>

        </div>

    </div>

    <div class="d-flex justify-content-around mt-4">
        <button class="btn btn-warning mt-2 mb-2 px-4" onclick="history.back()">
            <i class="bi bi-arrow-return-left text-white"></i>
        </button>
        <button class="btn btn-success mt-2 mb-2 px-4" type="submit"><i class="bi bi-save"></i> </button>
    </div>
    <?= $this->Form->end() ?>
</div>
</div>
<script>
    $(document).ready(function() {
        // $("div input")
    })
</script>