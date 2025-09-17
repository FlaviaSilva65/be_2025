<div class="hr_home mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 mb-4 fw-bold align-items-center"> Candidatos</h3>
</div>
<div class="hr_home"></div>

<div class="container mb-4">
    <div class="row mt-5 py-0 d-flex align-items-center top-blue-bar text-white">
        <div class="col-3">
            <h5 class="my-0">Candidato</h5>
        </div>
        <div class="col-3">
            <h5 class="my-0">Filiação 1</h5>
        </div>
        <div class="col-3">
            <h5 class="my-0">Filiação 2</h5>
        </div>
        <div class="col-1">
            <h5 class="my-0">Situação </h5>
        </div>
        <div class="col-2 text-center">
            <h5 class="my-0">Ações</h5>
        </div>
    </div>

    <?php foreach ($candidatos as $candidato) : ?>
        <div class="row my-2" style="background-color: #dee2e6;">
            <?php //pr($candidato->inscricoes); 
            ?>
            <?php // pr($candidato['Incricoes']); 
            ?>
            <?php // foreach($candidato->inscricoes as $inscricao): 
            ?>

            <?php //  $incricao 
            ?>

            <?php //  endforeach;  
            ?>
            <?php // ($candidato['inscricoes']) 
            ?>
            <div class="col-3 text-start mt-2">
                <?= $candidato->nm_candidato; ?>
            </div>
            <div class="col-3 text-start mt-2">
                <?= $candidato->nm_filiacao1; ?>
            </div>
            <div class="col-3 text-start mt-2">
                <?= $candidato->nm_filiacao2; ?>
            </div>
            <div class="col-3 text-start mt-2">

                <?php if ($candidato->inscricoes[0]->ano == $eventoAtual->ano_evento) { ?>
                    <span>INSCRITO</span>
                <?php  } else { ?> 
                    <?= $this->Html->link('<i class="bi bi-eye" ></i>', ['action' => 'add', $candidato->id], ['class' => 'btn btn-sm btn-blue-35 text-white px-4', 'escape' => false]); ?>
                    <?php } ?>

            </div>
            <div class="col-2 text-center mt-2">
                <?php $this->Html->link('<i class="bi bi-eye" ></i>', ['action' => 'arquivospdf', $candidato->id], ['class' => 'btn btn-sm btn-info text-white px-4', 'escape' => false]) ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>