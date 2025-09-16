<h1>Anexos - Teste 1</h1>

<h1>Ver PDF</h1>

<?= $this->Html->image('/img/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo);
 ?>

<img src="<?= '../../img/Inscricoes/' .$anexo->inscricao_id. '/' .$anexo->cd_anexo_verificador. '&' .$anexo->nm_anexo?>"  />


<br />

<?php //foreach ($anexos as $anexo): 
?>

<?php

/** 
 * 
 * $this->Html->link(
 * $anexo->nm_anexo .'- Candidato -'. 
 * $anexo->candidato_id .' Inscricao -'. 
 * $anexo->inscricao_id ,
 * ['action' => 'montar_pdf',$anexo->inscricao_id,
 *  'escape' => false]); */ ?>

<br />

<?php //endforeach; 
?>