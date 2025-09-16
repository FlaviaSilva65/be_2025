<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EscolaTiposAnosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EscolaTiposAnosTable Test Case
 */
class EscolaTiposAnosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EscolaTiposAnosTable
     */
    protected $EscolaTiposAnos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.EscolaTiposAnos',
        'app.Escolas',
        'app.Anos',
        'app.Tipos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EscolaTiposAnos') ? [] : ['className' => EscolaTiposAnosTable::class];
        $this->EscolaTiposAnos = $this->getTableLocator()->get('EscolaTiposAnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EscolaTiposAnos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EscolaTiposAnosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EscolaTiposAnosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
