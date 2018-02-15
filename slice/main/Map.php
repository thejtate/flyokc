<?php $title = 'Map-LowerLevel-2B-Updated'; ?>
<?php include 'tpl/includes/head.inc'; ?>
<body class="page page-map">
<div class="outer-wrapper">
  <?php include 'tpl/layout/header.inc'; ?>
  <div class="content-wrapper">
    <div class="b-map" id="b-map">
      <a class="btn-sidebar-close" href="#">+</a>
      <div class="navigation-control">
        <a class="btn-nav-level" href="#">All Maps</a>
        <a class="btn-sidebar" href="#">Legend</a>
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
              <li><a data-role="bar" href="#"><span class="ico ss-icon ss-glyphish-filled ss-cocktail"></span> Bar</a></li>
              <li><a data-role="shop" href="#"><span class="ico ss-icon ss-glyphish-filled ss-shoppingbag"></span> Shopping</a></li>
              <li><a data-role="food" href="#"><span class="ico ss-icon ss-glyphish-filled ss-utensils"></span> Food</a></li>
              <li><a data-role="restroom" href="#"><span class="ico ico-restroom"></span> Restrooms</a></li>
              <li><a data-role="coffee" href="#"><span class="ico ico-coffee"></span> Coffee/Snacks</a></li>
              <li><a data-role="shoe" href="#"><span class="ico ico-shoe"></span> Shoe Shine</a></li>
            </ul>
          </div>
          <div class="icon-compass"><img src="theme/images/map-new/ico-compass.png" alt=""/></div>
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
          <div class="icon-compass"><img src="theme/images/map-new/ico-compass-a.png" alt=""/></div>
        </div>
      </div>
      <div class="nav-sidebar level-upper-sidebar">
        <div class="sidebar-item">
          <h2>LEGEND</h2>
          <ul>
            <li><a data-role="atm" href="#"><span class="ico ico-atm"></span> ATM Machine</a></li>
            <li><a data-role="escalator" href="#"><span class="ico ico-escalator"></span> Escalator</a></li>
            <li><a data-role="elevator" href="#"><span class="ico ico-elevator"></span> Elevator</a></li>
            <li><a data-role="information" href="#"><span class="ico ico-information"></span> Information</a></li>
            <li><a data-role="nursery" href="#"><span class="ico ico-nursery"></span> Nursery</a></li>
            <li><a data-role="ticket-counter" href="#"><span class="ico ico-ticket-counter"></span> Ticket Counter</a></li>
            <li><a data-role="security" href="#"><span class="ico ico-security"></span> Security Checkpoint</a></li>
            <li><a data-role="ymca" href="#"><span class="ico ico-ymca"></span> YMCA</a></li>
            <li><a data-role="pet-area" href="#" class=""><span class="ico ico-pet-area"></span> Pet Relief Area</a></li>
          </ul>
        </div>
        <div class="sidebar-item">
          <h2>GATES</h2>
          <ul>
            <li>
              <span class="label">American</span>
              <div class="items">
                <a data-role="gate-4" href="#" class="ico ico-gate">4</a>
                <a data-role="gate-6" href="#" class="ico ico-gate">6</a>
                <a data-role="gate-8" href="#" class="ico ico-gate">8</a>
              </div>
            </li>
            <li>
              <span class="label">Delta</span>
              <div class="items">
                <a data-role="gate-20" href="#" class="ico ico-gate">20</a>
                <a data-role="gate-22" href="#" class="ico ico-gate">22</a>
                <a data-role="gate-24" href="#" class="ico ico-gate">24</a>
              </div>
            </li>
            <li>
              <span class="label">Allegiant</span>
              <div class="items">
                <a data-role="gate-1" href="#" class="ico ico-gate">1</a>
              </div>
            </li>
            <li>
              <span class="label">Southwest</span>
              <div class="items">
                <a data-role="gate-14" href="#" class="ico ico-gate">14</a>
                <a data-role="gate-16" href="#" class="ico ico-gate">16</a>
                <a data-role="gate-18" href="#" class="ico ico-gate">18</a>
              </div>
            </li>
            <li>
              <span class="label">United</span>
              <div class="items">
                <a data-role="gate-3" href="#" class="ico ico-gate">3</a>
                <a data-role="gate-5" href="#" class="ico ico-gate">5</a>
                <a data-role="gate-9" href="#" class="ico ico-gate">9</a>
                <a data-role="gate-10" href="#" class="ico ico-gate">10</a>
                <a data-role="gate-11" href="#" class="ico ico-gate">11</a>
              </div>
            </li>
            <li>
              <span class="label">Alaska</span>
              <div class="items">
                <a data-role="gate-2" href="#" class="ico ico-gate">2</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="nav-sidebar level-lower-sidebar">
        <div class="sidebar-item">
          <h2>LEGEND</h2>
          <ul>
            <li><a data-role="baggage" href="#"><span class="ico ico-baggage"></span> Baggage Claim</a></li>
            <li><a data-role="baggage-office" href="#"><span class="ico ico-baggage-office"></span> Baggage Offices</a></li>
            <li><a data-role="rental-car" href="#"><span class="ico ico-rental-car"></span> Rental Car Counter</a></li>
            <li><a data-role="escalator" href="#"><span class="ico ico-escalator"></span> Escalator</a></li>
            <li><a data-role="restroom" href="#"><span class="ico ico-restroom"></span> Restrooms</a></li>
            <li><a data-role="vending" href="#"><span class="ico ico-vending"></span> Vending</a></li>
            <li><a data-role="elevator" href="#"><span class="ico ico-elevator"></span> Elevator</a></li>
            <li><a data-role="phone" href="#"><span class="ico ico-phone"></span> Phones</a></li>
            <li><a data-role="pet-area" href="#"><span class="ico ico-pet-area"></span> Pet Relief Area</a></li>
            <li><a data-role="mail" href="#"><span class="ico ico-mail ss-icon ss-standard ss-mail"></span> U.S. Mail Box</a></li>
            <li><a data-role="information" href="#"><span class="ico ico-information"></span> Information</a></li>
            <li><a data-role="conferenceroom" href="#"><span class="ico ico-conferenceroom"></span> Conference room</a></li>
            <li><a data-role="g2" href="#"><span class="ico ico-g2"></span> G2 Secure Staff</a></li>
          </ul>
        </div>
        <div class="sidebar-item">
          <h2>AIRLINE
            CAROUSELS</h2>
          <ul>
            <li><a data-role="baggage-1" href="#"><span class="ico ico-baggage">1</span> Delta (DL)</a></li>
            <li><a data-role="baggage-2" href="#"><span class="ico ico-baggage">2</span> Southwest (WN)</a></li>
            <li><a data-role="baggage-3" href="#"><span class="ico ico-baggage">3</span> Allegiant (G4)</a></li>
            <li><a data-role="baggage-4" href="#"><span class="ico ico-baggage">4</span> American (AA)</a></li>
            <li><a data-role="baggage-5" href="#"><span class="ico ico-baggage">5</span> Alaska / United
                (AS/UA)</a></li>
            <li><a data-role="baggage-6" href="#"><span class="ico ico-baggage">6</span> United (UA)</a></li>
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
            <li><span class="p"><span class="ico ico-long-p"></span> Long Term Parking</span></li>
            <li><span class="p"><span class="ico ico-semi-p"></span> Semi-Covered Parking</span></li>
            <li><span class="p"><span class="ico ico-area"></span> Cell Phone Waiting Area</span></li>
            <li><span class="p"><span class="ico ico-premium-p"></span> Premium Parking</span></li>
          </ul>
        </div>
      </div>
      <div id="sidebar-desc" class="sidebar-desc">
        <a id="btn-close" class="btn-close" href="#">+</a>
        <div id="desc-u-29" class="item">
          <h3>Delta Air Lines</h3>
          <p>Ticket Counter Hours:</p>
          <p><strong>Daily | 4:15AM - 6:00PM</strong></p>
        </div>
        <div id="desc-u-30" class="item">
          <h3>Southwest Airlines</h3>
          <p>Ticket Counter Hours:</p>
          <p><strong>Sunday-Friday | 5:00AM - 8:00PM <br/>
              Saturday | 5:00AM - 6:30PM</strong></p>
        </div>
        <div id="desc-u-31" class="item">
          <h3>YMCA Military Welcome Center</h3>
        </div>
        <div id="desc-u-32" class="item">
          <h3>American Airlines</h3>
          <p>Ticket Counter Hours:</p>
          <p><strong>Daily | 4:00AM - 6:30PM</strong></p>
        </div>
        <div id="desc-u-33" class="item">
          <h3>Allegiant Air</h3>
          <p>Ticket Counter Hours:</p>
          <p><strong>2 hours before scheduled flight to 1 hour after each departure</strong></p>
        </div>
        <div id="desc-u-34" class="item">
          <h3>Alaska Airlines</h3>
          <p>Ticket Counter Hours:</p>
          <p><strong>Daily | 3:00PM - 5:30PM</strong></p>
        </div>
        <div id="desc-u-35" class="item">
          <h3>United Airlines</h3>
          <p>Ticket Counter Hours:</p>
          <p><strong>Daily | 4:00AM - 6:00PM</strong></p>
        </div>
        <div id="desc-u-38" class="item">
          <h3>Cross Grain Brewhouse</h3>
          <p>Open for breakfast, lunch and dinner. Enjoy artisanal foods, craft beers and specialty cocktails. Plus, there are plenty of power outlets to charge your devices!</p>
        </div>
        <div id="desc-u-39" class="item">
          <h3>The Redbud Lounge</h3>
          <p>Full service bar and lounge with a variety of wines, popular liquors, traditional “pub grub”, and the nation’s most popular beers and ales.</p>
        </div>
        <div id="desc-u-40" class="item">
          <h3>POPS East</h3>
          <p>Inspired by the newest, coolest landmark along historic Route 66, POPS features a broad assortment of products including newspapers, magazine, books, convenience items, souvenirs and of course, soda pop.</p>
        </div>
        <div id="desc-u-41" class="item">
          <h3>CNBC Express</h3>
          <p>Basic travel necessities including magazines, books, newspapers, snacks, soda, and electronics.</p>
        </div>
        <div id="desc-u-42" class="item">
          <h3>CNBC</h3>
          <p>Travel necessities including magazines, books, newspapers, snacks, soda, and electronics, along with souvenirs, apparel, luggage and gourmet food.</p>
        </div>
        <div id="desc-u-43" class="item">
          <h3>EA Sports</h3>
          <p>EA Sports, one of the world’s most innovative and interactive global brands, offers a one-of-a-kind interactive sports experience. EA Sports allows every customer the chance to “Step on the Field of Play.”  Gamers and non-gamers alike will find the latest EA Sports officially licensed apparel from the teams that make Oklahoma City great.</p>
        </div>
        <div id="desc-u-44" class="item">
          <h3>InMotion Entertainment</h3>
          <p>InMotion provide business &amp; leisure travelers with the most up- to-date digitally equipped devices, along with InMotion’s trademarked PlayPoint digital download stations.</p>
        </div>
        <div id="desc-u-45" class="item">
          <h3>Brighton Collectibles</h3>
          <p>A specialty store featuring Brighton’s exquisite collection of accessories including handbags, leather goods, watches, fragrances, jewelry, home accessories and more.</p>
          <p><strong>Open Daily
              5:00am-7:00/7:30pm</strong></p>
        </div>
        <div id="desc-u-46" class="item">
          <h3>POPS West</h3>
          <p>Inspired by the newest, coolest landmark along historic Route 66, POPS features a broad assortment of products including newspapers, magazine, books, convenience items, souvenirs and of course, soda pop.</p>
        </div>
        <div id="desc-u-47" class="item">
          <h3>Bricktown Square</h3>
          <p>Bricktown Square is designed with the original and historic location in mind, and provides an assortment of souvenirs and merchandise from the area’s most famous local attractions including local apparel and gear, giftware and edibles.</p>
        </div>
        <div id="desc-u-48" class="item">
          <h3>Sonic</h3>
          <p>Made to order burgers, chicken sandwiches, coneys, wraps, Toaster sandwiches, breakfast burritos, tots, French fries, onion rings, Sonic Blasts, and banana splits.</p>
          <p><strong>Open Daily - 5:00am - 7:00pm
              Hours subject to change</strong></p>
          <div class="img"><img src="theme/images/tmp/tmp-img-sonic.jpg" alt=""/></div>
        </div>
        <div id="desc-u-49" class="item">
          <h3>Moe's &amp; Salt Lick Barbeque</h3>
          <p>Moe's Southwest Grill: serves a variety of southwest fare, including burritos, salads, nachos and quesadillas.</p>
          <p>Salt Lick Barbeque: briskets, smoked sausages, turkey, and split chickens.</p>
        </div>
        <div id="desc-u-50" class="item">
          <h3>Schlotsky's</h3>
          <p>Serves hot sandwiches on fresh baked bread, specialty pizzas, wraps, freshly tossed salads, and gourmet soups.</p>
        </div>
        <div id="desc-u-51" class="item">
          <h3>Route 66 Grill</h3>
          <p>Made to order breakfast bagels, sandwiches and burritos; freshly prepared salads, wraps, deli sandwiches, burgers, hot dogs, tuna filet sandwiches and Route 66's famous Ribeye sandwich.</p>
        </div>
        <div id="desc-u-56" class="item">
          <h3>Cafe Oklahoma</h3>
          <p>Gourmet coffees, espresso, cappuccino, latte, coffee shakes, milk shakes and fruit smoothies.  Food offerings include breakfast sandwiches, bagels, muffins, pizza, ciabatta and baguettes.</p>
        </div>
        <div id="desc-u-57" class="item">
          <h3>Coffee Bean and Tea Leaf</h3>
        </div>
        <div id="desc-u-59" class="item">
          <h3>Harold's Shoe Shine</h3>
          <p>Located between EA Sports and the Coffee Bean and Tea Leaf</p>
        </div>
        <div id="desc-l-24" class="item">
          <h3>Animal Relief Area</h3>
          <p>The Pet Relief Area is located just steps out the front exit door at Baggage Claim 1. The area is easily identifiable by the white picket fence.</p>
        </div>
      </div>
      <div class="tooltips-wrapper">
        <div id="tooltip-u-1" class="tooltip">
          <span class="tooltip-hd">Gate 24</span>
          <span class="tooltip-bd">Delta Air Lines</span>
        </div>
        <div id="tooltip-u-2" class="tooltip">
          <span class="tooltip-hd">Gate 22</span>
          <span class="tooltip-bd">Delta Air Lines</span>
        </div>
        <div id="tooltip-u-3" class="tooltip">
          <span class="tooltip-hd">Gate 20</span>
          <span class="tooltip-bd">Delta Air Lines</span>
        </div>
        <div id="tooltip-u-4" class="tooltip">
          <span class="tooltip-hd">Gate 18</span>
          <span class="tooltip-bd">Southwest Airlines</span>
        </div>
        <div id="tooltip-u-5" class="tooltip">
          <span class="tooltip-hd">Gate 16</span>
          <span class="tooltip-bd">Southwest Airlines</span>
        </div>
        <div id="tooltip-u-6" class="tooltip">
          <span class="tooltip-hd">Gate 14</span>
          <span class="tooltip-bd">Southwest Airlines</span>
        </div>
        <div id="tooltip-u-7" class="tooltip">
          <span class="tooltip-hd">Gate 12</span>
          <span class="tooltip-bd">Various Commercial Airlines and Charters</span>
        </div>
        <div id="tooltip-u-8" class="tooltip">
          <span class="tooltip-hd">Gate 10</span>
          <span class="tooltip-bd">United Airlines</span>
        </div>
        <div id="tooltip-u-9" class="tooltip">
          <span class="tooltip-hd">Gate 8</span>
          <span class="tooltip-bd">American Airlines</span>
        </div>
        <div id="tooltip-u-10" class="tooltip">
          <span class="tooltip-hd">Gate 6</span>
          <span class="tooltip-bd">American Airlines</span>
        </div>
        <div id="tooltip-u-11" class="tooltip">
          <span class="tooltip-hd">Gate 4</span>
          <span class="tooltip-bd">American Airlines</span>
        </div>
        <div id="tooltip-u-12" class="tooltip">
          <span class="tooltip-hd">Gate 2</span>
          <span class="tooltip-bd">Alaska Airlines</span>
        </div>
        <div id="tooltip-u-13" class="tooltip">
          <span class="tooltip-hd">Gate 1</span>
          <span class="tooltip-bd">Allegiant Air</span>
        </div>
        <div id="tooltip-u-14" class="tooltip">
          <span class="tooltip-hd">Gate 3</span>
          <span class="tooltip-bd">United Airlines</span>
        </div>
        <div id="tooltip-u-15" class="tooltip">
          <span class="tooltip-hd">Gate 5</span>
          <span class="tooltip-bd">United Airlines</span>
        </div>
        <div id="tooltip-u-16" class="tooltip">
          <span class="tooltip-hd">Gate 9</span>
          <span class="tooltip-bd">United Airlines</span>
        </div>
        <div id="tooltip-u-17" class="tooltip">
          <span class="tooltip-hd">Gate 11</span>
          <span class="tooltip-bd">United Airlines</span>
        </div>
        <div id="tooltip-u-18" class="tooltip">
          <span class="tooltip-hd">ATM</span>
          <span class="tooltip-bd">Services by Bank of America and MidFirst Bank</span>
        </div>
        <div id="tooltip-u-19" class="tooltip">
          <span class="tooltip-hd">ATM</span>
          <span class="tooltip-bd">Services by MidFirst Bank</span>
        </div>
        <div id="tooltip-u-20" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-u-21" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-u-22" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-u-23" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-u-24" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Elevator to all levels.</span>
        </div>
        <div id="tooltip-u-25" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Freight elevator to all levels.</span>
        </div>
        <div id="tooltip-u-26" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Elevator to parking tunnel, baggage and ticketing.</span>
        </div>
        <div id="tooltip-u-27" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Elevator to baggage claim, ticketing and gates, and administrative offices.</span>
        </div>
        <div id="tooltip-u-28" class="tooltip">
          <span class="tooltip-hd">Information &amp; Paging</span>
          <span class="tooltip-bd">Information and paging</span>
        </div>
        <div id="tooltip-u-36" class="tooltip">
          <span class="tooltip-hd">Security Checkpoint</span>
          <span class="tooltip-bd">East Security Checkpoint</span>
        </div>
        <div id="tooltip-u-37" class="tooltip">
          <span class="tooltip-hd">Security Checkpoint</span>
          <span class="tooltip-bd">West Security Checkpoint</span>
        </div>
        <div id="tooltip-u-52" class="tooltip">
          <span class="tooltip-hd">Public Restrooms</span>
          <span class="tooltip-bd">Men's &amp; Women's Restrooms.  A family restroom is located in between the two.</span>
        </div>
        <div id="tooltip-u-53" class="tooltip">
          <span class="tooltip-hd">Public Restrooms</span>
          <span class="tooltip-bd">Men's &amp; Women's Restrooms.  A family restroom is located in between the two.</span>
        </div>
        <div id="tooltip-u-54" class="tooltip">
          <span class="tooltip-hd">Public Restrooms</span>
          <span class="tooltip-bd">Women's Restroom.  A family restroom is located across the hallway next to the men's restroom.</span>
        </div>
        <div id="tooltip-u-55" class="tooltip">
          <span class="tooltip-hd">Public Restrooms</span>
          <span class="tooltip-bd">Men's Restroom.  A family restroom is located next to the men's restroom.</span>
        </div>
        <div id="tooltip-u-60" class="tooltip">
          <span class="tooltip-hd">Public Restrooms</span>
          <span class="tooltip-bd">Men's &amp; Women's Restrooms.  A family restroom is located in between the two.</span>
        </div>
        <div id="tooltip-u-61" class="tooltip">
          <span class="tooltip-hd">Public Restrooms &amp; Nursery</span>
          <span class="tooltip-bd">Men's &amp; Women's Restrooms.  A family restroom is located in between the two.  A small nursery offers nursing mothers a chair and sofa.</span>
        </div>
        <div id="tooltip-l-1" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-l-2" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-l-3" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalator/Stairs connecting parking tunnel and baggage claim level.</span>
        </div>
        <div id="tooltip-l-4" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-l-5" class="tooltip">
          <span class="tooltip-hd">Escalator/Stairs</span>
          <span class="tooltip-bd">Escalators connecting first and second levels.</span>
        </div>
        <div id="tooltip-l-6" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Elevator to all levels.</span>
        </div>
        <div id="tooltip-l-7" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Freight elevator to all levels.</span>
        </div>
        <div id="tooltip-l-8" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Elevator to parking tunnel, baggage claim, and ticketing and gates.</span>
        </div>
        <div id="tooltip-l-9" class="tooltip">
          <span class="tooltip-hd">Elevator</span>
          <span class="tooltip-bd">Elevator to baggage claim, ticketing and gates, and administrative offices.</span>
        </div>
        <div id="tooltip-l-10" class="tooltip">
          <span class="tooltip-hd">Public Restrooms</span>
          <span class="tooltip-bd">Men's &amp; Women's Restrooms.  A family restroom is located in between the two.</span>
        </div>
        <div id="tooltip-l-11" class="tooltip">
          <span class="tooltip-hd">Public Restrooms</span>
          <span class="tooltip-bd">Men's &amp; Women's Restrooms.  A family restroom is located in between the two.</span>
        </div>
        <div id="tooltip-l-12" class="tooltip pull-center">
          <span class="tooltip-hd">Information &amp; Paging</span>
        </div>
        <div id="tooltip-l-13" class="tooltip pull-center">
          <span class="tooltip-hd">Vending</span>
        </div>
        <div id="tooltip-l-14" class="tooltip pull-center">
          <span class="tooltip-hd">Vending</span>
        </div>
        <div id="tooltip-l-15" class="tooltip pull-center">
          <span class="tooltip-hd">Pay Phone</span>
        </div>
        <div id="tooltip-l-16" class="tooltip pull-center">
          <span class="tooltip-hd">Pay Phone</span>
        </div>
        <div id="tooltip-l-18" class="tooltip">
          <span class="tooltip-hd">BAGGAGE CLAIM 1</span>
          <span class="tooltip-bd">Delta Air Lines</span>
        </div>
        <div id="tooltip-l-19" class="tooltip">
          <span class="tooltip-hd">BAGGAGE CLAIM 2</span>
          <span class="tooltip-bd">Southwest Airlines</span>
        </div>
        <div id="tooltip-l-20" class="tooltip">
          <span class="tooltip-hd">BAGGAGE CLAIM 3</span>
          <span class="tooltip-bd">Allegiant Air</span>
        </div>
        <div id="tooltip-l-21" class="tooltip">
          <span class="tooltip-hd">BAGGAGE CLAIM 4</span>
          <span class="tooltip-bd">American Airlines</span>
        </div>
        <div id="tooltip-l-22" class="tooltip">
          <span class="tooltip-hd">BAGGAGE CLAIM 5</span>
          <span class="tooltip-bd">Alaska Airlines / United Airlines</span>
        </div>
        <div id="tooltip-l-23" class="tooltip">
          <span class="tooltip-hd">BAGGAGE CLAIM 6</span>
          <span class="tooltip-bd">United Airlines</span>
        </div>
        <div id="tooltip-l-25" class="tooltip">
          <span class="tooltip-hd">SOUTHWEST BAGGAGE OFFICE</span>
          <span class="tooltip-bd">Open after each arriving flight.</span>
        </div>
        <div id="tooltip-l-26" class="tooltip">
          <span class="tooltip-hd">AMERICAN BAGGAGE OFFICE</span>
          <span class="tooltip-bd">Open after each arriving flight.</span>
        </div>
        <div id="tooltip-l-27" class="tooltip">
          <span class="tooltip-hd">United Baggage Office</span>
          <span class="tooltip-bd">Open after each arriving flight.</span>
        </div>
        <div id="tooltip-l-28" class="tooltip">
          <span class="tooltip-hd">Delta Baggage Office</span>
          <span class="tooltip-bd">9:30am - 12:00 midnight</span>
        </div>
        <div id="tooltip-p-1" class="tooltip pull-center">
          <span class="tooltip-hd">Cashier</span>
        </div>
        <div id="tooltip-p-2" class="tooltip pull-center">
          <span class="tooltip-hd">Cashier</span>
        </div>
        <div id="tooltip-p-3" class="tooltip pull-center">
          <span class="tooltip-hd">Cashier</span>
        </div>
      </div>
      <div class="levels">
        <div class="levels-inner">
          <div class="level level-map" id="level-map">
            <a href="#level-car-rental" class="img-level-overview img-level-car-rental"></a>
            <a class="img-tooltip tooltip-car-rental" href="#level-car-rental">Car Rental Center</a>
            <a class="img-tooltip tooltip-parking" href="#level-parking">Parking</a>
            <a class="img-tooltip tooltip-terminal" href="#level-upper">Terminal</a>
            <div class="img-level-mobile">
              <img src="theme/images/map-new/level-map-img-level-mobile.png" alt=""/>
            </div>
            <div class="img-level">
              <img src="theme/images/map-new/level-map-img-level.png" alt=""/>
            </div>
            <div class="img-nav-level">
              <a href="#level-upper" class="img-level-overview img-level-upper">
                <div class="image hover"><img src="theme/images/map-new/level-upper-img-level-overview-hover.png" alt=""/></div>
                <div class="image"><img src="theme/images/map-new/level-upper-img-level-overview.png" alt=""/></div>
              </a>
              <a href="#level-parking" class="img-level-overview img-level-parking">
                <div class="image hover"><img src="theme/images/map-new/level-parking-img-level-overview-hover.png" alt=""/></div>
                <div class="image"><img src="theme/images/map-new/level-parking-img-level-overview.png" alt=""/></div>
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
            <div class="img-level-mobile"><img src="theme/images/map-new/level-upper-img-level-mobile.png" alt=""/></div>
            <div class="img-level"><img src="theme/images/map-new/level-upper-img-level.png" alt=""/></div>
            <div class="img-default">
              <h3>Terminal</h3>
              <img src="theme/images/map-new/level-upper-img-default.png" alt=""/>
            </div>
            <div data-role="gate" class="elements elements-gate">
              <span data-tooltip="#tooltip-u-1" data-role="gate-24" class="ico ico-gate position-u-1">24</span>
              <span data-tooltip="#tooltip-u-2" data-role="gate-22" class="ico ico-gate position-u-2">22</span>
              <span data-tooltip="#tooltip-u-3" data-role="gate-20" class="ico ico-gate position-u-3">20</span>
              <span data-tooltip="#tooltip-u-4" data-role="gate-18" class="ico ico-gate position-u-4">18</span>
              <span data-tooltip="#tooltip-u-5" data-role="gate-16" class="ico ico-gate position-u-5">16</span>
              <span data-tooltip="#tooltip-u-6" data-role="gate-14" class="ico ico-gate position-u-6">14</span>
              <span data-tooltip="#tooltip-u-7" data-role="gate-12" class="ico ico-gate position-u-7">
                12
                <span class="actions"> <a href="/" class="edit ss-icon ss-symbolicons-block ss-write"></a> <a href="/" class="delete ss-icon ss-symbolicons-block ss-trash"></a></span>
              </span>
              <span data-tooltip="#tooltip-u-8" data-role="gate-10" class="ico ico-gate position-u-8">10</span>
              <span data-tooltip="#tooltip-u-9" data-role="gate-8" class="ico ico-gate position-u-9">8</span>
              <span data-tooltip="#tooltip-u-10" data-role="gate-6" class="ico ico-gate position-u-10">6</span>
              <span data-tooltip="#tooltip-u-11" data-role="gate-4" class="ico ico-gate position-u-11">4</span>
              <span data-tooltip="#tooltip-u-12" data-role="gate-2" class="ico ico-gate position-u-12">2</span>
              <span data-tooltip="#tooltip-u-13" data-role="gate-1" class="ico ico-gate position-u-13">1</span>
              <span data-tooltip="#tooltip-u-14" data-role="gate-3" class="ico ico-gate position-u-14">3</span>
              <span data-tooltip="#tooltip-u-15" data-role="gate-5" class="ico ico-gate position-u-15">5</span>
              <span data-tooltip="#tooltip-u-16" data-role="gate-9" class="ico ico-gate position-u-16">9</span>
              <span data-tooltip="#tooltip-u-17" data-role="gate-11" class="ico ico-gate position-u-17">11</span>
            </div>
            <div data-role="atm" class="elements elements-atm">
              <span data-tooltip="#tooltip-u-18" class="ico ico-atm position-u-18"></span>
              <span data-tooltip="#tooltip-u-19" class="ico ico-atm position-u-19"></span>
            </div>
            <div data-role="escalator" class="elements elements-escalator">
              <span data-tooltip="#tooltip-u-20" class="ico ico-escalator position-u-20"></span>
              <span data-tooltip="#tooltip-u-21" class="ico ico-escalator position-u-21"></span>
              <span data-tooltip="#tooltip-u-22" class="ico ico-escalator position-u-22"></span>
              <span data-tooltip="#tooltip-u-23" class="ico ico-escalator position-u-23"></span>
            </div>
            <div data-role="elevator" class="elements elements-elevator">
              <span data-tooltip="#tooltip-u-24" class="ico ico-elevator position-u-24"></span>
              <span data-tooltip="#tooltip-u-25" class="ico ico-elevator position-u-25"></span>
              <span data-tooltip="#tooltip-u-26" class="ico ico-elevator position-u-26"></span>
              <span data-tooltip="#tooltip-u-27" class="ico ico-elevator position-u-27"></span>
            </div>
            <div data-role="information" class="elements elements-information">
              <span data-tooltip="#tooltip-u-28" class="ico ico-information position-u-28"></span>
            </div>
            <div data-role="ticket-counter" class="elements elements-ticket-counter">
              <span data-url="#desc-u-29" class="ico ico-ticket-counter position-u-29">dl <span class="tooltip pull-center"><span class="tooltip-title">Delta Air Lines</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-30" class="ico ico-ticket-counter position-u-30">wn <span class="tooltip pull-center"><span class="tooltip-title">Southwest Airlines</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-31" data-role="ymca" class="ico ico-ticket-counter position-u-31 ico-ymca"><span class="tooltip pull-center"><span class="tooltip-title">YMCA Military Welcome Center</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-32" class="ico ico-ticket-counter position-u-32">aa <span class="tooltip pull-center"><span class="tooltip-title">American Airlines</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-33" class="ico ico-ticket-counter position-u-33">G4 <span class="tooltip pull-center"><span class="tooltip-title">Allegiant Air</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-34" class="ico ico-ticket-counter position-u-34">AS <span class="tooltip pull-center"><span class="tooltip-title">Alaska Airlines</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-35" class="ico ico-ticket-counter position-u-35">UA <span class="tooltip pull-center"><span class="tooltip-title">United Airlines</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-35" class="ico ico-ticket-counter position-u-65">F9 <span class="tooltip pull-center"><span class="tooltip-title">United Airlines</span> <span class="ss-icon">&#x25BB;</span></span></span>
            </div>
            <div data-role="security" class="elements elements-security">
              <span data-tooltip="#tooltip-u-36" class="ico ico-security position-u-36"></span>
              <span data-tooltip="#tooltip-u-37" class="ico ico-security position-u-37"></span>
            </div>
            <div data-role="bar" class="elements elements-bar">
              <span data-url="#desc-u-38" class="ico ico-bar position-u-38 ss-icon ss-glyphish-filled ss-cocktail"><span class="tooltip pull-center"><span class="tooltip-title">Cross Grain Brewhouse</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-39" class="ico ico-bar position-u-39 ss-icon ss-glyphish-filled ss-cocktail"><span class="tooltip pull-center"><span class="tooltip-title">The Redbud Lounge</span> <span class="ss-icon">&#x25BB;</span></span></span>
            </div>
            <div data-role="shop" class="elements elements-shop">
              <span data-url="#desc-u-40" class="ico ico-shop position-u-40 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">POPS East</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-41" class="ico ico-shop position-u-41 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">CNBC Express</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-42" class="ico ico-shop position-u-42 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">CNBC</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-43" class="ico ico-shop position-u-43 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">EA Sports</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-44" class="ico ico-shop position-u-44 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">InMotion Entertainment</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-45" class="ico ico-shop position-u-45 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">Brighton Collectibles</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-46" class="ico ico-shop position-u-46 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">POPS West</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-47" class="ico ico-shop position-u-47 ss-icon ss-glyphish-filled ss-shoppingbag"><span class="tooltip pull-center"><span class="tooltip-title">Bricktown Square</span> <span class="ss-icon">&#x25BB;</span></span></span>
            </div>
            <div data-role="food" class="elements elements-food">
              <span data-url="#desc-u-48" class="ico ico-food position-u-48 ss-icon ss-glyphish-filled ss-utensils"><span class="tooltip pull-center"><span class="tooltip-title">Sonic</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-49" class="ico ico-food position-u-49 ss-icon ss-glyphish-filled ss-utensils"><span class="tooltip pull-center"><span class="tooltip-title">Moe's &amp; Salt Lick Barbeque</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-50" class="ico ico-food position-u-50 ss-icon ss-glyphish-filled ss-utensils"><span class="tooltip pull-center"><span class="tooltip-title">Schlotsky's</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-51" class="ico ico-food position-u-51 ss-icon ss-glyphish-filled ss-utensils"><span class="tooltip pull-center"><span class="tooltip-title">Route 66 Grill</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#" class="ico ico-food position-u-64 ss-icon ss-glyphish-filled ss-utensils"><span class="tooltip pull-center"><span class="tooltip-title">New food</span> <span class="ss-icon">&#x25BB;</span></span></span>
            </div>
            <div data-role="restroom" class="elements elements-restroom">
              <span data-tooltip="#tooltip-u-52" class="ico ico-restroom position-u-52"></span>
              <span data-tooltip="#tooltip-u-53" class="ico ico-restroom position-u-53"></span>
              <span data-tooltip="#tooltip-u-54" class="ico ico-restroom position-u-54"></span>
              <span data-tooltip="#tooltip-u-55" class="ico ico-restroom position-u-55"></span>
              <span data-tooltip="#tooltip-u-60" class="ico ico-restroom position-u-60"></span>
              <span data-tooltip="#tooltip-u-61" class="ico ico-restroom position-u-61"></span>
            </div>
            <div data-role="coffee" class="elements elements-coffee">
              <span data-url="#desc-u-56" class="ico ico-coffee position-u-56"><span class="tooltip pull-center"><span class="tooltip-title">Cafe Oklahoma</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span data-url="#desc-u-57" class="ico ico-coffee position-u-57"><span class="tooltip pull-center"><span class="tooltip-title">Coffee Bean and Tea Leaf</span> <span class="ss-icon">&#x25BB;</span></span></span>
              <span class="ico ico-coffee position-u-58"></span>
            </div>
            <div data-role="shoe" class="elements elements-shoe">
              <span data-url="#desc-u-59" class="ico ico-shoe position-u-59"><span class="tooltip pull-center"><span class="tooltip-title">Harold's Shoe Shine</span> <span class="ss-icon">&#x25BB;</span></span></span>
            </div>
            <div data-role="nursery" class="elements elements-nursery">
              <span data-tooltip="#" class="ico ico-nursery position-u-62"></span>
            </div>
            <div data-role="pet-area" class="elements elements-pet-area">
              <span data-url="#desc-l-24" class="ico ico-pet-area position-u-63"><span class="tooltip pull-center"><span class="tooltip-title">Animal Relief Area</span> <span class="ss-icon">▻</span></span></span>
            </div>
          </div>
          <div class="level level-lower" id="level-lower">
            <div class="img-level-mobile"><img src="theme/images/map-new/level-lower-img-level-mobile.png" alt=""/></div>
            <div class="img-level"><img src="theme/images/map-new/level-lower-img-level.png" alt=""/></div>
            <div data-role="escalator" class="elements elements-escalator">
              <span data-tooltip="#tooltip-l-1" class="ico ico-escalator position-l-1"></span>
              <span data-tooltip="#tooltip-l-2" class="ico ico-escalator position-l-2"></span>
              <span data-tooltip="#tooltip-l-3" class="ico ico-escalator position-l-3"></span>
              <span data-tooltip="#tooltip-l-4" class="ico ico-escalator position-l-4"></span>
              <span data-tooltip="#tooltip-l-5" class="ico ico-escalator position-l-5"></span>
            </div>
            <div data-role="elevator" class="elements elements-elevator">
              <span data-tooltip="#tooltip-l-6" class="ico ico-elevator position-l-6"></span>
              <span data-tooltip="#tooltip-l-7" class="ico ico-elevator position-l-7"></span>
              <span data-tooltip="#tooltip-l-8" class="ico ico-elevator position-l-8"></span>
              <span data-tooltip="#tooltip-l-9" class="ico ico-elevator position-l-9"></span>
            </div>
            <div data-role="restroom" class="elements elements-restroom">
              <span data-tooltip="#tooltip-l-10" class="ico ico-restroom position-l-10"></span>
              <span data-tooltip="#tooltip-l-11" class="ico ico-restroom position-l-11"></span>
            </div>
            <div data-role="information" class="elements elements-information">
              <span data-tooltip="#tooltip-l-12" class="ico ico-information position-l-12"></span>
            </div>
            <div data-role="vending" class="elements elements-vending">
              <span data-tooltip="#tooltip-l-13" class="ico ico-vending position-l-13"></span>
              <span data-tooltip="#tooltip-l-14" class="ico ico-vending position-l-14"></span>
            </div>
            <div data-role="phone" class="elements elements-phone">
              <span data-tooltip="#tooltip-l-15" class="ico ico-phone position-l-15"></span>
              <span data-tooltip="#tooltip-l-16" class="ico ico-phone position-l-16"></span>
            </div>
            <div data-role="mail" class="elements elements-mail">
              <span class="ico ico-mail position-l-17 ss-icon ss-standard ss-mail"><span class="tooltip pull-center"><span class="tooltip-hd">U.S. Mail Box</span></span></span>
            </div>
            <div data-role="baggage" class="elements elements-baggage">
              <span data-tooltip="#tooltip-l-18" data-role="baggage-1" class="ico ico-baggage position-l-18">1</span>
              <span data-tooltip="#tooltip-l-19" data-role="baggage-2" class="ico ico-baggage position-l-19">2</span>
              <span data-tooltip="#tooltip-l-20" data-role="baggage-3" class="ico ico-baggage position-l-20">3</span>
              <span data-tooltip="#tooltip-l-21" data-role="baggage-4" class="ico ico-baggage position-l-21">4</span>
              <span data-tooltip="#tooltip-l-22" data-role="baggage-5" class="ico ico-baggage position-l-22">5</span>
              <span data-tooltip="#tooltip-l-23" data-role="baggage-6" class="ico ico-baggage position-l-23">6</span>
            </div>
            <div data-role="pet-area" class="elements elements-pet-area">
              <span data-url="#desc-l-24" class="ico ico-pet-area position-l-24"><span class="tooltip pull-center"><span class="tooltip-title">Animal Relief Area</span> <span class="ss-icon">&#x25BB;</span></span></span>
            </div>
            <div data-role="baggage-office" class="elements elements-baggage-office">
              <span data-tooltip="#tooltip-l-25" class="ico ico-baggage-office position-l-25">WN</span>
              <span data-tooltip="#tooltip-l-26" class="ico ico-baggage-office position-l-26">AA</span>
              <span data-tooltip="#tooltip-l-27" class="ico ico-baggage-office position-l-27">UA</span>
              <span data-tooltip="#tooltip-l-28" class="ico ico-baggage-office position-l-28">DL</span>
            </div>
            <div data-role="g2" class="elements elements-g2">
              <span data-tooltip="#" class="ico ico-g2 position-l-40"></span>
            </div>

            <div data-role="rental-car" class="elements elements-rental-car">
              <span data-tooltip="#" class="ico ico-rental-car position-l-29">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-30">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-31">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-32">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-33">RC</span>
<!--              <span data-tooltip="#" class="ico ico-rental-car position-l-34">RC</span>-->
              <span data-tooltip="#" class="ico ico-rental-car position-l-35">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-36">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-37">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-38">RC</span>
              <span data-tooltip="#" class="ico ico-rental-car position-l-39">RC</span>
            </div>
            <div data-role="conferenceroom" class="elements elements-conferenceroom">
              <span data-tooltip="#" class="ico ico-conferenceroom position-l-34"></span>
            </div>
          </div>
          <div class="level level-parking" id="level-parking">
            <div class="img-level-mobile"><img src="theme/images/map-new/level-parking-img-level-mobile.png" alt=""/></div>
            <div class="img-level"><img src="theme/images/map-new/level-parking-img-level.png" alt=""/></div>
            <div class="img-default">
              <h3>Parking</h3>
              <img src="theme/images/map-new/level-parking-img-default.png" alt=""/>
            </div>
            <div class="elements elements-cashier">
              <span data-tooltip="#tooltip-p-1" class="ico ico-cashier position-p-1"></span>
              <span data-tooltip="#tooltip-p-2" class="ico ico-cashier position-p-2"></span>
              <span data-tooltip="#tooltip-p-3" class="ico ico-cashier position-p-3"></span>
            </div>
          </div>
          <div class="level level-parking-map" id="level-parking-map">
            <div class="img-level-mobile"><img src="theme/images/map-new/level-parking-map-img-level-mobile.png" alt=""/></div>
            <div class="img-level"><img src="theme/images/map-new/level-parking-map-img-level.png" alt=""/></div>
          </div>
          <div class="level level-car-rental" id="level-car-rental">
            <a target="_blank" class="link" href="https://www.google.com/maps/place/5201+S+Meridian+Ave,+Oklahoma+City,+OK+73159/@35.4090351,-97.6054785,15z/data=!4m5!3m4!1s0x87b21202a84be20f:0xc4aae00c47076f77!8m2!3d35.4138512!4d-97.601936">5201 S.Meridian Ave.</a>
            <div class="img-level-mobile"><img src="theme/images/map-new/level-parking-car-rental-level-mobile.png" alt=""/></div>
            <div class="img-level"><img src="theme/images/map-new/level-parking-car-rental-level.png" alt=""/></div>
          </div>
        </div>
        <div class="shadow right"></div>
        <div class="shadow left"></div>
      </div>
      <div id="img-nav-level-lover-and-upper" class="img-nav-level-lover-and-upper">
        <a href="#level-upper" class="img-level-overview img-level-upper">
          <div class="image hover"><img src="theme/images/map-new/nav-upper-level-active.png" alt=""/></div>
          <div class="image"><img src="theme/images/map-new/nav-upper-level-default.png" alt=""/></div>
          <span class="desc">Upper Level</span>
        </a>
        <a href="#level-lower" class="img-level-overview img-level-lower">
          <div class="image hover"><img src="theme/images/map-new/nav-lower-level-active.png" alt=""/></div>
          <div class="image"><img src="theme/images/map-new/nav-lower-level-default.png" alt=""/></div>
          <span class="desc">Lower Level</span>
        </a>
      </div>
    </div>
  </div>
  <?php include 'tpl/layout/footer.inc'; ?>
</div>
</body>
</html>