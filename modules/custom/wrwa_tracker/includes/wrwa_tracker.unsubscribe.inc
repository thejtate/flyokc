<?php

/**
 * Unsubscribe form.
 */
function wrwa_tracker_unsubscribe_form($form, &$form_state) {

  $wrap_id = drupal_html_id('unsubscribe-form');

  $form['#prefix'] = '<div id="'. $wrap_id . '">';
  $form['#suffix'] = '</div>';

  $form['messages'] = array(
    '#markup' => theme('status_messages'),
  );

  $form['info'] = array(
    '#markup' => '<div class="unsubscribe-info">' . t(
        "If you've changed your mind and wish to turn off tracking for your flights, enter your email address below:"
      ) . '</div>',
  );

  $form['email'] = array(
    '#type' => 'textfield',
    '#required' => TRUE,
    '#title' => t('Unsubscribe'),
    '#element_validate' => array('wrwa_tracker_element_validate_mail'),
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Cancel flight update'),
    '#attributes' => array('placeholder' => t('Email')),
    '#name' => 'submit',
    '#ajax' => array(
      'callback' => 'wrwa_tracker_unsubscribe_submit_ajax',
      'wrapper' => $wrap_id,
    ),
  );

  return $form;
}


/**
 * Submit callback for Unsubscribe.
 */
function wrwa_tracker_unsubscribe_form_submit(&$form, &$form_state) {

  $response = wrwa_tracker_request(
    'http://www.infax.com/webfids/OKC2/track_removal.asp',
    array(
      'UserEmail' => $form_state['values']['email'],
      'Removal' => 'Cancel flight update'
    )
  );

  if ($response->code == '200' && !empty($response->data)) {
    preg_match_all(
      '/<INPUT TYPE="checkbox" NAME="([^\"]+)"\\s*>\\s*<\/TD>\\s*<TD[^>]+>([^<]+)<\/TR>/',
      $response->data,
      $matches
    );

  }
  $form_state['flights_options'] = array();
  if(!empty($matches[1])) {
    foreach ($matches[1] as $key => $match) {
      $form_state['flights_options'][$match] = !empty($matches[2][$key]) ? check_plain($matches[2][$key]) : 'Flight' . $key;
    }
  }

}

/**
 * Ajax callback.
 */
function wrwa_tracker_unsubscribe_submit_ajax($form, $form_state) {

  $commands = array();

  if(form_get_errors()) {
    return $form;
  } else {

    $cancel_form = drupal_get_form(
      'wrwa_tracker_cancel_form',
      $form_state['flights_options'],
      $form_state['values']['email']
    );

    $commands[] = ajax_command_replace(
      '.track-forms-wrapper',
      theme('wrwa_tracker_form_cancel', array('form' => drupal_render($cancel_form)))
    );

  }

  return array(
    '#type' => 'ajax',
    '#commands' => $commands,
  );

}