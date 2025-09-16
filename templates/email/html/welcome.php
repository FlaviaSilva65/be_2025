<table style="border: 1px #d9d9d9 solid; border-radius: 10px; width:30%; margin: auto; padding: 15px; text-align: center;">
  <thead>
    <tr>
      <td style="background-color: #363636; padding: 5px; color:#fff; text-align: center;">Envio de Senha</td>
    </tr>
    <tr>
      <td style="background-color: #525252; padding: 5px; color:#fff; text-align: center;">Administração</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align:center;">
        <?= '<p> Olá ' . $userFind->nm_user . '</p>' .
          '<p style="padding-bottom: 5px"> Clique no botão abaixo para criar nova senha </p>';

        echo '<p> <a style="text-decoration: none" href="localhost/cake_nv/users/nova_senha/' . $userFind->id . '/' . $nova_senha . '">
        <span style="background-color: #00b359; padding: 15px; border-radius: 5px; color: #ffffff">Nova Senha</span>';
        '</a></p>';

        ?>
      </td>
    </tr>

  </tbody>
</table>