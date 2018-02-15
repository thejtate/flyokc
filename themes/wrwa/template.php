<?php
/**
 * @file
 *  Theme logic. Templates preprocess.
 */
define('WRWA_CURRENT_PROJECTS_NID', 39);
define('WRWA_CURRENT_NEWS_NID', 99);
define('WRWA_CURRENT_ART_LANDING_NID', 210);
define('WRWA_CURRENT_AIRPORT_TRUST_NID', 225);
define('WRWA_JET_SETS_LANDING_NID', 245);
define('WRWA_NEWS_ADVISORIES_NID', 291);
define('WRWA_NEWS_CONSTRUCTION_NID', 294);
define('WRWA_NEWS_EVENTS_NID', 295);
define('WRWA_NEWS_PRESS_NID', 296);
define('WRWA_NEWS_STATISTICS_NID', 297);
define('WRWA_NEWS_CITIES_SERVED_NONSTOP_MAP_NID', 313);
define('WRWA_NEWS_ALL_NID', 99);
define('WRWA_WEBFORM_VOLUNTEER_NID', 314);
define('WRWA_HOMEPAGE_NID', 2);
define('WRWA_ALERTS_NID', 102);
define('WRWA_NEWS_PASSENGER_TRAFFIC_NID', 908);

define('__THEME_PATH', drupal_get_path('theme', 'wrwa'));

/**
 * Implements template_preprocess_html().
 */
function wrwa_preprocess_html(&$vars) {
  //attach conditional js
  $head['html5'] = array(
    '#tag' => 'script',
    '#attributes' => array(
      'src' => drupal_get_path('theme', 'wrwa') . '/js/lib/html5.js',
    ),
    '#prefix' => '<!--[if (lt IE 9) & (!IEMobile)]>',
    '#suffix' => '</script><![endif]-->',
  );

  $head['viewport'] = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1',
    ),
  );

  $head['HandheldFriendly'] = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'HandheldFriendly',
      'content' => 'false',
    ),
  );

  foreach ($head as $name => $item) {
    drupal_add_html_head($item, $name);
  }


  $node = menu_get_object();
  if (!empty($node)) {
    $vars['classes_array'][] = 'page-' . str_replace('_', '-', $node->type);
    switch($node->type) {
      case '404':
        $vars['classes_array'][] = 'page-error';
        break;
      case 'flights':
        $vars['classes_array'][] = 'page-arrivals';
        break;
      case 'about_will_rogers':
        $vars['classes_array'][] = 'page-about';
        break;
      case 'rental_cars':
        $vars['classes_array'][] = 'page-airline-contacts';
        break;
      case 'jetsets_landing':
      case 'jet_sets_event':
        $vars['classes_array'][] = 'page-jetsets';
        break;
      case 'page_holder':
        if ($node->nid == WRWA_MAP_NID) {
          $vars['classes_array'][] = 'page-map';
        }
        break;
    }
  }
}

/**
 * Implements hook_preprocess().
 */
function wrwa_preprocess(&$vars, $hook) {
  //dsm($hook);
  if($hook == 'taxonomy_term') {
    //dsm($vars);
  }
}

/**
 * Implements hook_preprocess_page().
 */
function wrwa_preprocess_page(&$vars) {
//  dsm($vars);

  $content_classes = array('content-wrapper', 'site-container');
  $node = menu_get_object();

  $page_blocks = block_list('content_top');
  $block_bean_tabs = FALSE;
  foreach($page_blocks as $key => $page_block){
    if ("bean_tabs" == substr($key, 0, 9)) {
      $block_bean_tabs = TRUE;
    }
  }

  if (!empty($node)) {
    if (!empty($node->field_common_hide_top_img)) {
      $hide_top_img = _wrwa_get_rows_from_node($node, array('field_common_hide_top_img'));
      $hide_top_img = !empty($hide_top_img['field_common_hide_top_img']) ? TRUE : FALSE;
    }

    //top images for rendering in page template
    if(empty($hide_top_img) && !empty($node->field_common_top_image) && !$block_bean_tabs) {
      $vars['top_image'] = field_view_field('node', $node, 'field_common_top_image', 'default');
    }
    if(empty($hide_top_img) && !empty($node->field_common_mob_top_image) && !$block_bean_tabs) {
      $vars['top_mobile_image'] = field_view_field('node', $node, 'field_common_mob_top_image', 'default');
    }

    if ($block_bean_tabs) {
      $vars['title'] = '';
    }
    else {
      switch($node->type) {
        case 'page_holder':
          $vars['title'] = '';
          if ($node->nid == WRWA_MAP_NID) {
            drupal_add_js(drupal_get_path('theme', 'wrwa') . '/js/map.js');
            $content_classes = array('content-wrapper');
            $vars['title'] = '';
          }
        break;
        case '404':
          $vars['title'] = '';
          break;
        case 'news':
          $vars['title'] = t('News');

          if ($node->nid == WRWA_NEWS_PASSENGER_TRAFFIC_NID) {
            $vars['title'] = '';
            $bg_image = !empty($node->field_common_top_image) ?
              file_create_url($node->field_common_top_image[LANGUAGE_NONE][0]['uri']) : '';
            $vars['top_image'] = '<div class="page-bg" style="background-image: url(\''. $bg_image. '\')"></div>';
            $vars['top_mobile_image'] = '';

            drupal_add_js(__THEME_PATH . '/js/lib/d3.v3.min.js', 'file');
            drupal_add_js(__THEME_PATH . '/js/weather.js', 'file');
          }
          break;
        case 'alerts':
          $vars['title'] = t('Alerts & Advisories');
          break;
        case 'projects':
          $vars['title'] = t('CURRENT PROJECTS');
          if (empty($vars['top_image'])){
            $node_art = node_load(WRWA_CURRENT_PROJECTS_NID);
            $vars['top_image'] = field_view_field('node', $node_art, 'field_common_top_image', 'default');
          }
          break;
        case 'art_project':
          $vars['title'] = t('ART AT WILL');
          if (empty($vars['top_image'])){
            $node_art = node_load(WRWA_CURRENT_ART_LANDING_NID);
            $vars['top_image'] = field_view_field('node', $node_art, 'field_common_top_image', 'default');
          }
          break;
        case 'airport_trust_member':
          $vars['title'] = t('AIRPORT TRUST');
          if (empty($vars['top_image'])){
            $node_art = node_load(WRWA_CURRENT_AIRPORT_TRUST_NID);
            $vars['top_image'] = field_view_field('node', $node_art, 'field_common_top_image', 'default');
          }
          break;
        case 'jet_sets_event':
          $vars['title'] = t('Jet Sets');
          break;
      }
    }
  }

  if(in_array('page__map', $vars['theme_hook_suggestions'])) {
    drupal_add_js(drupal_get_path('theme', 'wrwa') . '/js/map.js');
    $content_classes = array('content-wrapper');
    $vars['title'] = '';
  }
  $vars['content_classes'] = implode(' ', $content_classes);

  $footer_menu_block = block_load('menu_block', '2');
  $footer_menu = _block_get_renderable_array(_block_render_blocks(array($footer_menu_block)));
  if ($footer_menu) {
    $footer_menu['menu_block_2']['#content']['#theme_wrappers'][0] = 'menu_tree__menu_footer__mobile';
    $vars['footer_menu'] = $footer_menu;
  }

  $view = views_get_page_view();
  if (!empty($view) && is_object($view)) {
    if ($view->name == 'search' && $view->current_display == 'page') {
      $vars['title'] = '';
    }
  }
}

/**
 * Implements hook_preprocess_node().
 */
function wrwa_preprocess_node(&$vars) {
  $node = $vars['node'];
//  kpr($node->type);
  $vars['theme_hook_suggestions'][] = 'node' . '__' . $vars['view_mode'];
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];
  //hide top images. We will display it in the page template
  if(!empty($vars['content']['field_common_top_image'])) {
    hide($vars['content']['field_common_top_image']);
  }
  if(!empty($vars['content']['field_common_mob_top_image'])) {
    hide($vars['content']['field_common_mob_top_image']);
  }
  if(isset($vars['content']['field_search_keywords']) && !empty($vars['content']['field_search_keywords'])) {
    hide($vars['content']['field_search_keywords']);
  }
  if(!empty($vars['content']['field_common_hide_top_img'])) {
    hide($vars['content']['field_common_hide_top_img']);
  }

  switch($node->type) {
    case 'home_page':
      $vars['content']['jet_sets_block'] = wrwa_get_rendered_block('views', 'homepage_jet_sets-block_1');

      $vars['tablet_gallery'] = field_view_field('node', $node, 'field_home_map_gallery',
        array(
          'label'=>'hidden',
          'type' => 'field_collection_fields',
          'settings' => array('view_mode' => 'tablet'))
      );
      $vars['tablet_gallery_2'] = field_view_field('node', $node, 'field_home_map_gallery_2',
        array(
          'label'=>'hidden',
          'type' => 'field_collection_fields',
          'settings' => array('view_mode' => 'tablet'))
      );
      $vars['mobile_gallery'] = field_view_field('node', $node, 'field_home_map_gallery',
        array(
          'label'=>'hidden',
          'type' => 'field_collection_fields',
          'settings' => array('view_mode' => 'mobile'))
      );

      // Nonstop gallery
      $vars['mobile_nonstop_slide_1'] = field_view_field('node', $node, 'field_home_nonstop_slide_1',
        array(
          'label'=>'hidden',
          'type' => 'field_collection_fields',
          'settings' => array('view_mode' => 'mobile'))
      );
      $vars['mobile_nonstop_slide_2'] = field_view_field('node', $node, 'field_home_nonstop_slide_3',
        array(
          'label'=>'hidden',
          'type' => 'field_collection_fields',
          'settings' => array('view_mode' => 'mobile'))
      );
      $vars['mobile_nonstop_slide_3'] = field_view_field('node', $node, 'field_home_nonstop_slide_5',
        array(
          'label'=>'hidden',
          'type' => 'field_collection_fields',
          'settings' => array('view_mode' => 'mobile'))
      );

//      $vars['content']['nonstop_block'] = wrwa_get_rendered_block('views', 'nonstop-block');

      $jet_sets_result = views_get_view_result('homepage_jet_sets', 'block_1');
      if (empty($jet_sets_result) && !empty($vars['content']['field_home_bot_title'])) {
        $vars['content']['field_home_bot_title']['#access'] = FALSE;
      }
      break;
    case 'fellow_airports':
      if (isset($vars['content']['field_fellow_airports_field_coll']) &&
        !empty($vars['content']['field_fellow_airports_field_coll']['#items'])) {
        $title_row = _wrwa_rows_from_field_collection($vars['content']['field_fellow_airports_field_coll']['#items'], array('field_fellow_airports_name_txt'));
        $items = array();
        foreach ($title_row as $item) {
          $title_var = isset($item['field_fellow_airports_name_txt']) ?
            $item['field_fellow_airports_name_txt'] : '';
          $items['items'][] = '<a href="#"><strong>'. $title_var . '</strong></a>';
        }
        $vars['title_list'] = theme('item_list', $items);
      }
      break;
    case 'airlines':
      if (isset($vars['content']['field_airlines']) && !empty($vars['content']['field_airlines']['#items'])) {
        $logo_rows = _wrwa_rows_from_field_collection($vars['content']['field_airlines']['#items'], array('field_airlines_logo'));
        $items = array();

        foreach ($logo_rows as $image_row) {
          $image = (isset($image_row['field_airlines_logo']) && !empty($image_row['field_airlines_logo'])) ?
            $image_row['field_airlines_logo'] : '';
          if ($image) {
            $params = array(
              'style_name' => 'airlines__logo',
              'path' => $image['uri'],
              'alt' => $image['alt'],
              'title' => $image['title'],
              'attributes' => array('class' => array('image')),
              'getsize' => FALSE,
            );
            $items['items'][] = '<a href="#">' . theme('image_style', $params) . '</a>';
          }
        }
        $vars['logo_list'] = theme('item_list', $items);
      }
      break;
    case 'projects':
      $vars['back_button'] = l(t('BACK TO PROJECTS'), 'node/' . WRWA_CURRENT_PROJECTS_NID, array('attributes' => array('class' => array('btn'))));
      break;
    case 'news':

      $vars['news_file_link'] = _wrwa_get_news_file_link($vars);
      // news_tid => nid
      $back_button_url_map = array(
        13 => WRWA_NEWS_ADVISORIES_NID,
        14 => WRWA_NEWS_CONSTRUCTION_NID,
        15 => WRWA_NEWS_EVENTS_NID,
        16 => WRWA_NEWS_PRESS_NID,
        17 => WRWA_NEWS_STATISTICS_NID,
        'default' => WRWA_NEWS_ALL_NID,
      );

      $news_type_tid = (isset($vars['content']['field_news_taxonomy_term_ref']) &&
        !empty($vars['content']['field_news_taxonomy_term_ref']['#items'])) ?
        $vars['content']['field_news_taxonomy_term_ref']['#items'][0]['tid'] : 'default';
      if ($news_type_tid == WRWA_NEWS_PUBLICATION_TID) {
        $vars['show_file'] = TRUE;
      }
      elseif (array_key_exists($news_type_tid, $back_button_url_map) &&
        !empty($back_button_url_map[$news_type_tid])) {
        $vars['back_button'] = l(t('BACK TO PRESS'), 'node/' . $back_button_url_map[$news_type_tid], array('attributes' => array('class' => array('btn'))));
      }

      if ($vars['nid'] == WRWA_NEWS_PASSENGER_TRAFFIC_NID) {
        $vars['back_button'] = '';
      }
      break;
    case 'alerts':
      $vars['back_button'] = l(t('Pilot alerts'), 'node/' . WRWA_ALERTS_NID, array('attributes' => array('class' => array('btn'))));

      if (!empty($vars['field_news_file'])) {
        $vars['news_file_link'] = '<p class="link-wrap">' .  l('Click here to view report.', file_create_url($vars['field_news_file'][0]['uri'])) . '</p>';
      }
      break;
    case 'art_project':
      $vars['back_button'] = l(t('BACK TO ART'), 'node/' . WRWA_CURRENT_ART_LANDING_NID, array('attributes' => array('class' => array('btn'))));
      break;
    case 'airport_trust_member':
      $vars['back_button'] = l(t('BACK'), 'node/' . WRWA_CURRENT_AIRPORT_TRUST_NID, array('attributes' => array('class' => array('btn'))));
      break;
    case 'page_with_list_of_blocks_sidebar':
      if (isset($vars['content']['field_lbs_items']) &&
        !empty($vars['content']['field_lbs_items']['#items'])) {
        $title_row = _wrwa_rows_from_field_collection($vars['content']['field_lbs_items']['#items'], array('field_lbs_items_menu_item'));
        $items = array();
        foreach ($title_row as $item) {
          $title_var = isset($item['field_lbs_items_menu_item']) ?
            $item['field_lbs_items_menu_item'] : '';
          $items['items'][] = '<a href="#"><strong>'. $title_var . '</strong></a>';
        }
        $vars['title_list'] = theme('item_list', $items);
      }
      break;
    case 'jetsets_landing':
      $vars['content']['calendar'] = array('#markup' => wrwa_get_rendered_block('views', 'calendar-block_1'));
      $vars['content']['stage_terms'] = array('#markup' => wrwa_get_rendered_block('views', 'stage_terms-block'));
      $vars['content']['events'] = array('#markup' => wrwa_get_rendered_block('views', 'calendar-block_3'));
      break;
    case 'jet_sets_event':
      $vars['back_button'] = l(t('BACK'), 'node/' . WRWA_JET_SETS_LANDING_NID, array('attributes' => array('class' => array('btn'))));
      $stage_class_map = array(
        WRWA_JETSET_STAGE1_TID => 'style-a',
        WRWA_JETSET_STAGE2_TID => 'style-b',
        WRWA_JETSET_STAGE3_TID => 'style-c',
      );
      if (isset($vars['content']['field_jset_event_stage']) &&
        !empty($vars['content']['field_jset_event_stage']['#items'])) {
        $tid = $vars['content']['field_jset_event_stage']['#items'][0]['tid'];
        $vars['stage_class'] = array_key_exists($tid, $stage_class_map) ? $stage_class_map[$tid] : '';
      }
      break;
    case 'default_page':
      $fields= _wrwa_get_rows_from_node($node, array('field_full_width'));
      if (isset($fields['field_full_width']) && $fields['field_full_width']) {
        hide($vars['content']['field_full_width']);
        $vars['classes_array'][] = 'full-block';
      }
      switch ($node->nid) {
        case WRWA_NEWS_CITIES_SERVED_NONSTOP_MAP_NID:
          $vars['body_prefix'] = '';
          $vars['body_suffix'] = '';
          break;
        default:
          $vars['body_prefix'] = '<div class="text-style-a">';
          $vars['body_suffix'] = '</div>';
          break;
      }
      break;
  }
}
/**
 * Get rows from node.
 *
 * @param $node
 * @param $field_array
 * @return array|void
 */
function _wrwa_get_rows_from_node($node, $field_array) {

  if (!is_object($node)) {
    return;
  }

  try {
    $node_wrapper = entity_metadata_wrapper('node', $node);
    $properties = $node_wrapper->getPropertyInfo();
    $rows = array();

    foreach ($field_array as $field) {
      if (array_key_exists($field, $properties)) {
        $rows[$field] = $node_wrapper->$field->value();
      }
    }
  }
  catch (EntityMetadataWrapperException $exc) {
    watchdog('wrwa', 'See ' . __FUNCTION__ . '() <pre>' . $exc->getTraceAsString() . '</pre>', NULL, WATCHDOG_ERROR);
  }

  return $rows;
}

/**
 * Implements hook_preprocess_field().
 */
function wrwa_preprocess_field(&$vars) {
  $view_mode = !empty($vars['element']['#view_mode']) ? $vars['element']['#view_mode'] : '';

  switch($vars['element']['#field_name']) {
    case 'body':
      if(!empty($vars['element']['#object']->type) && $vars['element']['#object']->type == '404') {
        $vars['classes_array'][] = 'desc';
      }
      break;
    case 'field_common_top_image':
      $vars['classes_array'][] = 'top-image';
      foreach ($vars['items'] as &$item) {
        $item['#prefix'] = '<div class="img">';
        $item['#suffix'] = '</div>';
      }
      break;
    case 'field_common_mob_top_image':
      $vars['classes_array'][] = 'mobile-img';
      break;
    case 'field_pws_email_email':
      $vars['classes_array'][] = 'mobile-img';
      break;
    case 'field_tabs_links':
      $items = !empty($vars['items']) ? $vars['items'] : array();
      $path = isset($_GET['q']) ? $_GET['q'] : '<front>';
      $path = url($path, array('absolute' => TRUE));
      foreach ($items as $key => $item) {
        $url = !empty($item['#element']['url']) ? $item['#element']['url'] : '';

        if ($url && ($path == $url)) {
          $vars['items'][$key]['#element']['attributes']['class'] = 'active';
        }
      }
      break;
    case 'field_home_map_gallery':
    case 'field_home_map_gallery_2':
    case 'field_home_map_gallery_3':
      $vars['theme_hook_suggestions'][] = 'field__field_home_map_gallery__home_page';

      if ($vars['element']['#field_name'] == 'field_home_map_gallery_2') {
        $vars['slider_id'] = 'slider-2';

        if ($view_mode == '_custom_display') {
          $fc_item = current($vars['items'][0]['entity']['field_collection_item']);
          $fc_item_view_mode = !empty($fc_item['#view_mode']) ? $fc_item['#view_mode'] : '';

          if ($fc_item_view_mode == 'tablet') {
            $vars['slider_id'] = 'slider-6';
            $vars['slider_class'] = 'gallery-slider-tablet';
          }
        }
      }
      elseif ($vars['element']['#field_name'] == 'field_home_map_gallery_3') {
        $vars['slider_id'] = 'slider-3';
      }
      elseif ($vars['element']['#field_name'] == 'field_home_map_gallery') {
        if ($view_mode == '_custom_display') {
          $fc_item = current($vars['items'][0]['entity']['field_collection_item']);
          $fc_item_view_mode = !empty($fc_item['#view_mode']) ? $fc_item['#view_mode'] : '';

          if ($fc_item_view_mode == 'tablet') {
            $vars['slider_id'] = 'slider-5';
            $vars['slider_class'] = 'gallery-slider-tablet';
          }
          elseif ($fc_item_view_mode == 'mobile') {
            $vars['slider_id'] = 'slider-4';
            $vars['slider_class'] = 'gallery-slider-mobile';
          }
        }
      }

      if (!empty($vars['element']['#items'])) {
        $display_seconds = _wrwa_rows_from_field_collection($vars['element']['#items'],
          array('field_home_m_gallery_disp_sec'));

        if (!empty($display_seconds) && is_array($display_seconds)) {
          $vars['display_seconds'] = array();
          foreach ($display_seconds as $key => $row) {
            if (!empty($row['field_home_m_gallery_disp_sec'])) {
              $vars['display_seconds'][$key] = $row['field_home_m_gallery_disp_sec'];
            }
          }
        }
      }
      break;
    case 'field_home_nc_city':
    case 'field_home_nc_link':
    case 'field_home_nc_img':
    case 'field_home_nc_airline':
      $vars['theme_hook_suggestions'][] = 'field__nowrap';
      break;
    case 'field_home_nonstop_slide_1':
    case 'field_home_nonstop_slide_2':
    case 'field_home_nonstop_slide_3':
    case 'field_home_nonstop_slide_4':
    case 'field_home_nonstop_slide_5':
    case 'field_home_nonstop_slide_6':
      $vars['theme_hook_suggestions'][] = 'field__field_home_nonstop_slide_1';

      if ($view_mode == '_custom_display') {
        $fc_item = current($vars['items'][0]['entity']['field_collection_item']);
        $fc_item_view_mode = !empty($fc_item['#view_mode']) ? $fc_item['#view_mode'] : '';
        $vars['theme_hook_suggestions'][] = 'field__field_home_nonstop_slide_1__' . $fc_item_view_mode;

        if ($fc_item_view_mode == 'mobile') {
          $parent_node = !empty($vars['element']['#object']) ? $vars['element']['#object'] : '';
          $slider_pair = array(
            'field_home_nonstop_slide_1' => 'field_home_nonstop_slide_2',
            'field_home_nonstop_slide_3' => 'field_home_nonstop_slide_4',
            'field_home_nonstop_slide_5' => 'field_home_nonstop_slide_6',
          );

          if (!empty($parent_node)) {
            if (array_key_exists($vars['element']['#field_name'], $slider_pair)) {
              $mobile_nonstop_slide_2 = field_view_field('node', $parent_node, $slider_pair[$vars['element']['#field_name']],
                array(
                  'label'=>'hidden',
                  'type' => 'field_collection_fields',
                  'settings' => array('view_mode' => 'mobile'))
              );
              $mobile_nonstop_slide_2 = !empty($mobile_nonstop_slide_2) ? $mobile_nonstop_slide_2 : array();
              $slide_2_elements = element_children($mobile_nonstop_slide_2);
              foreach($slide_2_elements as $key) {
                $vars['items'][] = $mobile_nonstop_slide_2[$key];
              }
            }
          }
        }
      }
      break;
  }

}

/**
 * Implements hook_form_alter().
 */
function wrwa_form_alter(&$form, $form_state, $form_id) {

  switch($form_id) {
    case 'search_block_form':
//      $form['search_block_form']['#attributes']['placeholder'] = t('Find what you’re looking for');
      break;
    case 'wrwa_flights_form':
      $form['clear']['#attributes']['class'][] = 'clear-filter';
      $form['status']['#attributes']['class'][] = 'style-a';
      wrwa_wrap_item($form['submit'], 'btn-wrap style-c');
      wrwa_wrap_item($form['status'], 'form-item form-type-select style-a');
      wrwa_wrap_item($form['clear'], 'clear-wrap');
      $form['output_type']['#after_build'][] = 'wrwa_flights_output_type_afterbuild';
      break;
    case 'views_exposed_form':
      if (($form_state['view']->name == 'news') || ($form_state['view']->name == 'airport_trust_meeting_agendas')) {
        if (isset($form['date_filter'])) {
          $form['date_filter']['value']['#attributes'] = array('class' => array('style-a'));
        }
      }
      break;
    case 'webform_client_form_' . WRWA_WEBFORM_VOLUNTEER_NID:
      $form['actions']['submit']['#prefix'] = '<div class="btn-wrap style-c">';
      $form['actions']['submit']['#suffix'] = '</div>';

      if (isset($form['submitted']['date'])) {
        $form['submitted']['date']['#theme_wrappers'][] = 'wrwa__volunteer_webform_date';
      }
      break;
  }
}

/**
 * Implements hook_preprocess_views_view().
 */
function wrwa_preprocess_views_view(&$vars) {
  switch ($vars['name']) {
    case "homepage_jet_sets":
      if ($vars['display_id'] == "block_1") {
        if (empty($vars['rows'])) {
          $home_node = node_load(WRWA_HOMEPAGE_NID);
          $jet_sets_default = field_view_field('node', $home_node, 'field_home_bot_default',
            array('label'=>'hidden',));
          if (!empty($jet_sets_default)) {
            $vars['empty'] = drupal_render($jet_sets_default);
          }
        }
      }
      break;
  }
}

function wrwa_flights_output_type_afterbuild($element) {

  $children = element_children($element);
  //dsm($children);
  foreach ($children as $name) {
    $element[$name]['#attributes']['class'][] = $name;
  }

  return $element;
}

/**
* Add wrapper for Rander Array element in prefix and suffix.
**/
function wrwa_wrap_item(&$element, $classes, $tag = 'div') {
  if (!empty($element)) {
    $element['#prefix'] = '<' . $tag . (!empty($classes) ? ' class="' . $classes . '">' : '>') . (array_key_exists('#prefix', $element) ? $element['#prefix'] : '');
    $element['#suffix'] = (array_key_exists('#suffix', $element) ? $element['#suffix'] : '') . '</'. $tag . '>';
  }
}

/**
 * Get full block html with contextual links.
 *
 * @param $module
 *   Name of the module that implements the block to load.
 * @param $delta
 *   Unique ID of the block within the context of $module. Pass NULL to return
 *   an empty block object for $module.
 *
 * @return string Block html
 */
function wrwa_get_rendered_block($module, $delta) {
  $block = block_load($module, $delta);
  $render_block = _block_render_blocks(array($block));
  $render_block_array = _block_get_renderable_array($render_block);
  return !empty($block) ? drupal_render($render_block_array) : '';
}

/**
 * Creates a simple text rows array from a field collections, to be used in a
 * field_preprocess function.
 *
 * @param $items
 *   An array of variables to pass to the theme template.
 *
 * @param $field_array
 *   Array of fields to be turned into rows in the field collection.
 * @return array
 */
function _wrwa_rows_from_field_collection($items, $field_array) {
  $rows = array();
  foreach($items as $key => $item) {
    $entity_id = $item['value'];
    $entity = field_collection_item_load($entity_id);
    try{
      $wrapper = entity_metadata_wrapper('field_collection_item', $entity);
      $row = array();
      foreach($field_array as $field){
        $row[$field] = $wrapper->$field->value();
      }
      $rows[] = $row;
    }
    catch (EntityMetadataWrapperException $exc) {
      watchdog('wrwa', 'See ' . __FUNCTION__ . '() <pre>' . $exc->getTraceAsString() . '</pre>', NULL, WATCHDOG_ERROR);
    }
  }

  return $rows;
}

/**
 * Implements theme_date_nav_title()
 * Theme the calendar title.
 */
function wrwa_date_nav_title($params) {
  $title  = '';
  $granularity = $params['granularity'];
  $view = $params['view'];
  $date_info = $view->date_info;
  $link = !empty($params['link']) ? $params['link'] : FALSE;
  $format = !empty($params['format']) ? $params['format'] : NULL;
  $format_with_year = variable_get('date_views_' . $granularity . '_format_with_year', 'l, F j, Y');
  $format_without_year = variable_get('date_views_' . $granularity . '_format_without_year', 'l, F j');
  switch ($granularity) {
    case 'year':
      $title = $date_info->year;
      $date_arg = $date_info->year;
      break;

    case 'month':
      $format = !empty($format) ? $format : (empty($date_info->mini) ? $format_with_year : $format_without_year);
      $title = date_format_date($date_info->min_date, 'custom', 'F Y');
      $date_arg = $date_info->year . '-' . date_pad($date_info->month);
      break;

    case 'day':
      $format = !empty($format) ? $format : (empty($date_info->mini) ? $format_with_year : $format_without_year);
      $title = date_format_date($date_info->min_date, 'custom', $format);
      $date_arg = $date_info->year;
      $date_arg .= '-';
      $date_arg .= date_pad($date_info->month);
      $date_arg .= '-';
      $date_arg .= date_pad($date_info->day);
      break;

    case 'week':
      $format = !empty($format) ? $format : (empty($date_info->mini) ? $format_with_year : $format_without_year);
      $title = t('Week of @date', array(
        '@date' => date_format_date($date_info->min_date, 'custom', $format),
      ));
      $date_arg = $date_info->year . '-W' . date_pad($date_info->week);
      break;
  }
  return $title;
}

function wrwa_menu_tree__menu_footer__mobile($vars) {
  return '<ul class="menu mobile-menu">' . $vars['tree'] . '</ul>';
}

/**
 * Implements hook_theme().
 */
function wrwa_theme() {
  return array(
    'wrwa__volunteer_webform_date' => array(
      'render element' => 'element',
    )
  );
}

/**
 * Reorder the dates to m/d/y
 */
function wrwa_wrwa__volunteer_webform_date($variables) {
  $element = $variables['element'];
  $element['#wrapper_attributes']['class'][] = 'webform-container-inline';

  $output = '<div ' . drupal_attributes($element['#wrapper_attributes']) . '>' . "\n";
  $output .= ' ' . theme('form_element_label', $variables);

//Save the data from the array into variables.
  $day = $element['day'];
  $month = $element['month'];
  $year = $element['year'];

//Remove these keys from the array.
  unset($element['day']);
  unset($element['month']);
  unset($element['year']);

//Re-add the data to the array in the correct order.
  $element['month'] = $month;
  $element['day'] = $day;
  $element['year'] = $year;

  $element['year']['#attributes']['class'] = array('year');
  $element['month']['#attributes']['class'] = array('month');
  $element['day']['#attributes']['class'] = array('day');

// Add error classes to all items within the element.
  if (form_get_error($element)) {
    $element['year']['#attributes']['class'][] = 'error';
    $element['month']['#attributes']['class'][] = 'error';
    $element['day']['#attributes']['class'][] = 'error';
  }

  $class = array('webform-container-inline');

// Add the JavaScript calendar if available (provided by Date module package).
  if (!empty($element['#datepicker'])) {
    $class[] = 'webform-datepicker';
    $calendar_class = array('webform-calendar');
    if ($element['#start_date']) {
      $calendar_class[] = 'webform-calendar-start-' . $element['#start_date'];
    }
    if ($element['#end_date']) {
      $calendar_class[] = 'webform-calendar-end-' . $element['#end_date'];
    }
    $calendar_class[] ='webform-calendar-day-' . variable_get('date_first_day', 0);

    $calendar_options = array(
      'component' => $element['#webform_component'],
      'calendar_classes' => $calendar_class
    );
    $calendar = theme('webform_calendar', $calendar_options);
  }

  $output .= '<div class="' . implode(' ', $class) . '">';
  $output .= drupal_render_children($element);
  $output .= isset($calendar) ? $calendar : '';
  $output .= '</div>';
  $output .= "</div>\n";

  return $output;
}

/**
 * Prepeare html for news file link.
 *
 * @param $vars
 * @return string
 */
function _wrwa_get_news_file_link($vars) {

  $output = '';

  if(!empty($vars['field_news_file'][0]['uri'])) {
    switch ($vars['field_news_taxonomy_term_ref'][0]['taxonomy_term']->tid){
      case WRWA_NEWS_PRESS_TID:
      $output = '<p class="link-wrap">' .  l('Click here to read more.', file_create_url($vars['field_news_file'][0]['uri'])) . '</p>';
      break;
      case WRWA_NEWS_ADVISORIES_TID:
      case WRWA_NEWS_STATISTIC_TID:
        $output = '<p class="link-wrap">' .  l('Click here to view report.', file_create_url($vars['field_news_file'][0]['uri'])) . '</p>';
        break;
    }
  }

  return $output;
}

/**
 * Implements hook_preprocess_block().
 */
function wrwa_preprocess_block(&$vars) {
  $block_module = !empty($vars['block']->module) ? $vars['block']->module : '';

  if ($block_module == 'bean') {
    $beans = $vars['elements']['bean'];
    $bean_keys = element_children($beans);
    $bean = $beans[reset($bean_keys)];
    $block = $vars['block'];
    $delta = !empty($block->delta) ? $block->delta : '';

    $vars['classes_array'][] = drupal_html_class('block-bean-' . $bean['#bundle']);
    $vars['theme_hook_suggestions'][] = 'block__bean__' . $bean['#bundle'];

    switch ($bean['#bundle']) {
      case 'tabs':
        if (user_access('edit any tabs bean')) {
          $vars['tab_edit_link'] = l(t('Edit'), '/block/' . $delta . '/edit', array('query' => array(drupal_get_destination())));
        }
        break;
    }
  }
}

/**
 * Implements template_preprocess_entity().
 */
function wrwa_preprocess_entity(&$vars, $hook) {
  $function = 'wrwa_preprocess_' . $vars['entity_type'];
  if (function_exists($function)) {
    $function($vars, $hook);
  }
}

/**
 * Field Collection-specific implementation of template_preprocess_entity().
 */
function wrwa_preprocess_field_collection_item(&$vars) {
  $bundle = !empty($vars['elements']['#bundle']) ? $vars['elements']['#bundle'] : '';

  switch ($bundle) {
    case 'field_home_nonstop_slide_1':
    case 'field_home_nonstop_slide_2':
    case 'field_home_nonstop_slide_3':
    case 'field_home_nonstop_slide_4':
    case 'field_home_nonstop_slide_5':
    case 'field_home_nonstop_slide_6':
      $vars['theme_hook_suggestions'][] = 'field_collection_item__field_home_nonstop_slide_1';
      break;
    case 'field_home_map_gallery':
    case 'field_home_map_gallery_2':
      if ($vars['view_mode'] == 'full') {
        $vars['content']['field_home_m_gallery_img_tab']['#access'] = FALSE;
        $vars['content']['field_home_m_gallery_img_mob']['#access'] = FALSE;
      }
      elseif ($vars['view_mode'] == 'tablet') {
        $vars['content']['field_home_m_gallery_image']['#access'] = FALSE;
        $vars['content']['field_home_m_gallery_img_mob']['#access'] = FALSE;
      }
      elseif ($vars['view_mode'] == 'mobile') {
        $vars['content']['field_home_m_gallery_image']['#access'] = FALSE;
        $vars['content']['field_home_m_gallery_img_tab']['#access'] = FALSE;
      }
      break;
  }
}