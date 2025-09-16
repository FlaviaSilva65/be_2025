<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class AnexosTable extends Table
{
  public function initialize(array $config): void
  {
    parent::initialize($config);
    $this->addBehavior('Timestamp');

    $this->belongsTo('TpAnexos', [
      'foreign_key' => 'tp_anexo_id',
    ]);
  }
}