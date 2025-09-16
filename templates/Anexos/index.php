<h1>Anexos</h1>

<?php foreach ($anexos as $anexo): ?>

  <?= $this->Html->link($anexo->nm_anexo .'- Candidato -'. $anexo->candidato_id .' Inscricao -'. $anexo->inscricao_id ,['action' => 'montarpdf',$anexo->id, 'escape' => false]); ?>
  <?php $this->Html->image('/img/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo, ['plugin' => false]) ?>
  <br/>

  <?php endforeach; ?>