<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TiposFixture
 */
class TiposFixture extends TestFixture
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
                'nm_tipo' => 'Lorem ipsum dolor sit amet',
                'ic_ativo' => 1,
                'created' => '2024-06-11 10:29:39',
                'modified' => '2024-06-11 10:29:39',
            ],
        ];
        parent::init();
    }
}
