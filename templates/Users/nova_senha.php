<div class="hr_home bg-vermelho mt-4"></div>
<div class="col-12 bannerprincipal">
  <h1 class="text-center mt-0"> USUÁRIOS</h1>
</div>
<div class="hr_home bg-vermelho"></div>
<div class="container mb-4 d-flex justify-content-center">
  <div class="col-md-6 my-5">
    <?= $this->Form->create();
    echo $this->Form->control('password', ['label' => 'Senha', 'value' => '']);
    echo $this->Form->control('confirm_password', ['label' => 'Repita a Senha','type' => 'password', 'autocomplete' => 'off']); 
    ?>
    <div class="d-flex justify-content-around mt-4">
      <button class="btn btn-success mt-2 mb-2 ml-4 px-4" type="submit"><i class="bi bi-save"></i> </button>
    </div>
    <?= $this->Form->end() ?>
  </div>

</div>