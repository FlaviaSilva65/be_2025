<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BemImoveis Model
 *
 * @property \App\Model\Table\ResponsavelsTable&\Cake\ORM\Association\BelongsTo $Responsavels
 *
 * @method \App\Model\Entity\BemImovei newEmptyEntity()
 * @method \App\Model\Entity\BemImovei newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BemImovei> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BemImovei get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BemImovei findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BemImovei patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BemImovei> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BemImovei|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BemImovei saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BemImovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemImovei>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BemImovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemImovei> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BemImovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemImovei>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BemImovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemImovei> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BemImoveisTable extends Table
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

        $this->setTable('bem_imoveis');
        $this->setDisplayField('nm_tipo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Responsavels', [
            'foreignKey' => 'responsavel_id',
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
            ->scalar('nm_tipo')
            ->maxLength('nm_tipo', 50)
            ->requirePresence('nm_tipo', 'create')
            ->notEmptyString('nm_tipo');

        $validator
            ->scalar('nm_end_imovel')
            ->maxLength('nm_end_imovel', 100)
            ->requirePresence('nm_end_imovel', 'create')
            ->notEmptyString('nm_end_imovel');

        $validator
            ->numeric('vl_imovel')
            ->requirePresence('vl_imovel', 'create')
            ->notEmptyString('vl_imovel');

        $validator
            ->integer('responsavel_id')
            ->notEmptyString('responsavel_id');

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
        $rules->add($rules->existsIn('responsavel_id', 'Responsavels'), ['errorField' => 'responsavel_id']);

        return $rules;
    }
}
