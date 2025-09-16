<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BemMoveisFixture
 */
class BemMoveisFixture extends TestFixture
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
                'nm_modelo' => 'Lorem ipsum dolor sit amet',
                'nm_marca' => 'Lorem ipsum dolor sit amet',
                'num_ano_veic' => 1,
                'vl_veiculo' => 1,
                'responsavel_id' => 1,
                'created' => '2024-07-10 11:26:45',
                'modified' => '2024-07-10 11:26:45',
            ],
        ];
        parent::init();
    }
}
