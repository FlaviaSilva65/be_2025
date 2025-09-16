<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BemMovei Entity
 *
 * @property int $id
 * @property string $nm_modelo
 * @property string $nm_marca
 * @property int $num_ano_veic
 * @property float $vl_veiculo
 * @property int $responsavel_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Responsavel $responsavel
 */
class BemMovei extends Entity
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
        'nm_modelo' => true,
        'nm_marca' => true,
        'num_ano_veic' => true,
        'vl_veiculo' => true,
        'responsavel_id' => true,
        'created' => true,
        'modified' => true,
        'responsavel' => true,
    ];
}
