<!-- SEDUC DPID - FLAVIA A S SILVA RF:47093 em 27/05/2024 -->

<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 mb-4 fw-bold align-items-center"> Escolas</h3>
</div>
<div class="hr_home bg-vermelho"></div>
<div class="col d-flex justify-content-center mt-3">
    <?= $this->Html->link('<i class="bi bi-building-fill-add fa-2x"></i>', ['action' => 'add'], ['class' => 'btn btn-sm btn-success text-white  ml-4 px-4', 'escape' => false]) ?>
</div>

<div class="row gx-0 justify-content-center">
    <div class="col-10">
        <?php foreach ($escolas as $escola) : ?>
            <div class="col-lg-8 d-flex">
                <div class="col-6 text-start mt-2">
                    <?= $escola->nm_escola; ?>
                </div>
                <?php //foreach ($escola->escola_tipos_anos as $tipo) : 
                ?>

                <?php // $tipo->tipo_id->nm_tipo; 
                ?>

                <?php //endforeach; 
                ?>
                <div class="col-6 text-start mt-2">
                    <?= $escola->tipos ?>

                </div>

                <div class="col-6 text-end mt-2">
                    <?= $this->Html->link('<i class="bi bi-eye" ></i>', ['action' => 'view', $escola->id], ['class' => 'btn btn-sm btn-info text-white px-4', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="bi bi-pencil-square"></i>', ['action' => 'edit', $escola->id], ['class' => 'btn btn-sm btn-primary text-white px-4', 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="bi bi-trash3"></i>', ['action' => 'delete', $escola->id], ['confirm' => 'Tem certeza?', 'class' => 'btn btn-sm btn-danger text-white px-4', 'escape' => false]) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>