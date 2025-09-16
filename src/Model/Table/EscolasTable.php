<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Escolas Model
 *
 * @property \App\Model\Table\CandidatosTable&\Cake\ORM\Association\HasMany $Candidatos
 * @property \App\Model\Table\EscolaAnosTable&\Cake\ORM\Association\HasMany $EscolaAnos
 * @property \App\Model\Table\TiposTable&\Cake\ORM\Association\BelongsToMany $Tipos
 *
 * @method \App\Model\Entity\Escola newEmptyEntity()
 * @method \App\Model\Entity\Escola newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Escola> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Escola get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Escola findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Escola patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Escola> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Escola|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Escola saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Escola>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Escola>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Escola>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Escola> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Escola>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Escola>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Escola>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Escola> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EscolasTable extends Table
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

        $this->setTable('escolas');
        $this->setDisplayField('nm_escola');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Candidatos', [
            'foreignKey' => 'escola_id',
        ]);
        $this->hasMany('EscolaAnos', [
            'foreignKey' => 'escola_id',
        ]);
        $this->hasMany('EscolaTiposAnos', [
            'foreignKey' => 'escola_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsToMany('Tipos', [
            'foreignKey' => 'escola_id',
            'targetForeignKey' => 'tipo_id',
            'joinTable' => 'escola_tipos_anos',
        ]);
        // $this->belongsToMany('Anos', [
        //     'foreignKey' => 'escola_id',
        //     'targetForeignKey' => 'ano_id',
        //     'joinTable' => 'escola_tipos_anos',
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
            ->scalar('nm_escola')
            ->maxLength('nm_escola', 255)
            ->notEmptyString('nm_escola', 'Informação Necessária.');

        $validator
            ->notEmptyString('ic_ativo');

        return $validator;
    }

    public function beforeSave($event, $entity)
    {
        if ($entity->escola_tipos_anos) {
            foreach ($entity->escola_tipos_anos as $i => $escola_anos) {
                if ($escola_anos->ano_id == 0)
                    unset($entity->escola_tipos_anos[$i]);
            }
        }


        // return $entity;

        // debug($entity);
        // die;
    }
}
