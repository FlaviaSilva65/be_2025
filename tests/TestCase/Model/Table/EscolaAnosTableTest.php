<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EscolaAnosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EscolaAnosTable Test Case
 */
class EscolaAnosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EscolaAnosTable
     */
    protected $EscolaAnos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.EscolaAnos',
        'app.Escolas',
        'app.Anos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EscolaAnos') ? [] : ['className' => EscolaAnosTable::class];
        $this->EscolaAnos = $this->getTableLocator()->get('EscolaAnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EscolaAnos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EscolaAnosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EscolaAnosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
