<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompFamiliare Entity
 *
 * @property int $id
 * @property string $nm_comp_fam
 * @property string $nm_parentesco
 * @property string $nm_profis_comp_fam
 * @property string|null $nm_end_trab
 * @property float|null $vl_renda
 * @property int $responsavel_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Responsavel $responsavel
 */
class CompFamiliare extends Entity
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
        'nm_comp_fam' => true,
        'nm_parentesco' => true,
        'nm_profis_comp_fam' => true,
        'nm_end_trab' => true,
        'vl_renda' => true,
        'responsavel_id' => true,
        'created' => true,
        'modified' => true,
        'responsavel' => true,
    ];
}
