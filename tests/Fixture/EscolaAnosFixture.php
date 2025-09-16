<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EscolaAnosFixture
 */
class EscolaAnosFixture extends TestFixture
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
                'escola_id' => 1,
                'ano_id' => 1,
                'ic_ativo' => 1,
                'created' => '2024-06-19 11:07:52',
                'modified' => '2024-06-19 11:07:52',
            ],
        ];
        parent::init();
    }
}
