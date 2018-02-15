<?php
/**
 * @file
 * Track forms template
 */

?>
<?php print theme('status_messages');?>
<div class="track-forms-wrapper clearfix text-style-a" id="track-forms">

    <div class="message">
        <?php print render($message);?>
    </div>

  <div class="back">
    <?php print l('Back to Trak A Flight', 'node/'. WRWA_TRACKER_NID, array('attributes' => array('class' => array('read-more', 'btn'))));?>
  </div>
</div>
