<?php
/**
 * @file Mobile render of flights.
 *
 * Available variables:
 * - $flights: Array fo flights info.
 * - $empty: empty message.
 */
//dsm($form);
?>
<div class="form-item form form-filter">
  <?php print render($form['airline']);?>
  <?php print render($form['location']);?>
  <?php print render($form['number']);?>
  <?php print render($form['submit']);?>
</div>
<div class="filter-items">
  <?php print render($form['status']);?>
  <div class="tags">
    <div class="tags-wrap">

    </div>
    <?php print render($form['clear']);?>
  </div>
  <div class="view-type">
    <?php print render($form['output_type']);?>
  </div>
</div>

<?php print drupal_render_children($form); ?>
