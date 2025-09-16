<?php
// src/Model/Entity/Responsavel.php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Responsavel extends Entity
{

    protected array $_accessible = [
        'vl_cpf' => true,
        'dt_nascimento' => true,
        'nm_responsavel' => true,
        
        'created' => true,
        'modified' => true,
        'vl_rg_resp' => true,
        'nm_email' => true,
        'vl_titulo' => true,
        'vl_zona' => true,
        'vl_secao' => true,
        'cd_telefone' => true,
        'cd_cel' => true,
        'concessao_fam' => true,
        'cd_verificacao' => true,
        'candidatos' => true,
        'inscricoes' => true,
        'comp_familiares' => true,
        'bem_moveis' => true,
        'bem_imoveis' => true,
    ];

    protected array $_hidden = [
        'cd_verificacao' => true
    ];

    // public function _getDtNascimentoFormatado()
    // {
    //     return date_format($this->dt_nascimento, 'Y-m-d');
    // }
}
