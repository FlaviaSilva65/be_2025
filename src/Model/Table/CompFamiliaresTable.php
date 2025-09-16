<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompFamiliares Model
 *
 * @property \App\Model\Table\ResponsavelsTable&\Cake\ORM\Association\BelongsTo $Responsavels
 *
 * @method \App\Model\Entity\CompFamiliare newEmptyEntity()
 * @method \App\Model\Entity\CompFamiliare newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CompFamiliare> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompFamiliare get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CompFamiliare findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CompFamiliare patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CompFamiliare> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompFamiliare|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CompFamiliare saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CompFamiliare>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CompFamiliare>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CompFamiliare>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CompFamiliare> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CompFamiliare>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CompFamiliare>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CompFamiliare>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CompFamiliare> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompFamiliaresTable extends Table
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

        $this->setTable('comp_familiares');
        $this->setDisplayField('nm_comp_fam');
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
            ->scalar('nm_comp_fam')
            ->maxLength('nm_comp_fam', 100)
            ->requirePresence('nm_comp_fam', 'create')
            ->notEmptyString('nm_comp_fam');

        $validator
            ->scalar('nm_parentesco')
            ->maxLength('nm_parentesco', 15)
            ->requirePresence('nm_parentesco', 'create')
            ->notEmptyString('nm_parentesco');

        $validator
            ->scalar('nm_profis_comp_fam')
            ->maxLength('nm_profis_comp_fam', 30)
            ->requirePresence('nm_profis_comp_fam', 'create')
            ->notEmptyString('nm_profis_comp_fam');

        $validator
            ->scalar('nm_end_trab')
            ->maxLength('nm_end_trab', 100)
            ->allowEmptyString('nm_end_trab');

        $validator
            ->scalar('vl_renda')
            ->allowEmptyString('vl_renda');

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
