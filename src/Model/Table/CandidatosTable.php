<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candidatos Model
 *
 * @property \App\Model\Table\ResponsavelsTable&\Cake\ORM\Association\BelongsTo $Responsavels
 * @property \App\Model\Table\EscolasTable&\Cake\ORM\Association\BelongsTo $Escolas
 * @property \App\Model\Table\TiposTable&\Cake\ORM\Association\BelongsTo $Tipos
 * @property \App\Model\Table\AnosTable&\Cake\ORM\Association\BelongsTo $Anos
 * @property \App\Model\Table\AnexosTable&\Cake\ORM\Association\HasMany $Anexos
 * @property \App\Model\Table\CandidatoClassifPontuacaosTable&\Cake\ORM\Association\HasMany $CandidatoClassifPontuacaos
 * @property \App\Model\Table\InscricoesTable&\Cake\ORM\Association\HasMany $Inscricoes
 * @property \App\Model\Table\MovimentoCadastrosTable&\Cake\ORM\Association\HasMany $MovimentoCadastros
 * @property \App\Model\Table\SomaPontuacaoTable&\Cake\ORM\Association\HasMany $SomaPontuacao
 * @property \App\Model\Table\SomaPontuacaosViewTable&\Cake\ORM\Association\HasMany $SomaPontuacaosView
 * @property \App\Model\Table\ModalidadesTable&\Cake\ORM\Association\BelongsToMany $Modalidades
 * @property \App\Model\Table\PontuacaosTable&\Cake\ORM\Association\BelongsToMany $Pontuacaos
 *
 * @method \App\Model\Entity\Candidato newEmptyEntity()
 * @method \App\Model\Entity\Candidato newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Candidato> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candidato get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Candidato findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Candidato patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Candidato> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candidato|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Candidato saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Candidato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candidato>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Candidato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candidato> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Candidato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candidato>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Candidato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candidato> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CandidatosTable extends Table
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

        $this->setTable('candidatos');
        $this->setDisplayField('nm_candidato');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Responsavels', [
            'foreignKey' => 'responsavel_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Escolas', [
            'foreignKey' => 'escola_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tipos', [
            'foreignKey' => 'tipo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Anos', [
            'foreignKey' => 'ano_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Anexos', [
            'foreignKey' => 'candidato_id',
        ]);
        $this->hasMany('CandidatoClassifPontuacaos', [
            'foreignKey' => 'candidato_id',
        ]);
        $this->hasMany('Inscricoes', [
            'foreignKey' => 'candidato_id',
        ]);
        $this->hasMany('MovimentoCadastros', [
            'foreignKey' => 'candidato_id',
        ]);
        $this->hasMany('SomaPontuacao', [
            'foreignKey' => 'candidato_id',
        ]);
        $this->hasMany('SomaPontuacaosView', [
            'foreignKey' => 'candidato_id',
        ]);
        $this->belongsToMany('Modalidades', [
            'foreignKey' => 'candidato_id',
            'targetForeignKey' => 'modalidade_id',
            'joinTable' => 'candidatos_modalidades',
        ]);
        $this->belongsToMany('Pontuacaos', [
            'foreignKey' => 'candidato_id',
            'targetForeignKey' => 'pontuacao_id',
            'joinTable' => 'candidatos_pontuacaos',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nm_candidato')
            ->maxLength('nm_candidato', 100)
            ->notEmptyString('nm_candidato');

        $validator
            ->nonNegativeInteger('responsavel_id')
            ->notEmptyString('responsavel_id');

        $validator
            ->nonNegativeInteger('escola_id')
            ->notEmptyString('escola_id');

        $validator
            ->scalar('tipo_id')
            ->maxLength('tipo_id', 45)
            ->notEmptyString('tipo_id');

        $validator
            ->scalar('ano_id')
            ->maxLength('ano_id', 45)
            ->notEmptyString('ano_id');

        $validator
            ->notEmptyString('ic_deletado');

        $validator
            ->requirePresence('ic_ano_anterior', 'create')
            ->notEmptyString('ic_ano_anterior');

        $validator
            ->nonNegativeInteger('ic_recebido')
            ->notEmptyString('ic_recebido');

        $validator
            ->integer('ic_aprovado')
            ->allowEmptyString('ic_aprovado');

        $validator
            ->scalar('vl_ctnumero')
            ->maxLength('vl_ctnumero', 20)
            ->requirePresence('vl_ctnumero', 'create')
            ->notEmptyString('vl_ctnumero');

        $validator
            ->scalar('vl_ctlivro')
            ->maxLength('vl_ctlivro', 10)
            ->allowEmptyString('vl_ctlivro');

        $validator
            ->scalar('vl_ctfolha')
            ->maxLength('vl_ctfolha', 10)
            ->allowEmptyString('vl_ctfolha');

        // $validator
        //     ->scalar('vl_certidao')
        //     ->maxLength('vl_certidao', 32)
        //     ->notEmptyString('vl_certidao');

        $validator
            ->date('dt_nascimento')
            ->requirePresence('dt_nascimento', 'create')
            ->notEmptyDate('dt_nascimento');

        $validator
            ->scalar('vl_rg')
            ->maxLength('vl_rg', 12)
            ->allowEmptyString('vl_rg');

        $validator
            ->scalar('vl_cpf')
            ->maxLength('vl_cpf', 14)
            ->allowEmptyString('vl_cpf');

        $validator
            ->scalar('nm_filiacao1')
            ->maxLength('nm_filiacao1', 100)
            ->allowEmptyString('nm_filiacao1');

        $validator
            ->scalar('nm_filiacao2')
            ->maxLength('nm_filiacao2', 100)
            ->allowEmptyString('nm_filiacao2');

        $validator
            ->scalar('nm_rua')
            ->maxLength('nm_rua', 50)
            ->allowEmptyString('nm_rua');

        $validator
            ->scalar('vl_numero')
            ->maxLength('vl_numero', 6)
            ->allowEmptyString('vl_numero');

        $validator
            ->scalar('nm_bairro')
            ->maxLength('nm_bairro', 30)
            ->allowEmptyString('nm_bairro');

        $validator
            ->scalar('nm_cidade')
            ->maxLength('nm_cidade', 30)
            ->allowEmptyString('nm_cidade');

        $validator
            ->scalar('vl_cep')
            ->maxLength('vl_cep', 9)
            ->allowEmptyString('vl_cep');

        $validator
            ->scalar('vl_tel')
            ->maxLength('vl_tel', 15)
            ->allowEmptyString('vl_tel');

        $validator
            ->scalar('vl_tempo_res')
            ->maxLength('vl_tempo_res', 30)
            ->notEmptyString('vl_tempo_res');

        $validator
            ->scalar('vl_cel')
            ->maxLength('vl_cel', 15)
            ->allowEmptyString('vl_cel');

        $validator
            ->nonNegativeInteger('ds_moradia')
            ->requirePresence('ds_moradia', 'create')
            ->notEmptyString('ds_moradia');

        $validator
            ->nonNegativeInteger('ds_dependentes')
            ->requirePresence('ds_dependentes', 'create')
            ->notEmptyString('ds_dependentes');

        $validator
            ->nonNegativeInteger('ds_rendafamiliar')
            ->requirePresence('ds_rendafamiliar', 'create')
            ->notEmptyString('ds_rendafamiliar');

        $validator
            ->nonNegativeInteger('ds_patrimonio')
            ->requirePresence('ds_patrimonio', 'create')
            ->notEmptyString('ds_patrimonio');

        $validator
            ->nonNegativeInteger('ds_transporte')
            ->allowEmptyString('ds_transporte');

        $validator
            ->scalar('ds_info_compl')
            ->maxLength('ds_info_compl', 255)
            ->allowEmptyString('ds_info_compl');

        $validator
            ->scalar('ds_recebeobs')
            ->maxLength('ds_recebeobs', 255)
            ->allowEmptyString('ds_recebeobs');

        $validator
            ->requirePresence('ic_deficiente', 'create')
            ->notEmptyString('ic_deficiente');

        $validator
            ->notEmptyString('ic_recurso');

        $validator
            ->scalar('ds_motivo_recurso')
            ->maxLength('ds_motivo_recurso', 255)
            ->allowEmptyString('ds_motivo_recurso');

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
        $rules->add($rules->existsIn('escola_id', 'Escolas'), ['errorField' => 'escola_id']);
        $rules->add($rules->existsIn('tipo_id', 'Tipos'), ['errorField' => 'tipo_id']);
        $rules->add($rules->existsIn('ano_id', 'Anos'), ['errorField' => 'ano_id']);
        // $rules->add([$this, 'certidaoNotExists'], 'certidaoNotExists', ['errorField' => 'vl_ctnumero', 'message' => 'Esse documento já existe']);

        return $rules;
    }


    public function certidaoNotExists($entity)
    {
        // if (!$entity->vl_certidao) {
            $entity->vl_certidao = 0;
        // }
        
        if (!$entity->isDirty('vl_certidao')) return true;

        // debug($this->findByVlCertidao($entity->vl_certidao)->where(['id !=' => $entity->id] )->first());
        // die;
       
        return !$this->findByVlCertidao($entity->vl_certidao)->where(['vl_certidao' => $entity->vl_certidao] )->first();
    }


}
