<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InscricoesFixture
 */
class InscricoesFixture extends TestFixture
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
                'evento_id' => 1,
                'ano' => 'Lorem ipsum dolor sit amet',
                'inscricao_id' => 1,
                'candidato_id' => 1,
                'responsavel_id' => 1,
                'pontos' => 1,
                'pontos_old' => 1,
                'ic_recurso' => 1,
                'ds_motivo_recurso' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tp_bolsa' => 'Lorem ipsum dolor sit amet',
                'ic_conhec_edital' => 1,
                'ic_aceite_termo' => 1,
                'ic_receber_recurso' => 1,
                'obs_docs_admin' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2025-02-13 15:56:10',
                'modified' => '2025-02-13 15:56:10',
            ],
        ];
        parent::init();
    }
}
