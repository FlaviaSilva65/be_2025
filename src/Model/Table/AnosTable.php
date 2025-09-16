<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anos Model
 *
 * @property \App\Model\Table\TiposTable&\Cake\ORM\Association\BelongsTo $Tipos
 * @property \App\Model\Table\CandidatosTable&\Cake\ORM\Association\HasMany $Candidatos
 * @property \App\Model\Table\EscolaAnosTable&\Cake\ORM\Association\HasMany $EscolaAnos
 *
 * @method \App\Model\Entity\Ano newEmptyEntity()
 * @method \App\Model\Entity\Ano newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ano> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ano get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ano findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ano patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ano> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ano|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ano saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ano>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ano> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ano>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ano> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnosTable extends Table
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

        $this->setTable('anos');
        $this->setDisplayField('nm_ano');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tipos', [
            'foreignKey' => 'tipo_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Candidatos', [
            'foreignKey' => 'ano_id',
        ]);
        // $this->hasMany('EscolaAnos', [
        //     'foreignKey' => 'ano_id',
        // ]);
        $this->hasMany('EscolaTiposAnos', [
            'foreignKey' => 'ano_id',
        ]);
        // $this->hasMany('EscolaTiposAnos', [
        //     'foreignKey' => 'ano_id',
        //     'dependent' => true,
        //     'cascadeCallbacks' => true
        // ]);
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
            ->scalar('nm_ano')
            ->maxLength('nm_ano', 105)
            ->notEmptyString('nm_ano');

        $validator
            ->notEmptyString('ic_ativo');

        $validator
            ->nonNegativeInteger('tipo_id')
            ->notEmptyString('tipo_id');

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
        $rules->add($rules->existsIn('tipo_id', 'Tipos'), ['errorField' => 'tipo_id']);

        return $rules;
    }
}
