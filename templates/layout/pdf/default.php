<h1>Anexos pdf</h1>

<?php // foreach ($anexos as $anexo): 
?>

<?php // $this->Html->link($anexo->nm_anexo .'- Candidato -'. $anexo->candidato_id .' Inscricao -'. $anexo->inscricao_id ,['action' => 'montar_pdf',$anexo->inscricao_id, 'escape' => false]); 
?>

<?= $this->Html->image('/img/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo)  ?>

<?php // $this->Html->image($anexo->inscricao_id. '/' .$anexo->cd_anexo_verificador. '&' .$anexo->nm_anexo, ['fullBase' => true]); ?>

<!-- <img src="http://localhost/cake_nv/img/Inscricoes/4/contadeluz.jpeg" style="height: 100px"> -->

<img src='http://localhost/cake_nv/img/Inscricoes/4/77965b37d0e04733ae174a3361c21a0v&contadeluz.jpeg' style='width: 150px; height: 150px;'>


