<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EscolaAnos Model
 *
 * @property \App\Model\Table\EscolasTable&\Cake\ORM\Association\BelongsTo $Escolas
 * @property \App\Model\Table\AnosTable&\Cake\ORM\Association\BelongsTo $Anos
 *
 * @method \App\Model\Entity\EscolaAno newEmptyEntity()
 * @method \App\Model\Entity\EscolaAno newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\EscolaAno> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EscolaAno get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\EscolaAno findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\EscolaAno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\EscolaAno> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EscolaAno|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\EscolaAno saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaAno>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaAno> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaAno>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EscolaAno>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EscolaAno> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EscolaAnosTable extends Table
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

        $this->setTable('escola_anos');
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

        $validator
            ->integer('ano_id')
            ->notEmptyString('ano_id');

        $validator
            ->notEmptyString('ic_ativo');

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

        return $rules;
    }
}
