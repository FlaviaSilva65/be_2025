<?= $this->Html->css('page_home') ?>
<div class="modal fade" id="modalLogin" tabindex="-1" aria-hidden="true">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login']]) ?>
    <div class="modal-dialog modal-dialog-centered justify-content-center">
        <div class="col-12 col-sm-8 col-lg-4 p-0 bg-white shadow modal-content">
            <div class="d-flex text-center py-2">
                <h6 class="w-100 font-weight-bold text-dark ml-3"><i
                        class="bi bi-person-vcard-fill mr-2"></i>IDENTIFICAÇÃO
                </h6>
                <button type="button" class="btn btn-primary btn-sm py-0 me-2" data-bs-dismiss="modal" title="Fechar">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <div class="px-3">
                <?=
                    $this->Form->control('username', ['label' => '<i class="bi bi-person-fill me-1"></i>Usuário', 'maxlength' => 40, 'escape' => false, 'autocomplete' => 'off']) .
                    '<div class="mostra_pass_eye">' .
                    $this->Form->control('password', ['label' => '<i class="bi bi-key-fill me-1"></i>Senha','id' => 'pass', 'maxlength' => 40, 'escape' => false]) .
                    '<i class="bi bi-eye-slash mostra_pass my-auto" onclick="mostra_pass(\'password\',this)"></i>' .
                    '<button type="button" class="btn btn-sm py-0 mr-2" data-dismiss="modal">                      
                        <p href="" data-bs-toggle="modal" data-bs-target="#modalNovaSenha" title="Esqueci a senha" class="text-danger"> Esqueci a senha</p>
                        </button>' .
                    '</div>'
                    ?>

            </div>
            <div class="d-flex justify-content-end p-2 mt-3">
                <?= $this->Html->image('cps.png', ['id' => 'cps']) ?>
                <button type="submit" class="btn btn-primary btn-sm ml-2">
                    <i class="bi bi-box-arrow-right mr-2"></i>Acessar
                </button>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

<div class="modal fade" id="modalNovaSenha" aria-hidden="true" aria-labelledby="modalNovaSenhaLabel" tabindex="-1">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'redefinir']]) ?>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title w-100 font-weight-bold text-dark ml-3" id="modalNovaSenhaLabel">
                    <i class="bi bi-person-vcard-fill mr-2"></i> TROCAR SENHA
                </h6>
                <button type="button" class="btn btn-primary btn-sm py-0 me-2" data-bs-dismiss="modal" title="Fechar">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="px-3">
                    <?= $this->Form->control('email', ['label' => '<i class="bi bi-envelope-open-fill"></i> E-mail', 'maxlength' => 40, 'escape' => false, 'autocomplete' => 'off']) ?>
                </div>
            </div>
            <div class="d-flex justify-content-end p-2 mt-3">
                <?= $this->Html->image('cps.png', ['id' => 'cps']) ?>
                <button type="submit" class="btn btn-primary btn-sm ml-2" data-bs-dismiss="modal">
                    <i class="bi bi-box-arrow-right mr-2"></i> Enviar</button>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>

    let pass = document.getElementById('pass');

    let icon = document.getElementsByClassName('mostra_pass');

    function mostra_pass(el, obj) {
        // console.log(obj.className);

        if (pass.type == 'password') {
            pass.type = 'text';
            obj.className = 'bi bi-eye-fill mostra_pass my-auto'
            obj.style.color = 'green';
            // icon.style.color = "red";
        } else {
            pass.type = 'password';
            obj.className = 'bi bi-eye-slash mostra_pass my-auto'
            obj.style.color = '#7e7e7e'
        }

    }

</script>