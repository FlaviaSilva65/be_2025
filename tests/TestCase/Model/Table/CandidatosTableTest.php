<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidatosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidatosTable Test Case
 */
class CandidatosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidatosTable
     */
    protected $Candidatos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Candidatos',
        'app.Responsavels',
        'app.Escolas',
        'app.Tipos',
        'app.Anos',
        'app.Anexos',
        'app.CandidatoClassifPontuacaos',
        'app.Inscricoes',
        'app.MovimentoCadastros',
        'app.SomaPontuacao',
        'app.SomaPontuacaosView',
        'app.Modalidades',
        'app.Pontuacaos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Candidatos') ? [] : ['className' => CandidatosTable::class];
        $this->Candidatos = $this->getTableLocator()->get('Candidatos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Candidatos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CandidatosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CandidatosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
