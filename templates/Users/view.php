<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
  <h1 class="text-center mt-0"> USUÁRIOS</h1>
</div>
<div class="hr_home bg-vermelho"></div>
<div class="container my-5 d-flex justify-content-center">
  <div class="col-lg-8">
    <table class="table">
      <tr>
        <th scope="row"><strong> Nome: </strong></th>
        <td>
          <?= $user->nm_user; ?>
        </td>
      </tr>
      <tr>
        <th scope="row"><strong> E-mail: </strong></th>
        <td>
          <?= $user->email; ?>
        </td>
      </tr>
      <tr>
        <th scope="row"><strong> Usuário: </strong></th>
        <td>
          <?= $user->username; ?>
        </td>
      </tr>
      
    </table>

  </div>
</div>

<div class="col-md-12 d-flex justify-content-center my-4">
  <button type="button" class="btn btn-warning px-4 me-5" onclick="history.back()">
    <i class="bi bi-arrow-return-left text-white"></i>
  </button>

  <?= $this->Html->link('<i class="bi bi-pencil-square"></i>', ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-primary text-white px-4', 'escape' => false]) ?>

</div>