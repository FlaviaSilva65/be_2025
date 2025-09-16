<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EscolaTiposAnos Model
 *
 * @property \App\Model\Table\EscolasTable&\Cake\ORM\Association\BelongsTo $Escolas
 * @property \App\Model\Table\AnosTable&\Cake\ORM\Association\BelongsTo $Anos
 * @property \App\Model\Table\TiposTable&\Cake\ORM\Association\BelongsTo $Tipos
 *
 * @method \App\Model\Entity\EscolaTiposAno newEmptyEntity()
 * @method \App\Model\Entity\EscolaTiposAno newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\EscolaTiposAno> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EscolaTiposAno get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\EscolaTiposAno findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\EscolaTiposAno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\EscolaTiposAno> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EscolaTiposAno|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\EscolaTiposAno saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaTiposAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaTiposAno>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaTiposAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaTiposAno> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaTiposAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaTiposAno>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaTiposAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaTiposAno> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EscolaTiposAnosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('escola_tipos_anos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Escolas', [
            'foreignKey' => 'escola_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Anos', [
            'foreignKey' => 'ano_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tipos', [
            'foreignKey' => 'tipo_id',
            // 'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('escola_id')
            ->notEmptyString('escola_id');

        // $validator
        //     ->isNew('id')
            // ->nonNegativeInteger('ano_id')
            // ->isEmptyAllowed('ano_id')
            // ->notEquals('ano_id', 0);
        // ->notEmptyString('ano_id');

        // $validator
        //     ->nonNegativeInteger('tipo_id')
        //     ->notEmptyString('tipo_id');

        // $validator
        //     ->notEmptyString('ic_ativo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('escola_id', 'Escolas'), ['errorField' => 'escola_id']);
        $rules->add($rules->existsIn('ano_id', 'Anos'), ['errorField' => 'ano_id']);
        $rules->add($rules->existsIn('tipo_id', 'Tipos'), ['errorField' => 'tipo_id']);

        return $rules;
    }

    // public function CreateOrEditEscolaTiposAnos($entity)
    // {
    //     $entity->ic_ativo = 1;

    //     return true;

    // }
}
