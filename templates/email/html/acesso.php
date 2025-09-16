<table style="border: 1px #d9d9d9 solid; border-radius: 10px; width:30%; margin: auto; padding: 15px; text-align: center;">
  <thead>
    <tr>
      <td style="background-color: #363636; padding: 5px; color:#fff; text-align: center;">Envio de Código de Acesso</td>
    </tr>
    <tr>
      <td style="background-color: #525252; padding: 5px; color:#fff; text-align: center;">Administração</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td style="text-align:center;">
      <?php if(isset($assunto) && $assunto !== 'edicao') {?>
        <?= '<p> Olá ' . $userFind->nm_responsavel . '</p>' .
          '<p style="padding-bottom: 5px"> Segue seu código de Acesso para o sistema de Bolsas </p>';
        echo '<p>
        <span style="background-color: #00b359; padding: 15px; border-radius: 5px; color: #ffffff">'. $userFind->cd_verificacao .'</span>';
        '</p>';
        ?>
        <?php } else {?>
          <?= '<p> Olá ' . $userFind->nm_responsavel . '</p>' .
          '<p style="padding-bottom: 5px"> Segue seu código de Acesso para o sistema de Bolsas </p>';
        echo '<p>
        <span style="background-color: #00b359; padding: 15px; border-radius: 5px; color: #ffffff">'. $userFind->cd_verificacao .'</span>';
        '</p>';
        ?>
       <?php } ?>
      </td>

    </tr>

  </tbody>
</table>