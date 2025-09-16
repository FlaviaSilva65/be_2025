<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
  public function initialize(array $config): void
  {
    parent::initialize($config);

    $this->setTable('users');
    $this->addBehavior('Timestamp');
    $this->setPrimaryKey('id');

    $this->belongsTo('Grupos', [
      'foreign_key' => 'grupos_id',
    ]);

    $this->hasOne('Restores', [
      'foreignkey' => 'user_id',
  ]);
  }

  public function validationDefault(Validator $validator): Validator
  {

    $validator
      ->requirePresence('username')
      ->notEmptyString('username', 'Informação necessária.')
      ->minLength('username', 4, 'Usuário deve ter minimo de 4 caracteres')
      ->requirePresence('password', 'create','Informação necessária.')
      ->notEmptyString('password', 'Informação necessária.')
      ->requirePresence('email')
      ->notEmptyString('email', 'Informação necessária.')
      ->requirePresence('nm_user')
      ->notEmptyString('nm_user', 'Informação necessária.')
      ->requirePresence('active')
      ->notEmptyString('active', 'Informação necessária.')
      ->requirePresence('grupos_id')
      ->notEmptyString('grupos_id', 'Informação necessária.')
      ->requirePresence('sistema')
      ->notEmptyString('sistema', 'Informação necessária.');

    return $validator;
  }
}
