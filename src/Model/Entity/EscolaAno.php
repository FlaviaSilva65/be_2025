<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EscolaAno Entity
 *
 * @property int $id
 * @property int $escola_id
 * @property int $ano_id
 * @property int $ic_ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Escola $escola
 * @property \App\Model\Entity\Ano $ano
 */
class EscolaAno extends Entity
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
        'escola_id' => true,
        'ano_id' => true,
        'ic_ativo' => true,
        'created' => true,
        'modified' => true,
        'escola' => true,
        'ano' => true,
    ];
}
