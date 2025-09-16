<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BemMoveis Model
 *
 * @property \App\Model\Table\ResponsavelsTable&\Cake\ORM\Association\BelongsTo $Responsavels
 *
 * @method \App\Model\Entity\BemMovei newEmptyEntity()
 * @method \App\Model\Entity\BemMovei newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BemMovei> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BemMovei get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BemMovei findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BemMovei patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BemMovei> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BemMovei|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BemMovei saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BemMovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemMovei>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BemMovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemMovei> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BemMovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemMovei>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BemMovei>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BemMovei> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BemMoveisTable extends Table
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

        $this->setTable('bem_moveis');
        $this->setDisplayField('nm_modelo');
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
            ->scalar('nm_modelo')
            ->maxLength('nm_modelo', 40)
            ->requirePresence('nm_modelo', 'create')
            ->notEmptyString('nm_modelo');

        $validator
            ->scalar('nm_marca')
            ->maxLength('nm_marca', 40)
            ->requirePresence('nm_marca', 'create')
            ->notEmptyString('nm_marca');

        $validator
            ->integer('num_ano_veic')
            ->requirePresence('num_ano_veic', 'create')
            ->notEmptyString('num_ano_veic');

        $validator
            ->numeric('vl_veiculo')
            ->requirePresence('vl_veiculo', 'create')
            ->notEmptyString('vl_veiculo');

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
