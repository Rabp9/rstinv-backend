<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrucesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrucesTable Test Case
 */
class CrucesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CrucesTable
     */
    public $Cruces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cruces',
        'app.detalle_antenas',
        'app.detalle_postes',
        'app.detalle_semaforos',
        'app.detalle_switches',
        'app.reguladores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cruces') ? [] : ['className' => CrucesTable::class];
        $this->Cruces = TableRegistry::getTableLocator()->get('Cruces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cruces);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
