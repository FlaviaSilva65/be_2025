<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TpEventosFixture
 */
class TpEventosFixture extends TestFixture
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
                'nm_tp_evento' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-05-16 15:53:36',
                'modified' => '2024-05-16 15:53:36',
            ],
        ];
        parent::init();
    }
}
