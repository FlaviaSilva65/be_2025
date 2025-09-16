<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TpAnexosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TpAnexosTable Test Case
 */
class TpAnexosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TpAnexosTable
     */
    protected $TpAnexos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.TpAnexos',
        'app.Anexos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TpAnexos') ? [] : ['className' => TpAnexosTable::class];
        $this->TpAnexos = $this->getTableLocator()->get('TpAnexos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TpAnexos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TpAnexosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TpAnexosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
