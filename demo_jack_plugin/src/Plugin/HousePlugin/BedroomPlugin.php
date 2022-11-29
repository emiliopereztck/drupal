<?php

namespace Drupal\demo_jack_plugin\Plugin\HousePlugin;

use Drupal\demo_plugin_api\Annotation\HousePlugin;
use Drupal\demo_plugin_api\Plugin\HousePluginInterface;


/**
 * @HousePlugin(
 *  id = "bedroom_plugin",
 *  label = @Translation("Bedroom plugin"),
 * )
 */
class BedroomPlugin implements HousePluginInterface {

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
      $build['render_bedroom'] = [
        '#type' => 'markup',
        '#markup' => t('"@name!! this is your Bedroom calling you! Just a friendly reminder that your computer is in flames too" <br><img src="https://betanews.com/wp-content/uploads/2016/06/laptopfire-600x398.jpg">', ['@name' => $this->name]),
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
