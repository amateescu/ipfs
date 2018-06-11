<?php

namespace Drupal\ipfs\StreamWrapper;

use Drupal\Core\StreamWrapper\StreamWrapperInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use IPFS\StreamWrapper\IpfsStreamWrapper;

/**
 * Defines a Drupal stream wrapper for IPFS.
 */
class IpfsStream extends IpfsStreamWrapper implements StreamWrapperInterface {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public static function getType() {
    return StreamWrapperInterface::WRITE_VISIBLE;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->t('IPFS');
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->t('InterPlanetary File System.');
  }

  /**
   * {@inheritdoc}
   */
  public function getExternalUrl() {
    return $this->uri;
  }

  /**
   * {@inheritdoc}
   */
  public function realpath() {
    return $this->uri;
  }

  /**
   * {@inheritdoc}
   */
  public function dirname($uri = NULL) {
    if (!isset($uri)) {
      $uri = $this->uri;
    }

    list($scheme, $target) = explode('://', $uri, 2);
    $dirname = dirname($target);

    if ($dirname == '.') {
      $dirname = '';
    }

    return $scheme . '://' . $dirname;
  }

}
