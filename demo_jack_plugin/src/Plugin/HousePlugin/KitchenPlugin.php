<?php

namespace Drupal\demo_jack_plugin\Plugin\HousePlugin;

use Drupal\demo_plugin_api\Annotation\HousePlugin;
use Drupal\demo_plugin_api\Plugin\HousePluginInterface;


/**
 * @HousePlugin(
 *  id = "kitchen_plugin",
 *  label = @Translation("Kitchen plugin"),
 * )
 */
class KitchenPlugin implements HousePluginInterface {

  /**
   * The name.
   *
   * @var string
   */
  protected mixed $name;
  /**
   * The renderable array.
   *
   * @var array
   */
  protected mixed $renderable;
  /**
   * The plugin ID of the mapper.
   *
   * @var string
   */
  private string $pluginId;

  /**
   * Constructs the House plugin.
   *
   * @param array $parameters
   *   The instance parameters.
   * @param string $plugin_id
   *   The ID of the plugin to use by default.
   */
  public function __construct(array $parameters, string $plugin_id) {
    $this->pluginId = $plugin_id . '_' . time();
    $this->name = $parameters['name'];
    $this->renderable = $parameters['render'];
  }

  /**
     * {@inheritdoc}
     */
    public function build() : array {
      $build = ['render_from_house' => $this->renderable];

      $build['render_kitchen'] = [
        '#type' => 'markup',
        '#markup' => t('"Hi @name I\'m your Kitchen!. The oven is on, don\'t forget to turn it off!!"<br><img src="https://media.istockphoto.com/id/538653529/photo/woman-shocked-at-oven-fire-while-cooking-in-the-kitchen.jpg?s=612x612&w=0&k=20&c=IFTFoGKjlxEmbTVKKPuDDXNYoUO2TEQ9npgROLfaUQc=">', ['@name' => $this->name]),
        '#prefix' => '<h4>',
        '#suffix' => '</h4>',
      ];

      return $build;
    }

    /**
     * {@inheritdoc}
     */
    public function getPluginId() {
      return $this->pluginId;
    }

    /**
     * {@inheritdoc}
     */
    public function getPluginDefinition() {

    }

}
