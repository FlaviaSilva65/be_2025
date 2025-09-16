<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Escola Entity
 *
 * @property int $id
 * @property string $nm_escola
 * @property int $ic_ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Candidato[] $candidatos
 * @property \App\Model\Entity\EscolaAno[] $escola_anos
 * @property \App\Model\Entity\Tipo[] $tipos
 */
class Escola extends Entity
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
        'nm_escola' => true,
        'ic_ativo' => true,
        'created' => true,
        'modified' => true,
        'candidatos' => true,
        'escola_anos' => true,
        'escola_tipos_anos' => true,
        'tipos' => true,
    ];
}
