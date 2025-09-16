<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class ResponsavelsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->setTable('responsavels');
        $this->setDisplayField('nm_responsavel');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');



        /** DESCOMENTAR DE ACORDO FOR CRESCENDO O CÓDIGO  */

        $this->hasMany('Candidatos', [
            'foreignKey' => 'responsavel_id',
        ]);
        // $this->hasMany('Inscricoes', [
        //     'foreignKey' => 'responsavel_id',
        // ]);
        // $this->hasMany('MovimentoCadastros', [
        //     'foreignKey' => 'responsavel_id',
        // ]);
        $this->belongsTo('Escolas', [
            'foreignKey' => 'escola_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CompFamiliares', [
            'foreignKey' => 'responsavel_id',
        ]);
        $this->hasMany('BemImoveis', [
            'foreignKey' => 'responsavel_id',
        ]);
        $this->hasMany('BemMoveis', [
            'foreignKey' => 'responsavel_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator = new Validator();

        $ns = 'Campo necessário.';

        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->requirePresence('nm_responsavel', 'create')
            ->scalar('nm_responsavel')
            ->maxLength('nm_responsavel', 255)
            ->notEmptyString('nm_responsavel', $ns)
            ->add('nm_responsavel', [
                'minLength' => [
                    'rule' => ['minLength', 8],
                    'message' => 'Nome e Sobrenome.'
                ]

            ]);

        $validator
            ->requirePresence('dt_nascimento', 'create')
            ->notEmptyString('dt_nascimento', $ns);

        $validator
            ->scalar('vl_cpf')
            ->maxLength('vl_cpf', 14)
            ->notEmptyString('vl_cpf', $ns)
            ->add('vl_cpf', [
                'minLength' => [
                    'rule' => ['minLength', 14],
                    'message' => 'Digite apenas números.'
                ],
                'unique' => [
                    'rule' => 'validateUnique',
                    'message' => 'Este CPF já está cadastrado.',
                    'provider' => 'table'
                ]
            ]);

        $validator
            ->add('vl_rg_resp', [
                'maxLength' => [
                    'rule' => ['maxLength', 12],
                ]
            ])
            ->allowEmptyString('vl_rg_resp');

        $validator
            ->scalar('nm_email')
            ->maxLength('nm_email', 150)
            ->notEmptyString('nm_email', $ns);

        $validator
            ->scalar('vl_titulo')
            ->maxLength('vl_titulo', 14)
            ->notEmptyString('vl_titulo', $ns)
            ->add('vl_titulo', [
                'minLength' => [
                    'rule' => ['minLength', 12],
                    'message' => 'Digite a inscrição. Mín.12 caracteres.'
                ]
            ]);

        $validator
            ->scalar('vl_zona')
            ->maxLength('vl_zona', 10)
            ->notEmptyString('vl_zona', $ns)
            ->add('vl_zona', [
                'minLength' => [
                    'rule' => ['minLength', 3],
                    'message' => 'Digite apenas a zona.'
                ]
            ]);

        $validator
            ->scalar('vl_secao')
            ->maxLength('vl_secao', 4)
            ->notEmptyString('vl_secao', $ns)
            ->add('vl_secao', [
                'minLength' => [
                    'rule' => ['minLength', 1],
                    'message' => 'Digite apenas a seção.'
                ]
            ]);

        $validator
            ->scalar('cd_telefone')
            ->maxLength('cd_telefone', 50)
            ->allowEmptyString('cd_telefone');

        $validator
            ->scalar('cd_cel')
            ->maxLength('cd_cel', 15)
            ->allowEmptyString('cd_cel');


        return $validator;
    }

    public function buildRules($rules): RulesChecker
    {
        $rules->add($rules->isUnique(['vl_cpf']));

        return $rules;
    }
}
