<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompFamiliaresFixture
 */
class CompFamiliaresFixture extends TestFixture
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
                'nm_comp_fam' => 'Lorem ipsum dolor sit amet',
                'nm_parentesco' => 'Lorem ipsum d',
                'nm_profis_comp_fam' => 'Lorem ipsum dolor sit amet',
                'nm_end_trab' => 'Lorem ipsum dolor sit amet',
                'vl_renda' => 1,
                'responsavel_id' => 1,
                'created' => '2024-07-10 11:27:19',
                'modified' => '2024-07-10 11:27:19',
            ],
        ];
        parent::init();
    }
}
