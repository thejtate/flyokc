<?php

/**
 * Cancel form.
 */
function wrwa_tracker_cancel_form($form, &$form_state, $flight_options = array(), $email) {

  $form_state['email'] = $email;
  $form_state['flight_options'] = $flight_options;

  if(!empty($flight_options)) {

    $wrap_id = drupal_html_id('cancel-form');

    $form['#prefix'] = '<div id="'. $wrap_id . '">';
    $form['#suffix'] = '</div>';

    $form['info'] = array(
      '#markup' => '<div class="unsubscribe-info">' . t(
          "If you've changed your mind and wish to turn off tracking for your flights, enter your email address below:"
        ) . '</br>' .
        t('The following flights have successfully been removed from @mail\'s tracking list:', array('@mail' => $email)) . '</div>',
    );

    $form['flights'] = array(
      '#type' => 'checkboxes',
      '#required' => TRUE,
      '#title' => t('Flights'),
      '#default_value' => array(),
      '#options' => $flight_options,
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Remove these flights'),
      '#name' => 'submit',
      '#prefix' => '<div class="btn-wrap style-d">',
      '#suffix' => '</div>',
      '#ajax' => array(
        'callback' => 'wrwa_tracker_cancel_submit_ajax',
        'wrapper' => $wrap_id,
      ),
    );

  } else {
    $form['empty'] = array(
      '#markup' => '<div class="empty-message">No flights found! </br> We couldn\'t find any flights that are being tracked by the email address you entered, '. check_plain($email) . ' </div>',
    );
  }


  return $form;
}

/**
 * Validate callback for Cancel.
 */
function wrwa_tracker_cancel_form_validate(&$form, &$form_state) {
}

/**
 * Submit callback for Cancel.
 */
function wrwa_tracker_cancel_form_submit(&$form, &$form_state) {

  $params = array('UserEmail' => $form_state['email'], 'Execute' => 'True');
  foreach ($form_state['values']['flights'] as $flight) {
    if(!empty($flight)) {
      $params[$flight] = 'on';
    }

  }

  wrwa_tracker_request(
    'http://www.infax.com/webfids/OKC2/track_removal.asp',
    $params
  );


}

/**
 * Ajax callback.
 */
function wrwa_tracker_cancel_submit_ajax($form, &$form_state) {

  if(form_get_errors()) {

    return $form;
  } else {
    $commands = array();
    $message = 'The following flights have successfully been removed from ' . check_plain($form_state['email']) . '\'s tracking list: </br>';

    $items = array();
    foreach ($form_state['values']['flights'] as $flight) {
      if(!empty($flight) && !empty($form_state['flight_options'][$flight])) {
        $items[] = check_plain($form_state['flight_options'][$flight]);
      }
    }

    $message .= theme('item_list',array('items' => $items));
    $message .= "Thank you for using Trak-a-Flight! Click here to return to the Trak A Flight page";

    $commands[] = ajax_command_replace(
      '.track-forms-wrapper',
      theme('wrwa_tracker_form_confirmation', array('message' => $message))
      );
  }

  return array(
    '#type' => 'ajax',
    '#commands' => $commands,
  );
}