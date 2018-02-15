<?php $title = 'volunteerapplication-Map'; ?>
<?php include 'tpl/includes/head.inc'; ?>
<body class="page">
<div class="outer-wrapper">
  <?php include 'tpl/layout/header.inc'; ?>
  <div class="top-image">
    <div class="img">
      <img src="theme/images/tmp/top-img-volunteerapplication.jpg" alt=""/>
    </div>
  </div>
  <div class="content-wrapper site-container">
    <div class="top-navigation">
      <h1>VOLUNTEER APPLICATION</h1>
    </div>
    <div class="form form-volunteer">
      <div class="row">
        <div class="col col-md-8">
          <div class="fields-inline">
            <div class="form-item form-select">
              <label>Date</label>
              <select class="form-select" name="" id="">
                <option value="">Month</option>
                <option value="">Month</option>
                <option value="">Month</option>
                <option value="">Month</option>
              </select>
            </div>
            <div class="form-item form-select">
              <select class="form-select" name="" id="">
                <option value="">Day</option>
                <option value="">Day</option>
                <option value="">Day</option>
                <option value="">Day</option>
              </select>
            </div>
            <div class="form-item form-select">
              <select class="form-select" name="" id="">
                <option value="">Year</option>
                <option value="">Year</option>
                <option value="">Year</option>
                <option value="">Year</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="First Name"/>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Middle Name"/>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Last Name"/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Address"/>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Zip"/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Phone"/>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Mobile"/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Emergency Contact"/>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Number"/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Email"/>
              </div>
            </div>
            <div class="col-sm-6 field-birthday">
              <div class="form-item form-type-text">
                <input type="text" class="form-text" placeholder="Birthday"/>
                <span class="field-suffix">(MM/DD/YYYY)</span>
              </div>
            </div>
          </div>
          <div class="form-item form-type-text">
            <input type="text" class="form-text" placeholder="Occupation"/>
          </div>
          <div class="form-item form-type-text">
            <input type="text" class="form-text" placeholder="Languages"/>
          </div>
          <div class="form-item form-type-text">
            <input type="text" class="form-text" placeholder="Experience"/>
          </div>
          <div class="form-item form-type-text">
            <input type="text" class="form-text" placeholder="How did you hear about us?"/>
          </div>
        </div>
        <div class="col col-md-4">
          <h6>Preferred Schedule</h6>
          <div class="form-item form-radios">
            <label>Weekday</label>
            <div class="form-item form-type-radio">
              <input type="radio" class="form-radio" name="radio" id="radio1"/>
              <label for="radio1">10am - 2pm</label>
            </div>
            <div class="form-item form-type-radio">
              <input type="radio" class="form-radio" name="radio" id="radio2"/>
              <label for="radio2">2pm - 6pm</label>
            </div>
            <div class="form-item form-type-radio">
              <input type="radio" class="form-radio" name="radio" id="radio3"/>
              <label for="radio3">6pm - 10pm</label>
            </div>
          </div>
          <div class="form-item form-checkboxes">
            <label>Weekend</label>
            <div class="form-item form-type-checkbox">
              <input type="checkbox" class="form-checkbox" name="radio1" id="radio4"/>
              <label for="radio4">10am - 2pm</label>
            </div>
            <div class="form-item form-type-checkbox">
              <input type="checkbox" class="form-checkbox" name="radio2" id="radio5"/>
              <label for="radio5">2pm - 6pm</label>
            </div>
            <div class="form-item form-type-checkbox">
              <input type="checkbox" class="form-checkbox" name="radio3" id="radio6"/>
              <label for="radio6">6pm - 10pm</label>
            </div>
          </div>
          <p>Thank you for your interest in volunteering at Will Rogers World Airport. After you complete and submit the online form, one of our representatives will contact you.</p>
          <br/>
          <div class="btn-wrap style-c">
            <input type="submit" class="form-submit" value="SUBMIT FORM">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'tpl/layout/footer.inc'; ?>
</div>
</body>
</html>