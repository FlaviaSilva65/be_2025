<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BemImoveisFixture
 */
class BemImoveisFixture extends TestFixture
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
                'nm_end_imovel' => 'Lorem ipsum dolor sit amet',
                'vl_imovel' => 1,
                'responsavel_id' => 1,
                'created' => '2024-07-10 11:26:58',
                'modified' => '2024-07-10 11:26:58',
            ],
        ];
        parent::init();
    }
}
