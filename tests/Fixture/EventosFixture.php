<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventosFixture
 */
class EventosFixture extends TestFixture
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
                'tp_eventos_id' => 1,
                'ano_evento' => '',
                'dt_inicio' => '2024-05-16',
                'dt_fim' => '2024-05-16',
                'ic_ativo' => 1,
                'created' => '2024-05-16 15:54:24',
                'modified' => '2024-05-16 15:54:24',
            ],
        ];
        parent::init();
    }
}
