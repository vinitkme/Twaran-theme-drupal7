<?php

function twaran_responsive_js_alter(&$js) {
  if (isset($js['misc/jquery.js'])) {
    $js['misc/jquery.js']['data'] = drupal_get_path('theme', 'twaran_responsive') . '/bower_components/jquery/dist/jquery.js';
    $js['misc/jquery.js']['version'] = '2.1.4';
  }
}
function twaran_responsive_preprocess_page(&$variables) {
  $count = privatemsg_unread_count();
  if ($count || variable_get('privatemsg_no_messages_notification', 0)) {
    $variables['new_message_count'] = $count;
    $variables['new_messages'] = theme('privatemsg_new_block', array('count' => $count));
  }
  else {
    $variables['new_message_count'] = 0;
    $variables['new_messages'] = l('There is no new message, click to visit message page.', 'messages');
  }
// Convenience variables
  if (!empty($variables['page']['sidebar_left_full_one'])){
    $left = $variables['page']['sidebar_left_full_one'];
  }

  if (!empty($variables['page']['sidebar_right_full'])) {
    $right = $variables['page']['sidebar_right_full'];
  }

  // Dynamic sidebars
  if (!empty($left) && !empty($right)) {
  	$variables['main_grid_custom'] = 'large-6';
    $variables['sidebar_first_grid'] = 'large-3';
    $variables['sidebar_sec_grid'] = 'large-3';
  } elseif (empty($left) && !empty($right)) {
  	$variables['main_grid_custom'] = 'large-9';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = 'large-3';
  } elseif (!empty($left) && empty($right)) {
  	$variables['main_grid_custom'] = 'large-9';
    $variables['sidebar_first_grid'] = 'large-3';
    $variables['sidebar_sec_grid'] = '';
  } else {
  	$variables['main_grid_custom'] = 'large-12 grid-only';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = '';
  }
}