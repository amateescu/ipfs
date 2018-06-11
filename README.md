CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Installation
 * Configuration
 * Troubleshooting
 * Maintainers

INTRODUCTION
------------

 Provides integration with IPFS via a stream wrapper.

 The recommended usage is to configure file or image fields to use IPFS as the
 upload destination. [Image styles](https://www.drupal.org/docs/user_guide/en/structure-image-styles.html)
 are supported for image fields, and the `public` schema will be used to store
 the image variations.

INSTALLATION
------------

 * Since this module depends on an external PHP library, it needs to be installed
   with Composer, see https://www.drupal.org/docs/8/extending-drupal-8/installing-modules-composer-dependencies
   for further information.

CONFIGURATION
-------------

 * The IPFS gateway can be configured at `/admin/config/media/ipfs`.

TROUBLESHOOTING
---------------

 * The IPFS module doesn't provide any visible functions to the user on its own,
   it simply exposes a new stream wrapper to Drupal.

MAINTAINERS
-----------

 Current maintainers:

 * Andrei Mateescu (https://www.drupal.org/u/amateescu)
