<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TpAnexosFixture
 */
class TpAnexosFixture extends TestFixture
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
                'item' => '',
                'nm_tp_anexo' => 'Lorem ipsum dolor sit amet',
                'ct_tp_anexo' => 'Lorem ipsum dolor sit amet',
                'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tp_anexos_id' => 1,
                'ordem' => 'Lorem ipsum dolor sit amet',
                'ic_obrigatorio' => 1,
                'tp_bolsa' => 1,
                'created' => '2025-02-14 09:17:56',
                'modified' => '2025-02-14 09:17:56',
            ],
        ];
        parent::init();
    }
}
