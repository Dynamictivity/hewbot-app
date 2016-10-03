<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExternalScriptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExternalScriptsTable Test Case
 */
class ExternalScriptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExternalScriptsTable
     */
    public $ExternalScripts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.external_scripts',
        'app.bot_external_scripts',
        'app.bots',
        'app.bot_adapters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExternalScripts') ? [] : ['className' => 'App\Model\Table\ExternalScriptsTable'];
        $this->ExternalScripts = TableRegistry::get('ExternalScripts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExternalScripts);

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
