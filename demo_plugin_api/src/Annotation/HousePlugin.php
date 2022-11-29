<?php

namespace Drupal\demo_plugin_api\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a House plugin item annotation object.
 *
 * @see \Drupal\demo_plugin_api\Plugin\HousePluginManager
 * @see plugin_api
 *
 * @Annotation
 */
class HousePlugin extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
