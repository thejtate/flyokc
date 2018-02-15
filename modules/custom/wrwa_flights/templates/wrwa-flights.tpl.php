<?php
/**
 * @file Mobile render of flights.
 *
 * Available variables:
 * - $flights: Array fo flights info.
 * - $empty: empty message.
 */
?>

<div class="items">
  <?php if(!empty($flights)): ?>
    <?php foreach($flights as $delta => $flight): ?>

      <div class="item">
        <div class="title-top">

          <?php if($type == 'arrivals'): ?>
<!--            <h4>SAN</h4>-->
            <span>From <strong><?php print $flight['city'];?></strong></span>
          <?php else: ?>
            <h4>OKC</h4>
            <span>From <strong><?php print t('Oklahoma City, OK'); ?></strong></span>
          <?php endif; ?>

        </div>
        <span class="flight-number"><?php print $flight['flightnumber'];?></span>
        <div class="title-bottom">

          <?php if($type == 'arrivals'): ?>
            <span>To <strong><?php print t('Oklahoma City, OK'); ?></strong></span> <h4><?php print t('OKC'); ?></h4>
          <?php else: ?>
            <span>To <strong><?php print $flight['city'];?></strong></span>
            <!--            <h4>--><?php //print t('OKC'); ?><!--</h4>-->
          <?php endif; ?>


        </div>
        <div class="desc">
          <div class="left-part">
            <div class="img">
              <?php print($flight['airline']);?>
            </div>
            <?php // print $flight['track_link']?>
            <?php print !empty($text_track_links[$delta]) ? $text_track_links[$delta] : ''; ?>
          </div>
          <div class="right-part">
            <span class="time"><?php print !empty($flight['time']) ? $flight['time'] : '';?></span>
            <?php if(!empty($flight['remarks']) && $flight['remarks'] == 'DELAYED'): ?>
              <?php $status_class = 'style-b';?>
            <?php else: ?>
              <?php $status_class = 'style-a';?>
            <?php endif; ?>
            <span class="status <?php print $status_class;?>"><?php print !empty($flight['remarks']) ? $flight['remarks'] : ' - ';?></span>
            <span class="info">
              <?php print !empty($flight['gate']) ? 'GATE: <strong>' . $flight['gate'] . '</strong>' : '';?>
              <?php print !empty($flight['claim']) ? 'BAGS: <strong>' . $flight['claim'] . '</strong>' : '';?>
            </span>
          </div>
        </div>
      </div>


    <?php endforeach; ?>

  <?php else: ?>
    <div class="result-text">
      <p><?php print $empty;?></p>
    </div>

  <?php endif; ?>

</div>
