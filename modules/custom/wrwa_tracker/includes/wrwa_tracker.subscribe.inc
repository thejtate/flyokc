<?php

/**
 * Subscribe.
 */
function wrwa_tracker_subscribe_form($form, &$form_state) {

  $wrap_id = drupal_html_id('subscribe-form');
  $form['#prefix'] = '<div id="'. $wrap_id . '">';
  $form['#suffix'] = '</div>';

  $flights = wrwa_tracker_get_flights();

  $form['messages'] = array(
    '#markup' => theme('status_messages'),
  );

  $form['airline'] = array(
    '#type' => 'select',
    '#required' => TRUE,
    '#title' => t('Airline'),
    '#empty_option' => t('Select'),
    '#options' => wrwa_flights_get_airlines_options(
      wrwa_flights_get_airlines_info()
    ),
  );

  $form['flight'] = array(
    '#type' => 'select',
    '#required' => TRUE,
    '#title' => t('Flight'),
    '#empty_option' => t('Select'),
    '#options' => wrwa_tracker_get_flights_options($flights),
  );

  $form['date'] = array(
    '#required' => TRUE,
    '#type' => 'date_select',
    '#title' => t('Flight date'),
    '#date_year_range' => '-0:+5',
    '#date_format' => 'm d Y',
    '#default_value' => date('d m Y'),
  );

//  $form['email'] = array(
//    '#type' => 'textfield',
//    '#required' => TRUE,
//    '#title' => t('Email'),
//    '#attributes' => array('placeholder' => t('Email')),
//    '#element_validate' => array('wrwa_tracker_element_validate_mail'),
//  );

//  $form['email_confirm'] = array(
//    '#type' => 'textfield',
//    '#required' => TRUE,
//    '#title' => t('Retype Email'),
//    '#attributes' => array('placeholder' => t('Retype Email')),
//    '#element_validate' => array('wrwa_tracker_element_validate_mail'),
//  );

  $form['type'] = array(
    '#type' => 'radios',
    '#required' => TRUE,
    '#title' => t('Email type'),
    '#default_value' => 'Short',
    '#options' => array(
      'Short' => t('SHORT (for cell phone/PDA)'),
      'Long' => t('LONG')
    ),
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Track my flight!'),
    '#name' => 'submit',
    '#ajax' => array(
      'callback' => 'wrwa_tracker_subscribe_submit_ajax',
      'wrapper' => $wrap_id,
    ),
  );

  return $form;
}

/**
 * Validate callback for Subscribe.
 */
function wrwa_tracker_subscribe_form_validate(&$form, &$form_state) {

  if (!empty($form_state['values']['email'])
    && !empty($form_state['values']['email_confirm'])
    && trim( $form_state['values']['email']) !== trim($form_state['values']['email_confirm'])
  ) {
    form_set_error('email', 'The specified email do not match.');
    form_set_error('email_confirm', '');
  }

  if(!form_get_errors()) {
    $flights = wrwa_tracker_get_flights();

    $date = date_create_from_format('Y-m-d', $form_state['values']['date']);


    $flight_exist = FALSE;
    foreach ($flights as $flight) {

      if($flight['flightnumber'] == $form_state['values']['flight']
        && $flight['airlinecode'] ==  $form_state['values']['airline']
      && $flight['date'] == $date->format('m/d/Y')) {
        $flight_exist = TRUE;
      }

    }

    if(!$flight_exist) {
      form_set_error('', 'No such flight for selected airline at this date.');
    }
  }

}

/**
 * Submit callback for Subscribe.
 */
function wrwa_tracker_subscribe_form_submit(&$form, &$form_state) {

  $date_array = explode('-', $form_state['values']['date']);

    wrwa_tracker_request(
      'http://www.infax.com/webfids/OKC2/track_response.asp',
      array(
        'AirlineCode' => $form_state['values']['airline'],
        'Flightno' => $form_state['values']['flight'],
        'Cities' => '',
        'month' => $date_array[1],
        'day' => $date_array[2],
        'year' => $date_array[0],
        'Type' => 'D',//Departures
        'WantEmail' => 'True',
        'Email' => $form_state['values']['email'],
        'EmailVerify' => $form_state['values']['email_confirm'],
        'ShortLong' => $form_state['values']['type'],
      )
  );

}

/**
 * Ajax callback.
 */
function wrwa_tracker_subscribe_submit_ajax($form, $form_state) {

  if(form_get_errors()) {
    return $form;
  } else {
    $commands = array();

    $commands[] = ajax_command_replace(
      '.track-forms-wrapper',
      theme('wrwa_tracker_form_confirmation', array('message' => '
      Your flight is now being tracked. If you selected email updates, you will be notified via email the moment there is a change to your flight\'s status.
      <br>
      Thank you for using Trak-A-Flight!
      '))
    );
  }

  return array(
    '#type' => 'ajax',
    '#commands' => $commands,
  );

}