<?php

namespace Drupal\ipfs\Entity;

use Drupal\image\Entity\ImageStyle;

/**
 * Customizes the image style entity class for images stored in IPFS.
 */
class IpfsImageStyle extends ImageStyle {

  /**
   * {@inheritdoc}
   */
  public function buildUri($uri) {
    $source_scheme = $scheme = $this->fileUriScheme($uri);
    $default_scheme = $this->fileDefaultScheme();

    // Use the default scheme (e.g. 'public') for storing image style of images
    // from IPFS.
    if ($source_scheme === 'ipfs') {
      $path = $this->fileUriTarget($uri);
      return "$default_scheme://styles/{$this->id()}/$source_scheme/{$this->addExtension($path)}";
    }

    return parent::buildUri($uri);
  }

}
