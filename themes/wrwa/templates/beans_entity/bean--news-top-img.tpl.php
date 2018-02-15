<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
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
$graph = (!empty($content['field_news_top_img_graph']) &&
  !empty($content['field_news_top_img_graph']['#items'])) ?
  $content['field_news_top_img_graph']['#items'][0]['safe_value'] : '';
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="content"<?php print $content_attributes; ?>>

    <div class="b-news-top site-container">
      <div class="ico">
        <?php print render($content['field_news_top_img_icon']); ?>
      </div>
      <div class="img img-title">
        <?php print render($content['field_news_top_img_title_img']); ?>
      </div>
      <div class="img mobile-only">
        <?php print render($content['field_news_top_img_bottom_img']); ?>
      </div>

      <?php if (!empty($graph)): ?>
        <div class="b-chart">
          <div class="chart-wrap">
            <div class="chart" data-data="<?php print $graph; ?>">
              <div class="chart-items">

              </div>
            </div>
            <div class="axis y">
              <span class="i"><span class="text">380,000</span></span>
              <span class="i"><span class="text">300,000</span></span>
              <span class="i"><span class="text">240,000</span></span>
            </div>
            <div class="axis x">
              <span class="i"><span class="text"><?php print t('JAN'); ?></span></span>
              <span class="i"><span class="text"><?php print t('FEB'); ?></span></span>
              <span class="i"><span class="text"><?php print t('MAR'); ?></span></span>
              <span class="i"><span class="text"><?php print t('APR'); ?></span></span>
              <span class="i"><span class="text"><?php print t('MAY'); ?></span></span>
              <span class="i"><span class="text"><?php print t('JUN'); ?></span></span>
              <span class="i"><span class="text"><?php print t('JUL'); ?></span></span>
              <span class="i"><span class="text"><?php print t('AUG'); ?></span></span>
              <span class="i"><span class="text"><?php print t('SEP'); ?></span></span>
              <span class="i"><span class="text"><?php print t('OCT'); ?></span></span>
              <span class="i"><span class="text"><?php print t('NOV'); ?></span></span>
              <span class="i"><span class="text"><?php print t('DEC'); ?></span></span>
            </div>
          </div>
          <div class="legend-wrapper">
            <div class="date">2016</div>
            <div class="date">2017</div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php //print render($content); ?>
  </div>
</div>