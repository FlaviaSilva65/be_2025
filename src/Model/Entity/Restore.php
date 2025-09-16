<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Restore extends Entity
{
  protected array $_accessible = [
    'user_id' => true,
    'new_pass' => true,
    'active' => true,
    'created' => true,
    'modified' => true,
    'user' => true,
  ];
}
