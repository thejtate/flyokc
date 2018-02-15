<?php
/**
 * @file
 * Map element template
 */
$is_popup = ($element->description_type == 'popup');
?>

<span <?php print $is_popup ? 'data-url="#desc-' . $element->nid . '"' : 'data-tooltip="#tooltip-' . $element->nid . '"'; ?> data-nid="<?php print($element->nid)?>" data-role="<?php print $element->role?>" class="<?php print $element->classes?>">
  <?php print !empty($element->icon_text) ? $element->icon_text : '';?>

  <?php if(!empty($element->edit_url) || !empty($element->delete_url)): ?>
    <span class="actions">
      <?php if(!empty($element->edit_url)): ?>
        <a href="<?php print $element->edit_url;?>" class="edit ss-icon ss-symbolicons-block ss-write"></a>
      <?php endif; ?>
      <?php if(!empty($element->delete_url)): ?>
        <a href="<?php print $element->delete_url;?>" class="delete ss-icon ss-symbolicons-block ss-trash"></a>
      <?php endif; ?>
    </span>
  <?php endif; ?>

  <?php if($is_popup): ?>
    <span class="tooltip pull-center" data-url="#desc-<?php print $element->nid;?>">
      <span class="tooltip-title"><?php print $element->title;?></span>
      <span  class="ss-icon">▻</span>
    </span>
  <?php endif; ?>

</span>


