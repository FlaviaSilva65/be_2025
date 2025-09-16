<?php 
declare(strict_types=1);

namespace App\Model\Entity;

use cake\ORM\Entity;

class Grupo extends Entity
{
  protected array $_accessible = [
    'nm_permissao' => true,
  ];
}