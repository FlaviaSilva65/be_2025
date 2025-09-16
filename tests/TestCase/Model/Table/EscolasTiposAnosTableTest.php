<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EscolasTiposAnosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EscolasTiposAnosTable Test Case
 */
class EscolasTiposAnosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EscolasTiposAnosTable
     */
    protected $EscolasTiposAnos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.EscolasTiposAnos',
        'app.EscolasTipos',
        'app.Escolas',
        'app.Tipos',
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
        $config = $this->getTableLocator()->exists('EscolasTiposAnos') ? [] : ['className' => EscolasTiposAnosTable::class];
        $this->EscolasTiposAnos = $this->getTableLocator()->get('EscolasTiposAnos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EscolasTiposAnos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EscolasTiposAnosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EscolasTiposAnosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
