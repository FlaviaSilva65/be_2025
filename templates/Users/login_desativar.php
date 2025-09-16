<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
  <h1 class="text-center mt-0"> USUÁRIOS</h1>
</div>
<div class="hr_home bg-vermelho"></div>
<div class="container mb-4 d-flex justify-content-center">
  <div class="col-md-2 my-5">
    <?= $this->Form->create(); ?>
    <fieldset>
      <h5><?= 'Digite usuário e senha' ?></h5>
      <?= $this->Form->control('username', ['label' => 'Usuário','placeholder' => 'Digite usuário']) ?>
      <?= $this->Form->control('password', ['label' => 'Senha' ,'placeholder' => 'Digite a senha']) ?>
    </fieldset>
    <div class="d-flex justify-content-center ">
      <button class="btn btn-sm btn-primary text-white my-4 px-4" type="submit"><i class="bi bi-check"></i> Acessar</button>
    </div>
    <?= $this->Form->end() ?>
  </div>

</div>

<?= $this->Element('modal_login') ?>