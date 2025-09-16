<!-- SEDUC DPID - Flavia Silva 47093 em 12/08/2022 -->
<?php // $this->layout = false 

debug($tipos);
?>

<option value=""><?= '---' ?></option>
<?php foreach ($tipos as $id => $tipo) : ?>
    <option value="<?= $id ?>"><?= $tipo ?></option>
<?php endforeach; ?>