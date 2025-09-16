<table style="border: 1px #d9d9d9 solid; border-radius: 10px; width:30%; margin: auto; padding: 15px; text-align: center;">
  <thead>
    <tr>
      <td style="background-color: #363636; padding: 5px; color:#fff; text-align: center;">Novo acesso no Cadastro</td>
    </tr>
    <tr>
      <td style="background-color: #525252; padding: 5px; color:#fff; text-align: center;">Administração</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align:center;">
      <?php if(isset($assunto) && $assunto == 'edicao') {?>
        <?= '<p> Olá ' . $userFind->nm_responsavel . '</p>' .
          '<p style="padding-bottom: 5px"> Houve acesso no seu cadastro no sistema de Bolsas,<br> caso não tenha sido você entre em contato com a Administração. </p>';
        ?>
          <?php } ?>
      </td>
    </tr>

  </tbody>
</table>