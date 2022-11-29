<?php

namespace Drupal\demo_plugin_api\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the demo_plugin_api module.
 */
class HouseControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "demo_plugin_api HouseController's controller functionality",
      'description' => 'Test Unit for module demo_plugin_api and controller HouseController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests demo_plugin_api functionality.
   */
  public function testHouseController() {
    // Check that the basic functions of module demo_plugin_api.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
