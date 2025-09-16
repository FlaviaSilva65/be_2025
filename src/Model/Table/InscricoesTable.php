<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inscricoes Model
 *
 * @property \App\Model\Table\EventosTable&\Cake\ORM\Association\BelongsTo $Eventos
 * @property \App\Model\Table\CandidatosTable&\Cake\ORM\Association\BelongsTo $Candidatos
 * @property \App\Model\Table\ResponsavelsTable&\Cake\ORM\Association\BelongsTo $Responsavels
 *
 * @method \App\Model\Entity\Inscrico newEmptyEntity()
 * @method \App\Model\Entity\Inscrico newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Inscrico> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inscrico get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Inscrico findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Inscrico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Inscrico> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inscrico|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Inscrico saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InscricoesTable extends Table
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

        $this->setTable('inscricoes');
        $this->setDisplayField('ano');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Eventos', [
            'foreignKey' => 'evento_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Candidatos', [
            'foreignKey' => 'candidato_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('evento_id')
            ->notEmptyString('evento_id');

        $validator
            ->scalar('ano')
            ->requirePresence('ano', 'create')
            ->notEmptyString('ano');

        $validator
            ->integer('inscricao_id')
            ->requirePresence('inscricao_id', 'create')
            ->notEmptyString('inscricao_id');

        $validator
            ->integer('candidato_id')
            ->notEmptyString('candidato_id');

        $validator
            ->integer('responsavel_id')
            ->notEmptyString('responsavel_id');

        $validator
            ->integer('pontos')
            ->allowEmptyString('pontos');

        $validator
            ->integer('pontos_old')
            ->allowEmptyString('pontos_old');

        $validator
            ->notEmptyString('ic_recurso');

        $validator
            ->scalar('ds_motivo_recurso')
            ->allowEmptyString('ds_motivo_recurso');

        $validator
            ->scalar('tp_bolsa')
            ->requirePresence('tp_bolsa', 'create')
            ->notEmptyString('tp_bolsa');

        $validator
            ->allowEmptyString('ic_conhec_edital');

        $validator
            ->allowEmptyString('ic_aceite_termo');

        $validator
            ->notEmptyString('ic_receber_recurso');

        $validator
            ->scalar('obs_docs_admin')
            ->allowEmptyString('obs_docs_admin');

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
        $rules->add($rules->existsIn('evento_id', 'Eventos'), ['errorField' => 'evento_id']);
        $rules->add($rules->existsIn('candidato_id', 'Candidatos'), ['errorField' => 'candidato_id']);
        $rules->add($rules->existsIn('responsavel_id', 'Responsavels'), ['errorField' => 'responsavel_id']);

        return $rules;
    }
}
