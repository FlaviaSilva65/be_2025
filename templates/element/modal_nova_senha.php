<?= $this->Html->css('page_home') ?>
<div class="modal fade" id="modalNovaSenhaxxx" tabindex="-1" aria-hidden="true">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'esqueciSenha']]) ?>
    <div class="modal-dialog modal-dialog-centered justify-content-center">
        <div class="col-12 col-sm-8 col-lg-4 p-0 bg-white shadow modal-content">
            <div class="d-flex text-center py-2">
                <h6 class="w-100 font-weight-bold text-dark ml-3"><i class="fas fa-id-card mr-2"></i>TROCAR SENHA</h6>
                <button type="button" class="btn btn-primary btn-sm py-0 me-2" data-bs-dismiss="modal" title="Fechar"><i class="bi bi-x"></i></button>
            </div>
            <div class="px-3">
                <?=
                    $this->Form->control('email', ['label' => '<i class="fas fa-envelope mr-1"></i>E-mail', 'maxlength' => 40, 'escape' => false, 'autocomplete' => 'off'])
                        
                ?>
            </div>
            <div class="d-flex justify-content-end p-2 mt-3">
                <?= $this->Html->image('cps.png', ['id' => 'cps']) ?>
                <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="bi bi-box-arrow-right mr-2"></i>Enviar</button>
                
            </div>
        </div>
    </div>
    
    <?= $this->Form->end() ?>
</div>

<div class="modal fade" id="modalNovaSenha" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Show a second modal and hide this one with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Open second modal</button>
            </div>
        </div>
    </div>
</div>