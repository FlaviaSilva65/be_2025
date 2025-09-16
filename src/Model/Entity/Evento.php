<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id
 * @property int $tp_eventos_id
 * @property string $ano_evento
 * @property \Cake\I18n\Date $dt_inicio
 * @property \Cake\I18n\Date $dt_fim
 * @property int $ic_ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\TpEvento $tp_evento
 * @property \App\Model\Entity\Inscrico[] $inscricoes
 */
class Evento extends Entity
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
        'tp_eventos_id' => true,
        'ano_evento' => true,
        'dt_inicio' => true,
        'dt_fim' => true,
        'ic_ativo' => true,
        'created' => true,
        'modified' => true,
        'tp_evento' => true,
        'inscricoes' => true,
    ];
}
