<?php 
use Drupal\Core\Site\Settings;

/**
 * Implements hook_form_FORM_ID_alter().
 */
function stingo_kit_form_install_configure_form_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state) {
  $form['#submit'][] = 'stingo_kit_install_configure_form_submit';
}

/**
 * Custom submit handler to set config sync directory and UUID.
 */
function stingo_kit_install_configure_form_submit($form, \Drupal\Core\Form\FormStateInterface $form_state) {
  // Set the config sync directory to your profile's config.
  $settings['config_sync_directory'] = 'profiles/stingo_kit/config/sync';
  Settings::initialize(DRUPAL_ROOT, DRUPAL_ROOT . '/sites/default', $settings);
}
