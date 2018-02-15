<?php $title = 'Arrivals'; ?>
<?php include 'tpl/includes/head.inc'; ?>
<body class="page page-arrivals">
<div class="outer-wrapper">
  <?php include 'tpl/layout/header.inc'; ?>
  <div class="top-image">
    <div class="img">
      <img src="theme/images/tmp/top-img.jpg" alt=""/>
    </div>
  </div>
  <div class="content-wrapper site-container">

    <div class="top-navigation">
      <h1>ARRIVALS</h1>
    </div>

    <div class="form form-filter">
      <div class="form-item form-type-select">
        <select class="form-select" name="" id="">
          <option>Airline</option>
          <option>Airline</option>
        </select>
      </div>

      <div class="form-item form-type-select">
        <select class="form-select" name="" id="">
          <option>Location</option>
          <option>Location</option>
        </select>
      </div>

      <div class="form-item form-type-numberfield form-item-number">
        <input type="text" class="form-text" placeholder="Flight #"/>
      </div>

      <div class="btn-wrap style-c">
        <input type="submit" class="form-submit" value="Filter"/>

        <div class="ajax-progress ajax-progress-throbber">
          <div class="throbber">&nbsp;</div>
        </div>
      </div>
    </div>
    <div class="filter-items">
      <div class="form-item form-type-select style-a">
        <label>Status</label>
        <select class="form-select style-a" name="" id="">
          <option>Arriving Next Hour</option>
          <option>Arriving Next Age</option>
        </select>
      </div>

      <div class="tags">
        <span>Filtered by</span>
        <div class="tags-wrap">
          <span class="tag">Airline: Southwest Airlines <a href="#"></a></span>
          <span class="tag">From: Seattle, WA (SEA) <a href="#"></a></span>
        </div>
       <div class="clear-wrap">
         <input type="submit" value="Clear Filters" class="clear-filter"/>
         <div class="ajax-progress ajax-progress-throbber">
           <div class="throbber">&nbsp;</div>
         </div>
       </div>
      </div>

      <div class="view-type">
        <div class="form-item form-type-radios form-item-output-type">
          <label for="edit-output-type">View </label>
          <div id="edit-output-type" class="form-radios ctools-auto-submit-exclude"><div class="form-item form-type-radio form-item-output-type">
              <input class="ctools-auto-submit-exclude blocks form-radio" type="radio" id="edit-output-type-blocks" name="output_type" value="blocks">  <label class="option" for="edit-output-type-blocks">blocks </label>

            </div>
            <div class="form-item form-type-radio form-item-output-type">
              <input class="ctools-auto-submit-exclude list form-radio" type="radio" id="edit-output-type-list" name="output_type" value="list" checked="checked">  <label class="option" for="edit-output-type-list">list </label>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="items">
      <div class="item">
        <div class="title-top"><h4>SAN</h4><span>From <strong>San Diego, CA</strong></span></div>
        <span class="flight-number">810</span>
        <div class="title-bottom"><span>To <strong>Oklahoma City, OK</strong></span> <h4>OKC</h4></div>
        <div class="desc">
        <div class="left-part">
          <div class="img"><img src="theme/images/tmp/logo.png" alt=""/></div>
          <a href="#">track-a-flight</a>
        </div>
          <div class="right-part">
            <span class="time">11:25am</span>
            <span class="status style-a">ON TIME</span>
            <span class="info">GATE <strong>4</strong>  BAGS <strong>3</strong></span>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="title-top"><h4>Den</h4><span>From <strong>Denver, CO</strong></span></div>
        <span class="flight-number">931</span>
        <div class="title-bottom"><span>To <strong>Oklahoma City, OK</strong></span> <h4>OKC</h4></div>
        <div class="desc">
          <div class="left-part">
            <div class="img"> <img src="theme/images/tmp/logo-4.png" alt=""/></div>
            <a href="#">track-a-flight</a>
          </div>
          <div class="right-part">
            <span class="time">11:36am</span>
            <span class="status style-a">ON TIME</span>
            <span class="info">GATE <strong>2</strong>  BAGS <strong>1</strong></span>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="title-top"><h4>FLG</h4><span>From <strong> Flagstaff, AZ</strong></span></div>
        <span class="flight-number">21</span>
        <div class="title-bottom"><span>To <strong>Oklahoma City, OK</strong></span> <h4>OKC</h4></div>
        <div class="desc">
          <div class="left-part">
            <div class="img"> <img src="theme/images/tmp/logo-2.png" alt=""/></div>
            <a href="#">track-a-flight</a>
          </div>
          <div class="right-part">
            <span class="time">11:44am</span>
            <span class="status style-a">ON TIME</span>
            <span class="info">GATE <strong>9</strong>  BAGS <strong>6</strong></span>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="title-top"><h4>SEA</h4><span>From <strong>Seattle, WA</strong></span></div>
        <span class="flight-number">3819</span>
        <div class="title-bottom"><span>To <strong>Oklahoma City, OK</strong></span> <h4>OKC</h4></div>
        <div class="desc">
          <div class="left-part">
            <div class="img">  <img src="theme/images/tmp/logo-5.png" alt=""/></div>
            <a href="#">track-a-flight</a>
          </div>
          <div class="right-part">
            <span class="time">11:54am</span>
            <span class="status style-b">DELAYED</span>
            <span class="info">GATE <strong>3</strong>  BAGS <strong>5</strong></span>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="title-top"><h4>CMH</h4><span>From <strong>Columbus, OH</strong></span></div>
        <span class="flight-number">233</span>
        <div class="title-bottom"><span>To <strong>Oklahoma City, OK</strong></span> <h4>OKC</h4></div>
        <div class="desc">
          <div class="left-part">
            <div class="img"> <img src="theme/images/tmp/logo-6.png" alt=""/></div>
            <a href="#">track-a-flight</a>
          </div>
          <div class="right-part">
            <span class="time">12:06am</span>
            <span class="status style-a">ON TIME</span>
            <span class="info">GATE <strong>12</strong>  BAGS <strong>7</strong></span>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="title-top"><h4>DFW</h4><span>From <strong>Dallas, TX</strong></span></div>
        <span class="flight-number">786</span>
        <div class="title-bottom"><span>To <strong>Oklahoma City, OK</strong></span> <h4>OKC</h4></div>
        <div class="desc">
          <div class="left-part">
            <div class="img"><img src="theme/images/tmp/logo-3.png" alt=""/></div>
            <a href="#">track-a-flight</a>
          </div>
          <div class="right-part">
            <span class="time">11:25am</span>
            <span class="status style-b">DELAYED</span>
            <span class="info">GATE <strong>6</strong>  BAGS <strong>2</strong></span>
          </div>
        </div>
      </div>
    </div>
    <table class="flights-list">
      <thead>
      <tr>
        <th>Airline</th>
        <th>Flight #</th>
        <th>From</th>
        <th>Arriving</th>
        <th>Gate</th>
        <th>Bags</th>
        <th>Status</th>
        <th>Trak-A-Flight</th>
      </tr>
      </thead>

      <tbody>
      <tr>
        <td><img src="theme/images/tmp/logo-3.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>Arrived</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo-3.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo-3.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo-2.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>Arrived</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo-2.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo-2.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>Arrived</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo-2.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>Arrived</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo-2.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>Arrived</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo-2.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>

      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>Arrived</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      <tr>
        <td><img src="theme/images/tmp/logo.png" alt=""/></td>
        <td>4382</td>
        <td>Houston, TX</td>
        <td>10:17am</td>
        <td>5</td>
        <td>6</td>
        <td>10:47am</td>
        <td><a href="#"><img src="theme/images/icons/arrow-purple.png" alt=""/></a></td>
      </tr>
      </tbody>
    </table>
    <div class="flights-list-mobile">
      <div class="item">
        <div class="logo">
          <img src="theme/images/tmp/logo-3.png" alt=""/>
        </div>
        <p>From: Houston, TX</p>

        <p>Arrining: 10:17am - Gate: 5 Bags:6</p>

        <p><strong>Status: Arrived</strong></p>
        <span class="number">4382</span>
        <a href="">Trak-A-Flight</a>
      </div>

      <div class="item">
        <div class="logo">
          <img src="theme/images/tmp/logo-2.png" alt=""/>
        </div>
        <p>From: Houston, TX</p>

        <p>Arrining: 10:17am - Gate: 5 Bags:6</p>

        <p><strong>Status: Arrived</strong></p>
        <span class="number">1135</span>
        <a href="">Trak-A-Flight</a>
      </div>

      <div class="item">
        <div class="logo">
          <img src="theme/images/tmp/logo.png" alt=""/>
        </div>
        <p>From: Houston, TX</p>

        <p>Arrining: 10:17am - Gate: 5 Bags:6</p>

        <p><strong>Status: Arrived</strong></p>
        <span class="number">9383</span>
        <a href="">Trak-A-Flight</a>
      </div>
    </div>
    <div class="result-text">
      <p>No Flights Found</p>
    </div>
  </div>
  <?php include 'tpl/layout/footer.inc'; ?>
</div>
</body>
</html>