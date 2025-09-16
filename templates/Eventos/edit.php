<?= $this->Form->create($evento); ?>
<div class="hr_home bg-vermelho"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0"> Edição do Evento </h3>
</div>
<div class="hr_home bg-vermelho"></div>

<div class="row d-flex justify-content-center">
    <div class="col-12 mx-2 mt-3 d-flex justify-content-center">
        <h4><?= $evento->tp_evento->nm_tp_evento ?> (<?= $evento->ic_ativo == 1 ? 'Ativo' : 'Inativo' ?>)</h4>
    </div>
    <div class="col-8 my-5 d-flex justify-content-center">
        <div class="col-md-3 mx-2 mt-3">
            <?= $this->Form->control('tp_eventos_id', ['options' => $tp_eventos, 'label' => 'Evento']); ?>
        </div>
        <div class="col-md-3 mx-2 mt-3">
            <?= $this->Form->control('dt_inicio', ['label' => 'Inicio']); ?>
        </div>
        <div class="col-md-3 mx-2 mt-3">
            <?= $this->Form->control('dt_fim', ['label' => 'Fim']); ?>
        </div>
        <div class="col-md-3 mx-2 mt-3">
            <?= $this->Form->control('ic_ativo', ['options' => ['0' => 'Inativar', '1' => 'Ativar'], 'label' => 'Status']); ?>
        </div>
        <div class="col-md-3 mx-2 mt-3">
            <button class="btn btn-success mt-4 ml-4 px-4" type="submit"><i class="bi bi-save"></i> </button>
        </div>

    </div>
    <div class="d-flex justify-content-center  mt-4">
        <button class="btn btn-warning px-4" onclick="history.back()" type="button">
            <i class="bi bi-arrow-return-left text-white"></i>
        </button>
    </div>

</div>

<?= $this->Form->end(); ?>