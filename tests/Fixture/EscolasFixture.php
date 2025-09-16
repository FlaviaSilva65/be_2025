<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EscolasFixture
 */
class EscolasFixture extends TestFixture
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
                'nm_escola' => 'Lorem ipsum dolor sit amet',
                'ic_ativo' => 1,
                'created' => '2024-06-19 11:07:40',
                'modified' => '2024-06-19 11:07:40',
            ],
        ];
        parent::init();
    }
}
