<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TpEventosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TpEventosTable Test Case
 */
class TpEventosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TpEventosTable
     */
    protected $TpEventos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.TpEventos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TpEventos') ? [] : ['className' => TpEventosTable::class];
        $this->TpEventos = $this->getTableLocator()->get('TpEventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TpEventos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TpEventosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
