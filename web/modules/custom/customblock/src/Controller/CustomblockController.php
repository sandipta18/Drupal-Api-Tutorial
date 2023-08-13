<?php

namespace Drupal\customblock\Controller;

use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Customblock routes.
 */
class CustomblockController extends ControllerBase {


  protected $pluginManager;

  public function __construct(PluginManagerInterface $pluginManager) {
    $this->pluginManager = $pluginManager;
  }

  public static function create(ContainerInterface $container) {
    return new static (
      $container->get('plugin.manager.block')
    );

  }
  /**
   * Builds the response.
   */
  public function build() {
    $plugin_manager = $this->pluginManager;
    $block_plugin = $plugin_manager->createInstance('customblock_example');
    $built_block = $block_plugin->build();
    return $built_block;
  }

}
