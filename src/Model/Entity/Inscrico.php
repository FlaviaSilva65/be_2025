<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inscrico Entity
 *
 * @property int $id
 * @property int $evento_id
 * @property string $ano
 * @property int $inscricao_id
 * @property int $candidato_id
 * @property int $responsavel_id
 * @property int|null $pontos
 * @property int|null $pontos_old
 * @property int $ic_recurso
 * @property string|null $ds_motivo_recurso
 * @property string $tp_bolsa
 * @property int|null $ic_conhec_edital
 * @property int|null $ic_aceite_termo
 * @property int $ic_receber_recurso
 * @property string|null $obs_docs_admin
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Evento $evento
 * @property \App\Model\Entity\Candidato $candidato
 * @property \App\Model\Entity\Responsavel $responsavel
 */
class Inscrico extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'evento_id' => true,
        'ano' => true,
        'inscricao_id' => true,
        'candidato_id' => true,
        'responsavel_id' => true,
        'pontos' => true,
        'pontos_old' => true,
        'ic_recurso' => true,
        'ds_motivo_recurso' => true,
        'tp_bolsa' => true,
        'ic_conhec_edital' => true,
        'ic_aceite_termo' => true,
        'ic_receber_recurso' => true,
        'obs_docs_admin' => true,
        'created' => true,
        'modified' => true,
        'evento' => true,
        'candidato' => true,
        'responsavel' => true,
    ];
}
