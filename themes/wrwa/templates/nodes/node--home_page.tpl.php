<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php
$alert_type = (!empty($content['field_home_alert_type']) && !empty($content['field_home_alert_type']['#items'])) ?
  $content['field_home_alert_type']['#items'][0]['value'] : '';
?>
<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>

  <section class="section-wrapper section-slider flexslider full-block">
    <?php print render($content['field_home_top_slides']); ?>
    <?php if (!empty($content['field_home_show_allert']['#items'][0]['value'])): ?>

      <?php if ($alert_type == 'text_only_alert'): ?>
        <div class="b-travel-alert block-wrapper">
          <div class="left-part">
            <?php print render($content['field_home_alert_title']); ?>
          </div>
          <div class="right-part">
            <?php print render($content['field_home_alert_description']); ?>
          </div>
          <a href="" class="close"></a>
        </div>
      <?php elseif ($alert_type == 'alert_with_button'): ?>
        <div class="b-travel-alert style-a block-wrapper">
          <div class="text-wrap">
            <div class="date">
              <?php print render($content['field_home_alert_title']); ?>
            </div>
            <div class="text">
              <?php print render($content['field_home_alert_description']); ?>
            </div>
          </div>
          <div class="btn-wrap style-e">
            <?php print render($content['field_home_alert_link']); ?>
          </div>
        </div>
      <?php endif; ?>

    <?php endif; ?>
  </section>
  <?php print theme('status_messages'); //move status messages insice node for homepage?>
  <section class="section-wrapper section-gallery style-a full-block">

    <div class="site-container">
      <?php print render($content['field_home_map_gallery']); ?>
      <?php print render($content['field_home_map_gallery_2']); ?>
      <?php print render($content['field_home_map_gallery_3']); ?>
      <?php print render($mobile_gallery); ?>
      <?php print render($tablet_gallery); ?>
      <?php print render($tablet_gallery_2); ?>
    </div>

  </section>


  <section class="section-wrapper section-explore style-a full-block">
    <div class="site-container">
      <?php print render($content['field_home_nonstop_title']); ?>
      <?php print render($content['field_home_nonstop_link']); ?>
    </div>
  </section>
  <section class="section-wrapper section-items full-block" data-slider = "0">
    <div class="site-container">
      <?php print render($content['field_home_nonstop_slide_1']); ?>
      <?php print render($content['field_home_nonstop_slide_2']); ?>
      <?php print render($content['field_home_nonstop_slide_3']); ?>
      <?php print render($content['field_home_nonstop_slide_4']); ?>
      <?php print render($content['field_home_nonstop_slide_5']); ?>
      <?php print render($content['field_home_nonstop_slide_6']); ?>
      <?php print render($mobile_nonstop_slide_1); ?>
      <?php print render($mobile_nonstop_slide_2); ?>
      <?php print render($mobile_nonstop_slide_3); ?>
    </div>
  </section>

  <section class="section-wrapper section-explore style-b full-block">
    <div class="site-container">
      <h2><?php print render($content['field_home_art_title']); ?></h2>

      <div
        class="btn-wrap style-b"><?php print render($content['field_home_art_link']); ?></div>
    </div>
  </section>
  <section class="section-wrapper section-gallery style-b full-block">
    <div class="site-container">
      <?php print render($content['field_home_art_gallery']); ?>
    </div>
  </section>
  <section class="section-wrapper section-with-img full-block">
    <div class="site-container">
      <div class="img">
        <?php print render($content['field_home_bot_image']); ?>
      </div>
      <div class="text">
        <?php print render($content['field_home_bot_title']); ?>

        <div class="items">
          <?php print render($content['jet_sets_block']); ?>
          <!--          <a href="#" class="item">-->
          <!--            <span class="stage">stage 1</span>-->
          <!---->
          <!--            <div class="middle">-->
          <!--              <span>Wednesday, February 17</span>-->
          <!--              <span class="desc"><i>1:00PM</i> <strong>Mark Bruner</strong></span>-->
          <!--            </div>-->
          <!--          </a>-->
          <!---->
          <!--          <a href="#" class="item">-->
          <!--            <span class="stage">stage 2</span>-->
          <!---->
          <!--            <div class="middle">-->
          <!--              <span>Wednesday, February 18</span>-->
          <!--              <span class="desc"><i>3:00PM</i> <strong>Chris Hicks</strong></span>-->
          <!--            </div>-->
          <!--          </a>-->
          <!---->
          <!--          <a href="#" class="item">-->
          <!--            <span class="stage">stage 1</span>-->
          <!---->
          <!--            <div class="middle">-->
          <!--              <span>Wednesday, February 19</span>-->
          <!--              <span class="desc"><i>3:30PM</i> <strong>Jason Cadamy</strong></span>-->
          <!--            </div>-->
          <!--          </a>-->
        </div>
      </div>
    </div>
  </section>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['field_home_alert_type']);
    hide($content['field_home_alert_link']);
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_home_show_allert']);
    //print render($content);
    ?>
  </div>

</div>
