<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
  <h1 class="text-center mt-0"> USUÁRIOS</h1>
</div>
<div class="hr_home bg-vermelho"></div>
<div class="container d-flex justify-content-center">
  <div class="col-md-6 my-5">
    <?= $this->Form->create($user);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('nm_user', ['label' => 'Nome']);
    echo $this->Form->control('email', ['label' => 'E-mail']);
    echo $this->Form->control('username', ['label' => 'Usuário']);
    echo $this->Form->control('grupos_id', ['label' => 'Grupo de Usuário']);
    echo $this->Form->control('sistema', ['options' => $sistema,'label' => 'Sistema']);
    echo $this->Form->control('active', ['type' => 'checkbox', 'class' => 'me-3', 'label' => ['text' => 'Ativo']]);
    ?>
    <!-- O botão abaixo está redefinindo a senha 
   ver se não irá enviar e-mail salvando uma nova senha -->

    <div class="d-flex justify-content-around  mt-4">
      <button class="btn btn-warning ms-4 me-4 px-4" onclick="history.back()">
        <i class="bi bi-arrow-return-left text-white"></i>
      </button>
      <button class="btn btn-success ml-4 px-4" type="submit"><i class="bi bi-save"></i> </button>
    </div>
    <?= $this->Form->end() ?>
  </div>
</div>
<div class="row d-flex justify-content-center">
  <div class="col-md-6 d-flex justify-content-center mb-4">
    <?= $this->Form->postLink(
      '<i class="bi bi-recycle"></i> Redefinir Senha',
      ['controller' => 'Users', 'action' => 'redefinir', $user->id],
      ['escape' => false, 'confirm' => 'Tem certeza, vai redefinir a senha?', 'class' => 'btn btn-sm btn-danger text-white px-4']
    ) ?>

  </div>
</div>