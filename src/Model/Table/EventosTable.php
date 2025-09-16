<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @property \App\Model\Table\TpEventosTable&\Cake\ORM\Association\BelongsTo $TpEventos
 * @property \App\Model\Table\InscricoesTable&\Cake\ORM\Association\HasMany $Inscricoes
 *
 * @method \App\Model\Entity\Evento newEmptyEntity()
 * @method \App\Model\Entity\Evento newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Evento> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evento get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Evento findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Evento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Evento> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evento|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Evento saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventosTable extends Table
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

        $this->setTable('eventos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TpEventos', [
            'foreignKey' => 'tp_eventos_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Inscricoes', [
            'foreignKey' => 'evento_id',
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
            ->integer('tp_eventos_id')
            ->notEmptyString('tp_eventos_id');

        $validator
            ->scalar('ano_evento')
            ->maxLength('ano_evento', 4)
            ->requirePresence('ano_evento', 'create')
            ->notEmptyString('ano_evento');

        $validator
            ->date('dt_inicio')
            ->requirePresence('dt_inicio', 'create')
            ->notEmptyDate('dt_inicio');

        $validator
            ->date('dt_fim')
            ->requirePresence('dt_fim', 'create')
            ->notEmptyDate('dt_fim');

        $validator
            ->integer('ic_ativo')
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
        $rules->add($rules->existsIn('tp_eventos_id', 'TpEventos'), ['errorField' => 'tp_eventos_id']);

        return $rules;
    }

    public function getEventoAtual(): ?\App\Model\Entity\Evento
    {
        $hoje = new \DateTime();

        return $this->find()
            ->where([
                'dt_inicio <=' => $hoje,
                'dt_fim >=' => $hoje,
            ])
            ->orderBy(['dt_inicio' => 'ASC'])
            ->first();
    }
}
