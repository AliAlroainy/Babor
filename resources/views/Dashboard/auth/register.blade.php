<!DOCTYPE html>



























<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-semi-dark" data-assets-path="assets/" data-template="vertical-menu-template-semi-dark">

  
<!-- auth-register-multisteps.html , Sat, 26 Mar 2022 16:52:00 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Multi Steps Sign-up - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
<link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    
<!-- Page -->
<link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css">
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>

  <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">

    <!-- Left Text -->
    <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-end p-5 pe-0">
      <div class="w-px-400">
        <img src="assets/img/illustrations/create-account-light.png" class="img-fluid" alt="multi-steps" width="600" data-app-dark-img="illustrations/create-account-dark.png" data-app-light-img="illustrations/create-account-light.png">
      </div>
    </div>
    <!-- /Left Text -->

    <!--  Multi Steps Registration -->
    <div class="d-flex col-lg-8 align-items-center authentication-bg p-sm-5 p-3">
      <div class="w-px-700 mx-auto">
        <div id="multiStepsValidation" class="bs-stepper shadow-none">
          <div class="bs-stepper-header border-bottom-0">
            <div class="step" data-target="#accountDetailsValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="bx bx-home-alt"></i></span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Account</span>
                  <span class="bs-stepper-subtitle">Account Details</span>
                </span>
              </button>
            </div>
            <div class="line">
              <i class="bx bx-chevron-right"></i>
            </div>
            <div class="step" data-target="#personalInfoValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="bx bx-user"></i></span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Personal</span>
                  <span class="bs-stepper-subtitle">Enter Information</span>
                </span>
              </button>
            </div>
            <div class="line">
              <i class="bx bx-chevron-right"></i>
            </div>
            <div class="step" data-target="#billingLinksValidation">
              <button type="button" class="step-trigger">
                <span class="bs-stepper-circle"><i class="bx bx-detail"></i></span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Billing</span>
                  <span class="bs-stepper-subtitle">Payment Details</span>
                </span>
              </button>
            </div>
          </div>
          <div class="bs-stepper-content">
            <form id="multiStepsForm" onSubmit="return false">
              <!-- Account Details -->
              <div id="accountDetailsValidation" class="content">
                <div class="content-header mb-3">
                  <h3 class="mb-1">Account Information</h3>
                  <span>Enter Your Account Details</span>
                </div>
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsUsername">Username</label>
                    <input type="text" name="multiStepsUsername" id="multiStepsUsername" class="form-control" placeholder="johndoe" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsEmail">Email</label>
                    <input type="email" name="multiStepsEmail" id="multiStepsEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                  </div>
                  <div class="col-sm-6 form-password-toggle">
                    <label class="form-label" for="multiStepsPass">Password</label>
                    <div class="input-group input-group-merge">
                      <input type="password" id="multiStepsPass" name="multiStepsPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsPass2" />
                      <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  <div class="col-sm-6 form-password-toggle">
                    <label class="form-label" for="multiStepsConfirmPass">Confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input type="password" id="multiStepsConfirmPass" name="multiStepsConfirmPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsConfirmPass2" />
                      <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label class="form-label" for="multiStepsURL">Profile Link</label>
                    <input type="text" name="multiStepsURL" id="multiStepsURL" class="form-control" placeholder="johndoe/profile" aria-label="johndoe" />
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-label-secondary btn-prev" disabled> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                  </div>
                </div>
              </div>
              <!-- Personal Info -->
              <div id="personalInfoValidation" class="content">
                <div class="content-header mb-3">
                  <h3 class="mb-1">Personal Information</h3>
                  <span>Enter Your Personal Information</span>
                </div>
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsFirstName">First Name</label>
                    <input type="text" id="multiStepsFirstName" name="multiStepsFirstName" class="form-control" placeholder="John" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsLastName">Last Name</label>
                    <input type="text" id="multiStepsLastName" name="multiStepsLastName" class="form-control" placeholder="Doe" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsMobile">Mobile</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">US (+1)</span>
                      <input type="text" id="multiStepsMobile" name="multiStepsMobile" class="form-control multi-steps-mobile" placeholder="202 555 0111" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsPincode">Pincode</label>
                    <input type="text" id="multiStepsPincode" name="multiStepsPincode" class="form-control multi-steps-pincode" placeholder="Postal Code" maxlength="6" />
                  </div>
                  <div class="col-md-12">
                    <label class="form-label" for="multiStepsAddress">Address</label>
                    <input type="text" id="multiStepsAddress" name="multiStepsAddress" class="form-control" placeholder="Address" />
                  </div>
                  <div class="col-md-12">
                    <label class="form-label" for="multiStepsArea">Landmark</label>
                    <input type="text" id="multiStepsArea" name="multiStepsArea" class="form-control" placeholder="Area/Landmark" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsCity">City</label>
                    <input type="text" id="multiStepsCity" class="form-control" placeholder="Jackson" />
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label" for="multiStepsState">State</label>
                    <select id="multiStepsState" class="select2 form-select" data-allow-clear="true">
                      <option value="">Select</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">District Of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                  </div>
                </div>
              </div>
              <!-- Billing Links -->
              <div id="billingLinksValidation" class="content">
                <div class="content-header mb-3">
                  <h3 class="mb-1">Select Plan</h3>
                  <span>Select plan as per your requirement</span>
                </div>
                <!-- Custom plan options -->
                <div class="row gap-md-0 gap-3 mb-4">
                  <div class="col-md">
                    <div class="form-check custom-option custom-option-icon">
                      <label class="form-check-label custom-option-content" for="basicOption">
                        <span class="custom-option-body">
                          <h4 class="mb-2">Basic</h4>
                          <p class="mb-2">A simple start for start ups & Students</p>
                          <span class="d-flex justify-content-center">
                            <sup class="text-primary fs-big lh-1 mt-3">$</sup>
                            <span class="display-5 text-primary">0</span>
                            <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/month</sub>
                          </span>
                        </span>
                        <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="basicOption" />
                      </label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-check custom-option custom-option-icon">
                      <label class="form-check-label custom-option-content" for="standardOption">
                        <span class="custom-option-body">
                          <h4 class="mb-2">Standard</h4>
                          <p class="mb-2">For small to medium businesses</p>
                          <span class="d-flex justify-content-center">
                            <sup class="text-primary fs-big lh-1 mt-3">$</sup>
                            <span class="display-5 text-primary">99</span>
                            <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/month</sub>
                          </span>
                        </span>
                        <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="standardOption" checked />
                      </label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-check custom-option custom-option-icon">
                      <label class="form-check-label custom-option-content" for="enterpriseOption">
                        <span class="custom-option-body">
                          <h4 class="mb-2">Enterprise</h4>
                          <p class="mb-2">Solution for enterprise & organizations</p>
                          <span class="d-flex justify-content-center">
                            <sup class="text-primary fs-big lh-1 mt-3">$</sup>
                            <span class="display-5 text-primary">499</span>
                            <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/year</sub>
                          </span>
                        </span>
                        <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="enterpriseOption" />
                      </label>
                    </div>
                  </div>
                </div>
                <!--/ Custom plan options -->
                <div class="content-header mb-3">
                  <h3 class="mb-1">Payment Information</h3>
                  <span>Enter your card information</span>
                </div>
                <!-- Credit Card Details -->
                <div class="row g-3">
                  <div class="col-md-12">
                    <label class="form-label w-100" for="multiStepsCard">Card Number</label>
                    <div class="input-group input-group-merge">
                      <input id="multiStepsCard" class="form-control multi-steps-card" name="multiStepsCard" type="text" placeholder="1356 3215 6548 7898" aria-describedby="multiStepsCardImg" />
                      <span class="input-group-text cursor-pointer" id="multiStepsCardImg"><span class="card-type"></span></span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label class="form-label" for="multiStepsName">Name On Card</label>
                    <input type="text" id="multiStepsName" class="form-control" name="multiStepsName" placeholder="John Doe" />
                  </div>
                  <div class="col-6 col-md-4">
                    <label class="form-label" for="multiStepsExDate">Expiry Date</label>
                    <input type="text" id="multiStepsExDate" class="form-control multi-steps-exp-date" name="multiStepsExDate" placeholder="MM/YY" />
                  </div>
                  <div class="col-6 col-md-3">
                    <label class="form-label" for="multiStepsCvv">CVV Code</label>
                    <div class="input-group input-group-merge">
                      <input type="text" id="multiStepsCvv" class="form-control multi-steps-cvv" name="multiStepsCvv" maxlength="3" placeholder="654" />
                      <span class="input-group-text cursor-pointer" id="multiStepsCvvHelp"><i class="bx bx-help-circle text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                      <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
                  </div>
                </div>
                <!--/ Credit Card Details -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- / Multi Steps Registration -->
  </div>
</div>

<script>
// Check selected custom option
window.Helpers.initCustomOptionCheck();
</script>

<!-- / Content -->

  
  <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
  </div>
  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="assets/vendor/libs/hammer/hammer.js"></script>
  <script src="assets/vendor/libs/i18n/i18n.js"></script>
  <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
  
  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<script src="assets/vendor/libs/select2/select2.js"></script>
<script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="assets/js/pages-auth-multisteps.js"></script>
  
</body>


<!-- auth-register-multisteps.html , Sat, 26 Mar 2022 16:52:02 GMT -->
</html>
