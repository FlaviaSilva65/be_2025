<div class="hr_home bg-vermelho"></div>
<div class="col-12 bannerprincipal">
  <h1 class="text-center mt-0"> USUÁRIOS</h1>
</div>
<div class="hr_home bg-vermelho"></div>
<div class="col d-flex justify-content-center mt-3">
  <?= $this->Html->link('<i class="bi bi-person-plus-fill"></i>', ['action' => 'add'], ['class' => 'btn btn-sm btn-success text-white  ml-4 px-4', 'escape' => false]) ?>
</div>

<div class="container mb-4">
  <div class="row mt-5">
    <div class="col-2">
      <h5>Nome</h5>
    </div>
    <div class="col-2">
      <h5>Login</h5>
    </div>
    <div class="col-2">
      <h5>E-mail</h5>
    </div>
    <div class="col-1 text-center">
      <h5>Ativo</h5>
    </div>
    <div class="col-1 text-center">
      <h5>Grupo</h5>
    </div>
    <div class="col-4 text-center">
      <h5>Ações</h5>
    </div>
  </div>

  <?php foreach ($users as $user) : ?>
    <div class="row">
      <div class="col-2">
        <?= $user->nm_user ?>
      </div>
      <div class="col-2">
        <?= $user->username ?>
      </div>
      <div class="col-2" style="max-width: 240px; white-space: nowrap;overflow:hidden;text-overflow: ellipsis;">
        <?= $user->email ?>
      </div>
      <div class="col-1 text-center">
        <?= $user->active ?>
      </div>
      <div class="col-1 text-center">
        <?= $user->grupos_id ?>
      </div>
      <div class="col-4 text-center mt-2">
        <?= $this->Html->link('<i class="bi bi-eye"></i>', ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-info text-white px-4', 'escape' => false]) ?>
        <?= $this->Html->link('<i class="bi bi-pencil-square"></i>', ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-primary text-white px-4', 'escape' => false]) ?>
        <?= $this->Form->postLink('<i class="bi bi-trash3"></i>', ['action' => 'delete', $user->id], ['confirm' => 'Tem certeza?', 'class' => 'btn btn-sm btn-danger text-white px-4', 'escape' => false]) ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>