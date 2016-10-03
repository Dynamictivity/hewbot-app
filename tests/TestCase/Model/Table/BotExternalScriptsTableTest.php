<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BotExternalScriptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BotExternalScriptsTable Test Case
 */
class BotExternalScriptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BotExternalScriptsTable
     */
    public $BotExternalScripts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bot_external_scripts',
        'app.bots',
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
        $config = TableRegistry::exists('BotExternalScripts') ? [] : ['className' => 'App\Model\Table\BotExternalScriptsTable'];
        $this->BotExternalScripts = TableRegistry::get('BotExternalScripts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BotExternalScripts);

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
