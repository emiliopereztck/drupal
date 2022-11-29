<?php

namespace Drupal\demo_plugin_api\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HouseController.
 */
class HouseController extends ControllerBase {

  /**
   * Controller for House demo plugin.
   *
   * @param $name
   *
   * @return array|string
   *   Return demo controller string.
   */
  public function houseDemo($name): array|string {
    $renderArray = [
      '#type' => 'markup',
      '#markup' => '<div class="some" style=" grid-template-columns: repeat(2,1fr);"><span>' . $this->t('Welcome to the @name\'s house.', ['@name' => $name]) . '</span><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwv_Dvi6MA-ocfaBVe9bK-LSVgJC1kJ0gNnw&usqp=CAU"><br>',
      '#prefix' => '<h2>',
      '#suffix' => '</h2>',
    ];

    /*$type = \Drupal::service('plugin.manager.house_plugin');
    $plugin_definitions = $type->getDefinitions();

    foreach ($plugin_definitions as $plugin_definition) {
      $plugin = $type->createInstance(
        $plugin_definition['id'],
        [
          'render' => $renderArray,
          'name' => $name,
        ]
      );
      $renderArray = $plugin->build();
    }*/

    return $renderArray;
  }

}
