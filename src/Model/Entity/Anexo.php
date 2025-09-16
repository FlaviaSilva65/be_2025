<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Anexo extends Entity
{
  protected array $_accessible = [
    'tp_anexo_id' => true,
        'cd_anexo_verificador' => true,
        // 'tp_documento' => true,
        'candidato_id' => true,
        'inscricao_id' => true,
        'created' => true,
        'modified' => true,
        'candidato' => true,
        'inscrico' => true,
  ];
}


