<?php

namespace Drupal\ipfs;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Alters container services.
 */
class IpfsServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    parent::alter($container);

    // Add 'ipfs' as a valid protocol.
    $filter_protocols = $container->getParameter('filter_protocols');
    $filter_protocols[] = 'ipfs';
    $container->setParameter('filter_protocols', $filter_protocols);
  }

}
