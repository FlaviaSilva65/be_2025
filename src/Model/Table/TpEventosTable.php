<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TpEventos Model
 *
 * @method \App\Model\Entity\TpEvento newEmptyEntity()
 * @method \App\Model\Entity\TpEvento newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TpEvento> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TpEvento get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TpEvento findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TpEvento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TpEvento> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TpEvento|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TpEvento saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TpEvento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpEvento>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TpEvento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpEvento> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TpEvento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpEvento>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TpEvento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TpEvento> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TpEventosTable extends Table
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

        $this->setTable('tp_eventos');
        $this->setDisplayField('nm_tp_evento');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Eventos');
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
            ->scalar('nm_tp_evento')
            ->maxLength('nm_tp_evento', 50)
            ->requirePresence('nm_tp_evento', 'create')
            ->notEmptyString('nm_tp_evento');

        return $validator;
    }
}
