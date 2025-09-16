<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompFamiliaresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompFamiliaresTable Test Case
 */
class CompFamiliaresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompFamiliaresTable
     */
    protected $CompFamiliares;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CompFamiliares',
        'app.Responsavels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CompFamiliares') ? [] : ['className' => CompFamiliaresTable::class];
        $this->CompFamiliares = $this->getTableLocator()->get('CompFamiliares', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CompFamiliares);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CompFamiliaresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CompFamiliaresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
