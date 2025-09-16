<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EscolasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EscolasTable Test Case
 */
class EscolasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EscolasTable
     */
    protected $Escolas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Escolas',
        'app.Candidatos',
        'app.EscolaAnos',
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
        $config = $this->getTableLocator()->exists('Escolas') ? [] : ['className' => EscolasTable::class];
        $this->Escolas = $this->getTableLocator()->get('Escolas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Escolas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EscolasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
