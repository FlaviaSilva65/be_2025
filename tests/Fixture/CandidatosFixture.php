<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CandidatosFixture
 */
class CandidatosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nm_candidato' => 'Lorem ipsum dolor sit amet',
                'responsavel_id' => 1,
                'escola_id' => 1,
                'tipo_id' => 'Lorem ipsum dolor sit amet',
                'ano_id' => 'Lorem ipsum dolor sit amet',
                'ic_deletado' => 1,
                'ic_ano_anterior' => 1,
                'ic_recebido' => 1,
                'ic_aprovado' => 1,
                'vl_ctnumero' => '',
                'vl_ctlivro' => 'Lorem ip',
                'vl_ctfolha' => 'Lorem ip',
                'vl_certidao' => 'Lorem ipsum dolor sit amet',
                'dt_nascimento' => '2024-06-10',
                'vl_rg' => 'Lorem ipsu',
                'vl_cpf' => 'Lorem ipsum ',
                'nm_filiacao1' => 'Lorem ipsum dolor sit amet',
                'nm_filiacao2' => 'Lorem ipsum dolor sit amet',
                'nm_rua' => 'Lorem ipsum dolor sit amet',
                'vl_numero' => 'Lore',
                'nm_bairro' => 'Lorem ipsum dolor sit amet',
                'nm_cidade' => 'Lorem ipsum dolor sit amet',
                'vl_cep' => 'Lorem i',
                'vl_tel' => 'Lorem ipsum d',
                'vl_tempo_res' => 'Lorem ipsum dolor sit amet',
                'vl_cel' => 'Lorem ipsum d',
                'ds_moradia' => 1,
                'ds_dependentes' => 1,
                'ds_rendafamiliar' => 1,
                'ds_patrimonio' => 1,
                'ds_transporte' => 1,
                'ds_info_compl' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'ds_recebeobs' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'ic_deficiente' => 1,
                'ic_recurso' => 1,
                'ds_motivo_recurso' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-06-10 12:48:00',
                'modified' => '2024-06-10 12:48:00',
            ],
        ];
        parent::init();
    }
}
