<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BemImovei Entity
 *
 * @property int $id
 * @property string $nm_tipo
 * @property string $nm_end_imovel
 * @property float $vl_imovel
 * @property int $responsavel_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Responsavel $responsavel
 */
class BemImovei extends Entity
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
        'nm_tipo' => true,
        'nm_end_imovel' => true,
        'vl_imovel' => true,
        'responsavel_id' => true,
        'created' => true,
        'modified' => true,
        'responsavel' => true,
    ];
}
