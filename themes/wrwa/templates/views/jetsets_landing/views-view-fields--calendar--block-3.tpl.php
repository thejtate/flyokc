<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
$class = "style-a";
switch($fields['tid']->raw) {
  case WRWA_JETSET_STAGE2_TID:
    $class = "style-b";
    break;
  case WRWA_JETSET_STAGE3_TID:
    $class = "style-c";
    break;
}
?>

<a href="<?php print url('node/' . $fields['nid']->raw);?>" class="item">
  <span class="stage <?php print $class;?>"><?php print $fields['field_jset_event_stage']->content;?></span>
  <p>
    <i><?php print $fields['field_jset_event_date']->content;?></span></i>
    <strong><?php print $fields['title']->content;?></strong>
  </p>
</a>