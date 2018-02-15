<?php

/**
 * @file
 * Default theme implementation for field collection items.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) field collection item label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-field-collection-item
 *   - field-collection-item-{field_name}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<?php
$title = (isset($content['field_air_cont_tel_fc_title_txt']['#items']) &&
  !empty($content['field_air_cont_tel_fc_title_txt']['#items'])) ?
  $content['field_air_cont_tel_fc_title_txt']['#items'][0]['value'] : '';

$phone = (isset($content['field_air_cont_tel_fc_tel_text']['#items']) &&
  !empty($content['field_air_cont_tel_fc_tel_text']['#items'])) ?
  $content['field_air_cont_tel_fc_tel_text']['#items'][0]['value'] : '';

?>

<?php if ($phone): ?>
  <a href="tel:<?php print $phone; ?>">
    <strong><?php print $title ? $title : $phone; ?></strong>
  </a>
<?php endif; ?>

<?php // print render($content); ?>