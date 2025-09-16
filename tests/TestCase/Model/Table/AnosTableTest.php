<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnosTable Test Case
 */
class AnosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnosTable
     */
    protected $Anos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Anos',
        'app.Tipos',
        'app.Candidatos',
        'app.EscolaAnos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Anos') ? [] : ['className' => AnosTable::class];
        $this->Anos = $this->getTableLocator()->get('Anos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Anos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AnosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AnosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
