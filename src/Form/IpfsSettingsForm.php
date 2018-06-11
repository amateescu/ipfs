<?php

namespace Drupal\ipfs\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

/**
 * Configure IPFS settings for this site.
 *
 * @internal
 */
class IpfsSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ipfs_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['ipfs.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ipfs.settings');

    $form['ipfs_host'] = [
      '#type' => 'url',
      '#title' => $this->t("IPFS API Server"),
      '#description' => $this->t("The URL of the IPFS API server, for example: http://127.0.0.1:5001."),
      '#required' => TRUE,
      '#default_value' => $config->get('ipfs_host'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('ipfs.settings')
      ->set('ipfs_host', $form_state->getValue('ipfs_host'));

    $config->save();

    parent::submitForm($form, $form_state);
  }

}
