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
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>

    <div class="logo">
      <?php print render($content['field_airlines_logo']); ?>
    </div>

    <div class="info">

      <div class="item-phone">
        <span class="ss-icon ss-social-regular ss-phone"></span>
        <?php print render($content['field_airlines_telephone']); ?>
      </div>

      <div class="item-link">
        <span class="ss-icon ss-symbolicons-block ss-earth"></span>
        <?php print render($content['field_airlines_link']); ?>
      </div>
    </div>

    <?php if (isset($content['field_airlines_ad_gates'])): ?>
      <div class="item-gates">
        <span class="ss-icon ss-standard ss-clock"></span>
        <?php print render($content['field_airlines_ad_gates']); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($content['field_airlines_bag_claim'])): ?>
      <div class="item-bag">
        <span class="ss-icon ss-standard ss-briefcase"></span>
        <?php print render($content['field_airlines_bag_claim']); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($content['field_airlines_tc_hours'])): ?>
      <div class="item-ticket">
        <span class="ss-icon ss-symbolicons-block ss-ticket"></span>
        <?php print render($content['field_airlines_tc_hours']); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($content['field_ac_contacts_telephone'])): ?>
      <?php print render($content['field_ac_contacts_telephone']); ?>
    <?php endif; ?>


    <?php
    print render($content);
    ?>
  </div>
</div>
