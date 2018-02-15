<?php
/**
 * @file Mobile render of flights.
 *
 * Available variables:
 * - $flights: Array fo flights info.
 * - $empty: empty message.
 */
?>

<div class="flights-list-mobile">
  <?php if(!empty($flights)): ?>
    <?php foreach($flights as $delta => $flight): ?>


      <div class="item">
        <div class="logo">
          <?php print($flight['airline']);?>
        </div>
        <?php if(!empty($flight['city'])): ?>
          <p><?php print t('From'); ?>: <?php print $flight['city'];?></p>
        <?php endif; ?>
        <p>
          <?php print t('Arriving'); ?>: <?php print !empty($flight['time']) ? $flight['time'] : '';?> - <?php print !empty($flight['gate']) ? 'Gate:' . $flight['gate'] : '';?><?php print !empty($flight['claim']) ? ' Bags:' . $flight['claim'] : '';?>
        </p>
        <p><strong><?php print t('Status'); ?>:  <?php print !empty($flight['remarks']) ? $flight['remarks'] : ' - ';?></strong></p>
        <?php if(!empty($flight['city'])): ?>
          <span class="number"><?php print $flight['flightnumber'];?></span>
        <?php endif; ?>
        <?php print !empty($flight['track_link']) ? $flight['track_link'] : ''; ?>
      </div>
    <?php endforeach; ?>
  <?php else: ?>

    <div class="item">
      <p><?php print $empty;?></p>
    </div>

  <?php endif; ?>

</div>
