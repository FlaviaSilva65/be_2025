<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventosTable Test Case
 */
class EventosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventosTable
     */
    protected $Eventos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Eventos',
        'app.TpEventos',
        'app.Inscricoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Eventos') ? [] : ['className' => EventosTable::class];
        $this->Eventos = $this->getTableLocator()->get('Eventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Eventos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EventosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EventosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
