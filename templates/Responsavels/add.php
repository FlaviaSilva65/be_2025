<!-- SEDUC DPID - FLAVIA A S SILVA RF:47093 em 27/05/2024 -->

<?= $this->Form->create($responsavel, ['url' => ['id' => 'formadd']]); ?>
<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
    <h3 class="text-center mt-0 fw-bold"> Ficha de Inscrição - Dados do Responsável</h3>
</div>
<div class="hr_home bg-vermelho"></div>

<div class="row gx-0 justify-content-center">

    <?php if (!$responsavel->isNew()) { ?>

        <div class="col-8 col-sm-8 col-md-2 input text">

            <?= $this->Form->hidden('id', ['value' => $responsavel->id]); ?>
            <?= $this->Form->control('vl_cpf', ['id' => 'cpf', 'class' => 'cpf', 'label' => 'CPF', 'minlength' => '14', 'value' => $responsavel->vl_cpf]); ?>

            <?= $this->Form->control('dt_nascimento', ['type' => 'date', 'label' => 'Dt. Nascimento', 'id' => 'nasc', 'value' => $responsavel->dt_nascimento ?? '']); ?>

            <p class="mt-4"><b>Insira o Código Verificador</b></p>
            <?= $this->Form->control('cd_verificacao', ['id' => 'cdverif', 'onchange' => 'verificacod(this)', 'value' => '',  'label' => 'Código Verificador']) ?>
            
        </div>

        <div class="col-11 d-md-flex">

        </div>

        <div class="col-8 col-sm-8 col-md-2 d-flex justify-content-around">
            <button type="button" onclick="voltar_pagina();" class="btn btn-sm btn-warning mr-5" style="height: 2.1em; margin-top:2.2em; color: white;"><i class="fas fa-reply" style="padding-right: 5px"></i>Voltar</button>
            <button class="btn btn-sm btn-success float-right ml-5 btn_adv" id="validar" style="height: 2.1em; margin-top:2.2em;" type="submit"><i class="fas fa-check" style="padding-right: 5px"></i>Avançar</button>
        </div>


    <?php } else { ?>

        <div class="col-8 col-sm-8 col-md-2 input text">

            <?php echo $this->Form->control('vl_cpf', ['id' => 'cpf', 'class' => 'cpf', 'onfocusout' => "return valida_cpf(this.value)", 'label' => 'CPF', 'required', 'minlength' => '14', 'value' => $this->request->getSession()->read('dado_resp') ? $this->request->getSession()->read('dado_resp.cpf') : '']); ?>
            <h6 id="errocpf" style="display: none; color: red; font-size: 90%;">x CPF Inválido</h6>

            <?= $this->Form->control('dt_nascimento', ['type' => 'date', 'label' => 'Dt. Nascimento', 'id' => 'nasc']); ?>

        </div>
        <div class="col-11 d-md-flex">

        </div>

        <div class="col-8 col-sm-8 col-md-6 d-flex justify-content-center">
            <button type="button" onclick="voltar_pagina();" class="btn btn-sm btn-warning me-5" style="height: 2.1em; margin-top:2.2em; color: white;"><i class="fas fa-reply" style="padding-right: 5px"></i>Voltar</button>
            <button class="btn btn-sm btn-success float-right ms-5" style="height: 2.1em; margin-top:2.2em;" type="submit" onclick="return valida_cpf(document.getElementById('cpf').value)" name="ok" value="Verificar"><i class="fas fa-check" style="padding-right: 5px"></i>Avançar</button>
            <!-- <button class="btn btn-info float-right ml-5" style="height: 2.1em; margin-top:2.2em;" type="button" onclick="return verCadResp();" id="validar" name="ok" value="Verificar"><i class="fas fa-check" style="padding-right: 5px"></i>Avançar</button> -->
        </div>

    <?php } ?>

</div>

<?php echo $this->form->end(); ?>



<div class="modal" id="alertaVoltar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
        <div class="modal-content w-50 p-3 justify-content-center">

            <div class="modal-body">
                <p class="alert alert-danger text-justify"><b>Atenção:</b> Você deseja mesmo sair da página? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnNoBack">NÃO</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" id="btnYesBack">SIM</button>

                <input id="urlvoltar" value="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home']) ?>" class="d-none">
            </div>
        </div>
    </div>
</div>
<div>
    <input id="urlresp" value="<?= $this->Url->build(['controller' => 'Responsavels', 'action' => 'veresp']) ?>" class="d-none">
</div>
<script>
    function voltar_pagina() {
        var urlLinkVoltar = document.getElementById("urlvoltar").value;

        $('#alertaVoltar').modal('show');

        $("#btnYesBack").click(function() {
            window.location.href = urlLinkVoltar;
        })

    }

  
    // function verificacod(input) {
    //     const cod = input.value;
    //     const cod_ver = "<?php echo $responsavel->cd_verificacao; ?>";

    //     if(cod.length == 6 && cod == cod_ver){

    //         // alert ('igual');
    //         document.getElementById("validar").disabled = false;
    //         document.getElementById("errocod").style.display = "none";

    //     } else if ((cod.length == 6 ) && cod != cod_ver){

    //         document.getElementById("errocod").style.display = "block";
    //     }

    //     // alert (cod);
    //     // alert (cod_ver);
    // }
</script>