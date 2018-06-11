<?php

namespace Drupal\ipfs\EventSubscriber;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Site\Settings;
use IPFS\StreamWrapper\IpfsStreamWrapper;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * IPFS subscriber for controller requests.
 */
class IpfsSubscriber implements EventSubscriberInterface {

  /**
   * The configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The settings instance.
   *
   * @var \Drupal\Core\Site\Settings
   */
  protected $settings;

  /**
   * Constructs a new IpfsSubscriber object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   * @param \Drupal\Core\Site\Settings $settings
   *   The settings instance.
   */
  public function __construct(ConfigFactoryInterface $config_factory, Settings $settings) {
    $this->configFactory = $config_factory;
    $this->settings = $settings;
  }

  /**
   * Configures the IPFS host and HTTP client for the IPFS stream wrapper.
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
   *   The Event to process.
   */
  public function configureIpfsStreamWrapper(GetResponseEvent $event) {
    // Set the IPFS host and the HTTP client settings for the 'ipfs' scheme.
    IpfsStreamWrapper::setOption('ipfs_host', $this->configFactory->get('ipfs.settings')->get('ipfs_host'));
    IpfsStreamWrapper::setOption('http_client_config', $this->settings->get('http_client_config', []));
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['configureIpfsStreamWrapper'];
    return $events;
  }

}
