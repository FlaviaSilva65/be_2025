<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AnosFixture
 */
class AnosFixture extends TestFixture
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
                'nm_ano' => 'Lorem ipsum dolor sit amet',
                'ic_ativo' => 1,
                'created' => '2024-06-19 11:07:17',
                'modified' => '2024-06-19 11:07:17',
                'tipo_id' => 1,
            ],
        ];
        parent::init();
    }
}
