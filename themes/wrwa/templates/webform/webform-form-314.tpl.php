<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 *
 * If a preview is enabled, these keys will be available on the preview page:
 * - $form['preview_message']: The preview message renderable.
 * - $form['preview']: A renderable representing the entire submission preview.
 */
?>
<div class="form form-volunteer">
  <?php
  // Print out the progress bar at the top of the page
  print drupal_render($form['progressbar']);

  // Print out the preview message if on the preview page.
  if (isset($form['preview_message'])) {
    print '<div class="messages warning">';
    print drupal_render($form['preview_message']);
    print '</div>';
  }
  ?>


  <div class="row">
    <div class="col col-md-8">
      <?php print drupal_render($form['submitted']['date']); ?>
      <div class="row">
        <div class="col-sm-4">
          <?php print drupal_render($form['submitted']['first_name']); ?>
        </div>
        <div class="col-sm-4">
          <?php print drupal_render($form['submitted']['middle_name']); ?>
        </div>
        <div class="col-sm-4">
          <?php print drupal_render($form['submitted']['last_name']); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <?php print drupal_render($form['submitted']['address']); ?>
        </div>
        <div class="col-sm-4">
          <?php print drupal_render($form['submitted']['zip']); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <?php print drupal_render($form['submitted']['phone']); ?>
        </div>
        <div class="col-sm-6">
          <?php print drupal_render($form['submitted']['mobile']); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <?php print drupal_render($form['submitted']['emergency_contact']); ?>
        </div>
        <div class="col-sm-6">
          <?php print drupal_render($form['submitted']['number']); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <?php print drupal_render($form['submitted']['email']); ?>
        </div>
        <div class="col-sm-6 field-birthday">
          <?php print drupal_render($form['submitted']['birthday']); ?>
        </div>
      </div>
      <?php print drupal_render($form['submitted']['occupation']); ?>
      <?php print drupal_render($form['submitted']['languages']); ?>
      <?php print drupal_render($form['submitted']['experience']); ?>
      <?php print drupal_render($form['submitted']['how_did_you_hear_about_us']); ?>
    </div>
    <div class="col col-md-4">
      <?php print drupal_render($form['submitted']['preferred_schedule']); ?>

      <?php print drupal_render($form['submitted']['weekday']); ?>
      <?php print drupal_render($form['submitted']['weekend']); ?>
      <?php print drupal_render($form['submitted']['thank_you']); ?>
      <br/>

      <?php print drupal_render_children($form); ?>
    </div>
  </div>
</div>
