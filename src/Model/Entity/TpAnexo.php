<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TpAnexo Entity
 *
 * @property int $id
 * @property string|null $item
 * @property string $nm_tp_anexo
 * @property string $ct_tp_anexo
 * @property string|null $descricao
 * @property int|null $tp_anexos_id
 * @property string|null $ordem
 * @property int $ic_obrigatorio
 * @property int $tp_bolsa
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\TpAnexo $tp_anexo
 * @property \App\Model\Entity\Anexo[] $anexos
 */
class TpAnexo extends Entity
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
        'item' => true,
        'nm_tp_anexo' => true,
        'ct_tp_anexo' => true,
        'descricao' => true,
        'tp_anexos_id' => true,
        'ordem' => true,
        'ic_obrigatorio' => true,
        'tp_bolsa' => true,
        'created' => true,
        'modified' => true,
        'tp_anexo' => true,
        'anexos' => true,
    ];
}
