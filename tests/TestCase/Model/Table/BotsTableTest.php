<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BotsTable Test Case
 */
class BotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BotsTable
     */
    public $Bots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bots',
        'app.bot_adapters',
        'app.bot_external_scripts',
        'app.external_scripts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bots') ? [] : ['className' => 'App\Model\Table\BotsTable'];
        $this->Bots = TableRegistry::get('Bots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bots);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
