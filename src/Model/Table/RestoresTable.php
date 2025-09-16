<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class RestoresTable extends Table
{
  public function initialize(array $config): void
  {
    parent::initialize($config);

    $this->setTable('restores');
    $this->setDisplayField('id');
    $this->setPrimaryKey('id');

    $this->addBehavior('Timestamp');

    $this->belongsTo('Users', [
      'foreignKey' => 'user_id',

    ]);
  }
}
