<?php
/**
 * @file
 * Map page template
 */
?>
<div class="b-map" id="b-map">
  <?php print l('+', '#', array('external' => true, 'attributes' => array('class' => array('btn-sidebar-close')))); ?>
  <div class="navigation-control">
    <?php print l(t('All Maps'), '#', array('external' => true, 'attributes' => array('class' => array('btn-nav-level')))); ?>
    <?php print l(t('Legend'), '#', array('external' => true, 'attributes' => array('class' => array('btn-sidebar')))); ?>
    <div class="level-control level-upper-control">
      <h3>Terminal</h3>
      <div class="levels-nav">
        <ul>
          <li><a href="#level-map">Map Overview</a></li>
          <li><a href="#level-upper">Terminal - Upper Level</a></li>
          <li><a href="#level-lower">Terminal - Lower Level</a></li>
          <li><a href="#level-parking">Parking</a></li>
          <li><a href="#level-car-rental">Car Rental Center</a></li>
        </ul>
      </div>
      <div class="level-nav">
        <ul>
          <li><a data-role="bar" href="javascript:void(0);"><span class="ico ss-icon ss-glyphish-filled ss-cocktail"></span> Bar</a></li>
          <li><a data-role="shop" href="javascript:void(0);"><span class="ico ss-icon ss-glyphish-filled ss-shoppingbag"></span> Shopping</a></li>
          <li><a data-role="food" href="javascript:void(0);"><span class="ico ss-icon ss-glyphish-filled ss-utensils"></span> Food</a></li>
          <li><a data-role="restroom" href="javascript:void(0);"><span class="ico ico-restroom"></span> Restrooms</a></li>
          <li><a data-role="coffee" href="javascript:void(0);"><span class="ico ico-coffee"></span> Coffee/Snacks</a></li>
<!--          <li><a data-role="shoe" href="javascript:void(0);"><span class="ico ico-shoe"></span> Shoe Shine</a></li>-->
        </ul>
      </div>
      <div class="icon-compass"><img src="<?php print $theme_path ;?>/images/map-new/ico-compass.png" alt=""/></div>
    </div>
    <div class="level-control level-parking-control">
      <h3>Parking</h3>
      <div class="levels-nav">
        <ul>
          <li><a href="#level-map">Map Overview</a></li>
          <li><a href="#level-upper">Terminal</a></li>
          <li><a href="#level-parking">Parking</a></li>
          <li><a href="#level-car-rental">Car Rental Center</a></li>
        </ul>
      </div>
      <div class="icon-compass"><img src="<?php print $theme_path ;?>/images/map-new/ico-compass-a.png" alt=""/></div>
    </div>
  </div>
  <div class="nav-sidebar level-upper-sidebar">
    <div class="sidebar-item">
      <h2>LEGEND</h2>
      <ul>
        <li><a data-role="atm" href="javascript:void(0);"><span class="ico ico-atm"></span> ATM Machine</a></li>
        <li><a data-role="escalator" href="javascript:void(0);"><span class="ico ico-escalator"></span> Escalator</a></li>
        <li><a data-role="elevator" href="javascript:void(0);"><span class="ico ico-elevator"></span> Elevator</a></li>
        <li><a data-role="information" href="javascript:void(0);"><span class="ico ico-information"></span> Information & Paging</a></li>
        <li><a data-role="nursery" href="javascript:void(0);"><span class="ico ico-nursery"></span> Nursery</a></li>
        <li><a data-role="shoe" href="javascript:void(0);"><span class="ico ico-shoe"></span> Shoe Shine</a></li>
        <li><a data-role="ticket-counter" href="javascript:void(0);"><span class="ico ico-ticket-counter"></span> Ticket Counter</a></li>
        <li><a data-role="security" href="javascript:void(0);"><span class="ico ico-security"></span> Security Checkpoint</a></li>
        <li><a data-role="ymca" href="javascript:void(0);"><span class="ico ico-ymca"></span> YMCA Military<br>Welcome Center</a></li>
        <li><a data-role="restroom" href="javascript:void(0);"><span class="ico ico-restroom"></span> Restrooms</a></li>
          <li><a data-role="pet-area" href="javascript:void(0);"><span class="ico ico-pet-area"></span> Pet Relief Area</a></li>
      </ul>
    </div>
    <div class="sidebar-item">
      <h2>GATES</h2>
      <ul>
        <?php foreach($gates as $airline => $airline_gates): ?>
          <li>
            <span class="label"><?php print $airline?></span>
            <div class="items">
              <?php foreach($airline_gates as $element_nid): ?>
                <a data-role="<?php print $elements_data[$element_nid]->role?>" href="#" class="ico ico-gate">
                  <?php print $elements_data[$element_nid]->icon_text?>
                </a>
              <?php endforeach; ?>

            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="nav-sidebar level-lower-sidebar">
    <div class="sidebar-item">
      <h2>LEGEND</h2>
      <ul>
        <li><a data-role="baggage" href="#"><span class="ico ico-baggage"></span> Baggage Claim</a></li>
        <li><a data-role="baggage-office" href="#"><span class="ico ico-baggage-office"></span> Baggage Offices</a></li>
<!--        <li><a data-role="rental-car" href="#"><span class="ico ico-rental-car"></span> Rental Car Counter</a></li>-->
        <li><a data-role="escalator" href="#"><span class="ico ico-escalator"></span> Escalator</a></li>
        <li><a data-role="restroom" href="#"><span class="ico ico-restroom"></span> Restrooms</a></li>
        <li><a data-role="vending" href="#"><span class="ico ico-vending"></span> Vending</a></li>
        <li><a data-role="elevator" href="#"><span class="ico ico-elevator"></span> Elevator</a></li>
        <li><a data-role="phone" href="#"><span class="ico ico-phone"></span> Phones</a></li>
        <li><a data-role="pet-area" href="#"><span class="ico ico-pet-area"></span> Pet Relief Area</a></li>
        <li><a data-role="mail" href="#"><span class="ico ico-mail ss-icon ss-standard ss-mail"></span> U.S. Mail Box</a></li>
        <li><a data-role="information" href="#"><span class="ico ico-information"></span> Information</a></li>
        <li><a data-role="conferenceroom" href="#"><span class="ico ico-conferenceroom"></span> Conference Room</a></li>
        <li><a data-role="g2" href="#"><span class="ico ico-g2"></span> G2 Secure Staff</a></li>
      </ul>
    </div>
    <div class="sidebar-item">
      <h2>AIRLINE
        CAROUSELS</h2>
      <ul>
        <?php foreach($baggage as $element_nid): ?>
          <li><a data-role="<?php print $elements_data[$element_nid]->role ?>" href="#">
              <span class="ico ico-baggage"><?php print $elements_data[$element_nid]->icon_text ?></span>
              <?php print $elements_data[$element_nid]->legend_text;?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
    <div class="nav-sidebar level-parking-sidebar">
        <div class="sidebar-item">
            <h2>LEGEND</h2>
            <ul>
                <li><span class="p"><span class="ico ico-hourly-p"></span> 2-Level Garage</span></li>
                <li><span class="p"><span class="ico ico-covered-p"></span> 5-Level Garage</span></li>
                <li><span class="p"><span class="ico ico-cashier"></span> Cashier</span></li>
                <li><span class="p"><span class="ico ico-remote-p"></span> Remote Shuttle Parking</span></li>
                <li><span class="p"><span class="ico ico-long-p"></span> Shuttle Parking</span></li>
                <li><span class="p"><span class="ico ico-semi-p"></span> Semi-Covered Parking</span></li>
                <li><span class="p"><span class="ico ico-area"></span> Cell Phone Waiting Area</span></li>
            </ul>
        </div>
    </div>
  <div id="sidebar-desc" class="sidebar-desc">
    <a id="btn-close" class="btn-close" href="#">+</a>

    <?php foreach($elements_data as $nid => $element ): ?>
        <?php if($element->description_type == 'popup'): ?>
        <div id="desc-<?php print $element->nid;?>" class="item">
          <h3><?php print $element->title;?></h3>
          <?php print $element->body;?>
          <?php if(!empty($element->image)): ?>
            <div class="image">
              <?php print $element->image;?>
            </div>
          <?php endif; ?>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <div class="tooltips-wrapper">    <?php foreach($elements_data as $nid => $element ): ?>
      <?php if($element->description_type != 'popup'): ?>
        <div id="tooltip-<?php print $element->nid;?>" class="tooltip">
          <span class="tooltip-hd"><?php print $element->title;?></span>
          <span class="tooltip-bd"><?php print $element->tooltip_text;;?></span>

        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <div class="levels">
    <div class="levels-inner">
      <div class="level level-map" id="level-map">
        <a href="#level-car-rental" class="img-level-overview img-level-car-rental"></a>
        <a class="img-tooltip tooltip-car-rental" href="#level-car-rental">Car Rental Center</a>
        <a class="img-tooltip tooltip-parking" href="#level-parking">Parking</a>
        <a class="img-tooltip tooltip-terminal" href="#level-upper">Terminal</a>
      <div class="img-level-mobile">
          <img src="<?php print $theme_path ;?>/images/map-new/level-map-img-level-mobile.png" alt=""/>
      </div>
        <div class="img-level">
          <img src="<?php print $theme_path ;?>/images/map-new/level-map-img-level.png" alt=""/>
        </div>
        <div class="img-nav-level">
          <a href="#level-upper" class="img-level-overview img-level-upper">
            <div class="image hover"><img src="<?php print $theme_path ;?>/images/map-new/level-upper-img-level-overview-hover.png" alt=""/></div>
            <div class="image"><img src="<?php print $theme_path ;?>/images/map-new/level-upper-img-level-overview.png" alt=""/></div>
          </a>
          <a href="#level-parking" class="img-level-overview img-level-parking">
            <div class="image hover"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-img-level-overview-hover.png" alt=""/></div>
            <div class="image"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-img-level-overview.png" alt=""/></div>
          </a>
        </div>
      </div>
      <div class="level level-upper" id="level-upper">
        <div class="planes">
          <span class="ico ico-plane"></span>
          <span class="ico ico-plane"></span>
          <span class="ico ico-plane"></span>
          <span class="ico ico-plane"></span>
          <span class="ico ico-plane"></span>
        </div>
        <div class="img-level-mobile"><img src="<?php print $theme_path ;?>/images/map-new/level-upper-img-level-mobile.png" alt=""/></div>
        <div class="img-level"><img src="<?php print $theme_path ;?>/images/map-new/level-upper-img-level.png" alt=""/></div>
        <div class="img-default">
          <h3>Terminal</h3>
          <img src="<?php print $theme_path ;?>/images/map-new/level-upper-img-default.png" alt=""/>
        </div>

        <?php foreach($elements['upper']['types'] as $type => $nids): ?>
          <div data-role="<?php print $type;?>" class="elements elements-<?php print $type;?>">
          <?php foreach($nids as $nid): ?>
            <?php print render($elements_data[$nid]->element_html);?>
          <?php endforeach; ?>
         </div>
        <?php endforeach; ?>

        <?php if($add_access): ?>
          <div data-role="empty" class="elements elements-empty">
            <?php foreach( $elements['upper']['empty_positions'] as $position_number): ?>
              <a href="<?php print url('node/add/map-object', array('query' => array('destination' => wrwa_map_link_destination('upper'), 'position' => 'u-' .$position_number)));?>" class="ico ico-empty position-u-<?php print $position_number; ?>">
                  <span class="tooltip">
                    <span class="tooltip-hd"><?php print t('Add new object');?></span>
                  </span>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>
      <div class="level level-lower" id="level-lower">
        <div class="img-level-mobile"><img src="<?php print $theme_path ;?>/images/map-new/level-lower-img-level-mobile.png" alt=""/></div>
        <div class="img-level"><img src="<?php print $theme_path ;?>/images/map-new/level-lower-img-level.png" alt=""/></div>

        <?php foreach($elements['lower']['types'] as $type => $nids): ?>
          <div data-role="<?php print $type;?>" class="elements elements-<?php print $type;?>">
            <?php foreach($nids as $nid): ?>
              <?php print render($elements_data[$nid]->element_html);?>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
        <?php if($add_access): ?>
          <div data-role="empty" class="elements elements-empty">
            <?php foreach( $elements['lower']['empty_positions'] as $position_number): ?>
              <a href="<?php print url('node/add/map-object', array('query' => array('destination' => wrwa_map_link_destination('lower'), 'position' => 'l-' .$position_number)));?>" class="ico ico-empty position-l-<?php print $position_number; ?>">
                <span class="tooltip">
                  <span class="tooltip-hd"><?php print t('Add new object'); ?></span>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="level level-parking" id="level-parking">
        <div class="img-level-mobile"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-img-level-mobile.png" alt=""/></div>
        <div class="img-level"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-img-level.png" alt=""/></div>
        <div class="img-default">
          <h3>Parking</h3>
          <img src="<?php print $theme_path ;?>/images/map-new/level-parking-img-default.png" alt=""/>
      </div>
      <?php foreach($elements['parking']['types'] as $type => $nids): ?>
        <div data-role="<?php print $type;?>" class="elements elements-<?php print $type;?>">
          <?php foreach($nids as $nid): ?>
            <?php print render($elements_data[$nid]->element_html);?>
          <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        <?php if($add_access): ?>
          <div data-role="empty" class="elements elements-empty">
            <?php foreach( $elements['parking']['empty_positions'] as $position_number): ?>
              <a href="<?php print url('node/add/map-object', array('query' => array('destination' => wrwa_map_link_destination('parking'), 'position' => 'p-' .$position_number)));?>" class="ico ico-empty position-p-<?php print $position_number; ?>">
                <span class="tooltip">
                  <span class="tooltip-hd"><?php print t('Add new object');?></span>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="level level-parking-map" id="level-parking-map">
        <div class="img-level-mobile"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-map-img-level-mobile.png" alt=""/></div>
        <div class="img-level"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-map-img-level.png" alt=""/></div>
      </div>
      <div class="level level-car-rental" id="level-car-rental">
        <a target="_blank" class="link" href="https://www.google.com/maps/place/5201+S+Meridian+Ave,+Oklahoma+City,+OK+73159/@35.4090351,-97.6054785,15z/data=!4m5!3m4!1s0x87b21202a84be20f:0xc4aae00c47076f77!8m2!3d35.4138512!4d-97.601936">5201 S.Meridian Ave.</a>
        <div class="img-level-mobile"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-car-rental-level-mobile.png" alt=""/></div>
        <div class="img-level"><img src="<?php print $theme_path ;?>/images/map-new/level-parking-car-rental-level.png" alt=""/></div>
      </div>
    </div>
    <div class="shadow right"></div>
    <div class="shadow left"></div>
  </div>
  <div id="img-nav-level-lover-and-upper" class="img-nav-level-lover-and-upper">
    <a href="#level-upper" class="img-level-overview img-level-upper">
      <div class="image hover"><img src="<?php print $theme_path ;?>/images/map-new/nav-upper-level-active.png" alt=""/></div>
      <div class="image"><img src="<?php print $theme_path ;?>/images/map-new/nav-upper-level-default.png" alt=""/></div>
      <span class="desc">Upper Level</span>
    </a>
    <a href="#level-lower" class="img-level-overview img-level-lower">
      <div class="image hover"><img src="<?php print $theme_path ;?>/images/map-new/nav-lower-level-active.png" alt=""/></div>
      <div class="image"><img src="<?php print $theme_path ;?>/images/map-new/nav-lower-level-default.png" alt=""/></div>
      <span class="desc">Lower Level</span>
    </a>
  </div>
</div>