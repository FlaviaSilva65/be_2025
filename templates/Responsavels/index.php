<?= $this->Flash->render() ?>
<div class="hr_home bg-vermelho"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0"> RESPONSÁVEL</h3>
</div>
<div class="hr_home bg-vermelho"></div>

<div class="row d-flex justify-content-center">
    <div class="col-10 d-flex justify-content-center">
        <div class="col-8 pr-0 ">
            <h6 class="mt-4"><i class="fas fa-search"></i> Pesquisa <span style="font-size:70%;color:#989898;">( Nome )</span></h6>
            <input id="nomeList" class="campo_nome p80 rounded w-100 mb-3" onchange='getId()' value="" onblur="pesquisaCandidato()" list="pesquisa" name="nm_candidato" class="form-control" placeholder="" onload="clear()" required autocomplete="off">
            <datalist id="pesquisa"></datalist>
        </div>
    </div>
    <div class="col-10 w-100" id="tableAjax">
        <?php // $this->Element('responsavelIndex') 
        ?>

        <div class="row justify-content-center">
            <div class="col-sm-12 col-lg-3 mb-2">
                <h5 class="mb-0">Nome: &nbsp;</h5>
            </div>
            <div class="col-sm-12 col-lg-3 row">
                <div class="col-lg-6">
                    <h6 class="mb-0 mr-4">Data Nasc.: </h6>
                </div>
                <div class="col-lg-6">
                    <h6 class="mb-0 mr-4">CPF: &nbsp;</h6>
                </div>
            </div>

            <div class="col-sm-12 col-lg-2">
                <h5 class="mb-0">Celular: &nbsp;</h5>
            </div>
            <div class="col-sm-12 col-lg-4">
                <h5 class="mb-0">E-mail: &nbsp;</h5>
            </div>
            <?php foreach ($responsavels as $responsavel) : ?>
                <div class="col-sm-12 col-lg-3 mb-2">
                    <?= $this->Html->link($responsavel->nm_responsavel, ['action' => 'manter_add', $responsavel->id, 'adm']); ?>
                </div>
                <div class="col-sm-12 col-lg-3 row">
                    <div class="col-lg-6">
                        <?= $responsavel->dt_nascimento; ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $responsavel->vl_cpf; ?>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <?= $responsavel->cd_cel; ?>
                </div>
                <div class="col-sm-12 col-lg-4 row">
                    <div class="col-lg-8">
                        <?= $responsavel->nm_email; ?>
                    </div>
                    <div class="col-lg-4">
                        <?= ($responsavel->nm_email ?  $this->Html->link('<i class="far fa-envelope"></i> Enviar', ['action' => 'enviar_email', $responsavel->id], ['class' => 'btn btn-warning btn-sm mx-1 mb-1 px-3', 'style' => 'color: #ffffff;  width: 100px; height:30px;', 'escape' => false]) : '') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>

<!-- <input id="urlano" value="<?= $this->Url->build(['controller' => 'Candidatos', 'action' => 'opcoesBuscaAno']) ?>" class="d-none"> -->

</div>