<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EscolasTiposAnosFixture
 */
class EscolasTiposAnosFixture extends TestFixture
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
                'escolas_tipo_id' => 1,
                'escola_id' => 1,
                'tipo_id' => 1,
                'ic_ativo' => 1,
                'created' => '2024-06-11 11:21:22',
                'modified' => '2024-06-11 11:21:22',
            ],
        ];
        parent::init();
    }
}
