<?php
/**
 * @file
 * Contains the theme's settings form.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function my_custom_theme_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface &$form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $breadcrumb_seperator = theme_get_setting('breadcrumb_seperator');
  $form['breadcrumb_seperator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb Seperator'),
    '#default_value' => $breadcrumb_seperator ? $breadcrumb_seperator : '>',
    '#description'   => t("Breadcrumb Seperator for this site."),
  );

  // Create the form using Forms API: http://api.drupal.org/api/7

  /* -- Delete this line if you want to use this setting
  $form['my_custom_theme_example'] = array(
  '#type'          => 'checkbox',
  '#title'         => t('my_custom_theme sample setting'),
  '#default_value' => theme_get_setting('my_custom_theme_example'),
  '#description'   => t("This example option doesn't do anything."),
  );
  // */

  /* -- Delete this line if you want to remove this base theme setting.
  // We don't need breadcrumbs to be configurable on this site.
  unset($form['breadcrumb']);
  // */

  // We are editing the $form in place, so we don't need to return anything.
}
