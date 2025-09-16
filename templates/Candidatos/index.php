<!-- SEDUC DPID - FLAVIA A S SILVA RF:47093 em 13/02/2025 -->

<div class="hr_home bg-vermelho"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0"> Candidatos</h3>
</div>
<div class="hr_home bg-vermelho"></div>

<div class="container mb-4">
    <div class="row mt-5">
        <div class="col-1">
            <h5>Inscrição</h5>
        </div>
        <div class="col-3">
            <h5>Candidato</h5>
        </div>
        <div class="col-3">
            <h5>Filiação 1</h5>
        </div>
        <div class="col-3">
            <h5>Filiação 2</h5>
        </div>
        <div class="col-2 text-center">
            <h5>Ações</h5>
        </div>
    </div>

    <?php foreach ($candidatos as $candidato) : ?>
        <div class="row">
            <div class="col-1 text-start mt-2">
                <?= $candidato->inscricoes[0]->inscricao_id ?>
            </div>
            <div class="col-3 text-start mt-2">
                <?= strtoupper($candidato->nm_candidato); ?>
            </div>
            <div class="col-3 text-start mt-2">
                <?= $candidato->nm_filiacao1; ?>
            </div>
            <div class="col-3 text-start mt-2">
                <?= $candidato->nm_filiacao2; ?>
            </div>

            <div class="col-2 text-center mt-2">
                <?= $this->Html->link('<i class="bi bi-eye" ></i>', ['action' => 'arquivospdf', $candidato->id], ['class' => 'btn btn-sm btn-info text-white px-4', 'escape' => false]) ?>

            </div>
        </div>

    <?php endforeach; ?>

</div>