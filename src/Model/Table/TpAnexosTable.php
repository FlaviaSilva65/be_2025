<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TpAnexos Model
 *
 * @property \App\Model\Table\TpAnexosTable&\Cake\ORM\Association\BelongsTo $TpAnexos
 * @property \App\Model\Table\AnexosTable&\Cake\ORM\Association\HasMany $Anexos
 *
 * @method \App\Model\Entity\TpAnexo newEmptyEntity()
 * @method \App\Model\Entity\TpAnexo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TpAnexo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TpAnexo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TpAnexo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TpAnexo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TpAnexo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TpAnexo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TpAnexo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TpAnexo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpAnexo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TpAnexo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpAnexo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TpAnexo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpAnexo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TpAnexo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpAnexo> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TpAnexosTable extends Table
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

        $this->setTable('tp_anexos');
        $this->setDisplayField('nm_tp_anexo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TpAnexos', [
            'foreignKey' => 'tp_anexos_id',
        ]);
        $this->hasMany('Anexos', [
            'foreignKey' => 'tp_anexo_id',
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
            ->scalar('item')
            ->maxLength('item', 10)
            ->allowEmptyString('item');

        $validator
            ->scalar('nm_tp_anexo')
            ->maxLength('nm_tp_anexo', 100)
            ->requirePresence('nm_tp_anexo', 'create')
            ->notEmptyString('nm_tp_anexo');

        $validator
            ->scalar('ct_tp_anexo')
            ->maxLength('ct_tp_anexo', 50)
            ->requirePresence('ct_tp_anexo', 'create')
            ->notEmptyString('ct_tp_anexo');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->integer('tp_anexos_id')
            ->allowEmptyString('tp_anexos_id');

        $validator
            ->scalar('ordem')
            ->maxLength('ordem', 50)
            ->allowEmptyString('ordem');

        $validator
            ->requirePresence('ic_obrigatorio', 'create')
            ->notEmptyString('ic_obrigatorio');

        $validator
            ->requirePresence('tp_bolsa', 'create')
            ->notEmptyString('tp_bolsa');

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
        $rules->add($rules->existsIn('tp_anexos_id', 'TpAnexos'), ['errorField' => 'tp_anexos_id']);

        return $rules;
    }
}
