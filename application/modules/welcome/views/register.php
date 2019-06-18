<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('common/head'); ?>
        <script src="<?= root ?>assets/angularjs/core/angular.min.js"></script>
        <style>
            table th, table td {vertical-align: middle !important;}
            .form-control{font-size:13px !important;}
            .has-success .help-block,.has-success .control-label,.has-success .radio,.has-success .checkbox,.has-success .radio-inline,.has-success .checkbox-inline,.has-success.radio label,.has-success.checkbox label,.has-success.radio-inline label, .has-success.checkbox-inline label{color:#3c763d !important;}
            .has-success .form-control{border-color:#3c763d !important;}
            .has-success .form-control:focus{border-color:#2b542c !important;}
            .has-success .input-group-prepend .input-group-text{color:#3c763d !important;background-color:#dff0d8 !important;border-color:#3c763d !important;}
            .has-success .form-control-feedback{color:#3c763d !important;}
            .has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label{color:#a94442 !important;font-size:12px;}
            .has-error .form-control{border-color:#a94442 !important;}
            .has-error .form-control:focus{border-color:#843534 !important;}
            .has-error .input-group-prepend .input-group-text{color:#a94442 !important;background-color:#f2dede !important;border-color:#a94442 !important;}
            .has-error .form-control-feedback{color:#a94442 !important;}
            .control-label{font-size:14px !important;font-weight:500;}
            .abstract{padding:40px;background:#5d5e8d0d;box-shadow:0 1px 1px 0 rgba(0, 0, 0, 0.06), 0 2px 5px 0 rgba(0, 0, 0, 0.2)}
            .abstract-points li {font-weight: 500; font-size: 15px; margin-bottom: 10px; line-height: 26px; list-style-type: square;}
            .reg-table .table thead th {border-bottom: none;}
            .reg-table .table th {border-top: none;}
            .font-small {font-size: 13px !important;}
            .bg-grayy {background: #eee;}


            .radiobtn {
                position: relative;
                display: block;
            }
            .radiobtn label {
                display: block;
                background: #fee8c3;
                color: #444;
                border-radius: 0px;
                padding: 10px 20px;
                border: 2px solid #fdd591;
                margin-bottom: 0px;
                cursor: pointer;
            }
            .radiobtn label:after, .radiobtn label:before {
                content: "";
                position: absolute;
                right: 11px;
                top: 11px;
                width: 20px;
                height: 20px;
                border-radius: 3px;
                background: #fdcb77;
            }
            .radiobtn label:before {
                background: transparent;
                transition: 0.1s width cubic-bezier(0.075, 0.82, 0.165, 1) 0s, 0.3s height cubic-bezier(0.075, 0.82, 0.165, 2) 0.1s;
                z-index: 2;
                overflow: hidden;
                background-repeat: no-repeat;
                background-size: 13px;
                background-position: center;
                width: 0;
                height: 0;
                background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNS4zIDEzLjIiPiAgPHBhdGggZmlsbD0iI2ZmZiIgZD0iTTE0LjcuOGwtLjQtLjRhMS43IDEuNyAwIDAgMC0yLjMuMUw1LjIgOC4yIDMgNi40YTEuNyAxLjcgMCAwIDAtMi4zLjFMLjQgN2ExLjcgMS43IDAgMCAwIC4xIDIuM2wzLjggMy41YTEuNyAxLjcgMCAwIDAgMi40LS4xTDE1IDMuMWExLjcgMS43IDAgMCAwLS4yLTIuM3oiIGRhdGEtbmFtZT0iUGZhZCA0Ii8+PC9zdmc+);
            }
            .radiobtn input[type="radio"] {
                display: none;
                position: absolute;
                width: 100%;
                appearance: none;
            }
            .radiobtn input[type="radio"]:checked + label {
                background: #fdcb77;
                animation-name: blink;
                animation-duration: 1s;
                border-color: #fcae2c;
            }
            .radiobtn input[type="radio"]:checked + label:after {
                background: #fcae2c;
            }
            .radiobtn input[type="radio"]:checked + label:before {
                width: 20px;
                height: 20px;
            }
            @keyframes blink {
                0% {
                    background-color: #fdcb77;
                }
                10% {
                    background-color: #fdcb77;
                }
                11% {
                    background-color: #fdd591;
                }
                29% {
                    background-color: #fdd591;
                }
                30% {
                    background-color: #fdcb77;
                }
                50% {
                    background-color: #fdd591;
                }
                45% {
                    background-color: #fdcb77;
                }
                50% {
                    background-color: #fdd591;
                }
                100% {
                    background-color: #fdcb77;
                }
            }




            .ks-cboxtags label{
                display: inline-block;
                white-space: nowrap;
                margin: 0px;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-tap-highlight-color: transparent;
                transition: all .2s;
            }

            .ks-cboxtags label {
                padding: 10px 20px;
                cursor: pointer;
                width: 100%;
                border: 2px solid #89e7f5;
                background-color: #a1f1fd;
            }

            .ks-cboxtags label::before {
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                font-family: FontAwesome;
                font-weight: 900;
                font-size: 12px;
                padding: 2px 10px 2px 2px;
                content: "\f067";
                transition: transform .3s ease-in-out;
            }

            .ks-cboxtags input[type="checkbox"]:checked + label::before {
                content: "\f00c";
                transform: rotate(-360deg);
                transition: transform .3s ease-in-out;
            }

            .ks-cboxtags input[type="checkbox"]:checked + label {
                border: 2px solid #1bdbf8;
                background-color: #12bbd4;
                color: #fff;
                transition: all .2s;
            }

            .ks-cboxtags input[type="checkbox"] {
                display: absolute;
            }
            .ks-cboxtags input[type="checkbox"] {
                position: absolute;
                opacity: 0;
            }
            .ks-cboxtags input[type="checkbox"]:focus + label {
                border: 2px solid #e9a1ff;
            }

        </style>
    </head>
    <body>
        <?php $this->load->view('common/nav'); ?>

        <!-- Breadcrumb Area Start -->
        <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(<?= root; ?>assets/theme/img/bg-img/31.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="page-title">Registration</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Registration</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Area End -->

        <section class="py-5 my-3">
            <div class="container">
                <?php $this->load->view('common/alert'); ?>
                <div class="contact_input_area mb-5" ng-app="validationApp" ng-controller="mainController">
                    <form method="post" action="<?= current_url(); ?>" name="userForm" enctype="multipart/form-data" id="userForm" ng-submit="submitForm($event, userForm.$valid)" novalidate>
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <div class="reg-table mb-5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center bg-grayy">REGISTRATION TYPE</th>
                                        <th class="text-uppercase bg-primary text-center text-white">Early Registration</th>
                                        <th class="text-uppercase bg-danger text-center text-white">Standard Registration</th>
                                        <th class="text-uppercase bg-success text-center text-white">Onsite Registration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center font-small">User Registration Type</td>
                                        <td class="text-center font-small">On/Before <b>June 15, 2019</b></td>
                                        <td class="text-center font-small">On/Before <b>July 15, 2019</b></td>
                                        <td class="text-center font-small">On/Before <b>September 19, 2019</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase bg-grayy p-0 font-small">
                                            <div class="radiobtn">
                                                <input type="radio" id="speaker" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="speaker" required />
                                                <label for="speaker"><b>Speaker</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$649</b></td>
                                        <td class="text-center font-small"><b>$749</b></td>
                                        <td class="text-center font-small"><b>$899</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="delegate" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="delegate" required />
                                                <label for="delegate"><b>Delegate</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$449</b></td>
                                        <td class="text-center font-small"><b>$549</b></td>
                                        <td class="text-center font-small"><b>$599</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="student" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="student" required />
                                                <label for="student"><b>Student</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$349</b></td>
                                        <td class="text-center font-small"><b>$349</b></td>
                                        <td class="text-center font-small"><b>$349</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="poster_speaker" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="poster_speaker" required />
                                                <label for="poster_speaker"><b>Poster + Speaker</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$749</b></td>
                                        <td class="text-center font-small"><b>$849</b></td>
                                        <td class="text-center font-small"><b>$999</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="poster_student" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="poster_student" required />
                                                <label for="poster_student"><b>Poster + Student</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$349</b></td>
                                        <td class="text-center font-small"><b>$349</b></td>
                                        <td class="text-center font-small"><b>$349</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="poster_non_student" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="poster_non_student" required />
                                                <label for="poster_non_student"><b>Poster + Non Student</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$449</b></td>
                                        <td class="text-center font-small"><b>$549</b></td>
                                        <td class="text-center font-small"><b>$599</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="oneday_speaker" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="oneday_speaker" required />
                                                <label for="oneday_speaker"><b>Speaker - One Day Participation</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$399</b></td>
                                        <td class="text-center font-small"><b>$499</b></td>
                                        <td class="text-center font-small"><b>$599</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="oneday_delegate" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="oneday_delegate" required />
                                                <label for="oneday_delegate"><b>Delegate - One Day Participation</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$349</b></td>
                                        <td class="text-center font-small"><b>$399</b></td>
                                        <td class="text-center font-small"><b>$499</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="radiobtn">
                                                <input type="radio" id="workshop" name="reg_type" ng-model="reg_type" ng-click="setTotal($event)" value="workshop" required />
                                                <label for="workshop"><b>Workshop</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$749</b></td>
                                        <td class="text-center font-small"><b>$849</b></td>
                                        <td class="text-center font-small"><b>$999</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="ks-cboxtags">
                                                <input type="checkbox" name="poster" id="poster" ng-model="poster" ng-click="setTotal($event)" value="E-Poster">
                                                <label for="poster"><b>e - Poster</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$49</b></td>
                                        <td class="text-center font-small"><b>$49</b></td>
                                        <td class="text-center font-small"><b>$49</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="ks-cboxtags">
                                                <input type="checkbox" name="platinum" ng-model="platinum" id="platinum" ng-click="setTotal($event)" value="Platinum Sponsorship">
                                                <label for="platinum"><b>Platinum Sponsorship</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$3499</b></td>
                                        <td class="text-center font-small"><b>$3499</b></td>
                                        <td class="text-center font-small"><b>$3499</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="ks-cboxtags">
                                                <input type="checkbox" name="gold" ng-model="gold" id="gold" ng-click="setTotal($event)" value="Gold Sponsorship">
                                                <label for="gold"><b>Gold Sponsorship</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$2999</b></td>
                                        <td class="text-center font-small"><b>$2999</b></td>
                                        <td class="text-center font-small"><b>$2999</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="ks-cboxtags">
                                                <input type="checkbox" name="silver" ng-model="silver" id="silver" ng-click="setTotal($event)" value="Silver Sponsorship">
                                                <label for="silver"><b>Silver Sponsorship</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$1999</b></td>
                                        <td class="text-center font-small"><b>$1999</b></td>
                                        <td class="text-center font-small"><b>$1999</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-uppercase p-0 font-small bg-grayy">
                                            <div class="ks-cboxtags">
                                                <input type="checkbox" name="lunch" ng-model="lunch" id="lunch" ng-click="setTotal($event)" value="Exhibitor / Lunch Sponsor / Advertisements">
                                                <label for="lunch"><b>Exhibitor / Lunch Sponsor / Advertisements</b></label>
                                            </div>
                                        </td>
                                        <td class="text-center font-small"><b>$1499</b></td>
                                        <td class="text-center font-small"><b>$1499</b></td>
                                        <td class="text-center font-small"><b>$1499</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="abstract">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.designation.$invalid && !userForm.designation.$pristine, 'has-success' : userForm.designation.$valid && !userForm.designation.$pristine }">
                                        <select name="designation" id="designation"  class="form-control" ng-model="designation" required>
                                            <option value="">Select Designation</option>
                                            <?php foreach ($designations as $designation) { ?>
                                                <option value="<?= $designation->id; ?>"><?= $designation->designation_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <p ng-show="userForm.designation.$error.required && userForm.designation.$invalid && !userForm.designation.$pristine" class="help-block">Designation is required.</p>
                                        <?= form_error('designation'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.firstname.$invalid && !userForm.firstname.$pristine, 'has-success' : userForm.firstname.$valid && !userForm.firstname.$pristine }">
                                        <input type="text" class="form-control" id="firstname" ng-maxlength="75" placeholder="First Name" autocomplete="off" name="firstname" ng-model="firstname" required ng-pattern="/^[a-zA-Z' -]+$/">
                                        <p ng-show="userForm.firstname.$error.required && userForm.firstname.$invalid && !userForm.firstname.$pristine" class="help-block">Firstname is required.</p>
                                        <p ng-show="userForm.firstname.$error.pattern && userForm.firstname.$invalid && !userForm.firstname.$pristine" class="help-block">Accepts alphabet only.</p>
                                        <p ng-show="userForm.firstname.$error.maxlength && userForm.firstname.$invalid && !userForm.firstname.$pristine" class="help-block">Max length is 75.</p>
                                        <?= form_error('firstname'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.lastname.$invalid && !userForm.lastname.$pristine, 'has-success' : userForm.lastname.$valid && !userForm.lastname.$pristine }">
                                        <input type="text" class="form-control" id="lastname" ng-maxlength="75" placeholder="Last Name" name="lastname" ng-model="lastname" required ng-pattern="/^[a-zA-Z' -]+$/" autocomplete="off">
                                        <p ng-show="userForm.lastname.$error.required && userForm.lastname.$invalid && !userForm.lastname.$pristine" class="help-block">Lastname is required.</p>
                                        <p ng-show="userForm.lastname.$error.pattern && userForm.lastname.$invalid && !userForm.lastname.$pristine" class="help-block">Accepts alphabet only.</p>
                                        <p ng-show="userForm.lastname.$error.maxlength && userForm.lastname.$invalid && !userForm.lastname.$pristine" class="help-block">Max length is 75.</p>
                                        <?= form_error('lastname'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.email.$invalid && !userForm.email.$pristine, 'has-success' : userForm.email.$valid && !userForm.email.$pristine }">
                                        <input type="text" name="email" id="email"  class="form-control" placeholder="Email" ng-maxlength="75" ng-model="email" required ng-pattern="/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/" autocomplete="off" />  
                                        <p ng-show="userForm.email.$error.required && userForm.email.$invalid && !userForm.email.$pristine" class="help-block">Email is required.</p>
                                        <p ng-show="userForm.email.$error.pattern && userForm.email.$invalid && !userForm.email.$pristine" class="help-block">Enter valid email.</p>
                                        <p ng-show="userForm.email.$error.maxlength && userForm.email.$invalid && !userForm.email.$pristine" class="help-block">Max length is 75.</p>
                                        <?= form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.country.$invalid && !userForm.country.$pristine, 'has-success' : userForm.country.$valid && !userForm.country.$pristine }">
                                        <select name="country" id="country"  class="form-control" ng-model="country" required>
                                            <option value="">Select Country</option>
                                            <?php foreach ($countries as $country) { ?>
                                                <option value="<?= $country->id; ?>"><?= $country->country_name . ' (+' . $country->country_code . ') '; ?></option>
                                            <?php } ?>
                                        </select>
                                        <p ng-show="userForm.country.$error.required && userForm.country.$invalid && !userForm.country.$pristine" class="help-block">Country is required.</p>
                                        <?= form_error('country'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.mobile.$invalid && !userForm.mobile.$pristine, 'has-success' : userForm.mobile.$valid && !userForm.mobile.$pristine }">
                                        <input type="text" class="form-control" ng-minlength="7" ng-maxlength="12" id="mobile" placeholder="Mobile Number" ng-model="mobile" required ng-pattern="/^[0-9]*$/" onkeypress="return isNumberPress(event)" name="mobile" autocomplete="off">
                                        <p ng-show="userForm.mobile.$error.required && userForm.mobile.$invalid && !userForm.mobile.$pristine" class="help-block">Mobile is required.</p>
                                        <p ng-show="userForm.mobile.$error.pattern && userForm.mobile.$invalid && !userForm.mobile.$pristine" class="help-block">Accepts only numbers.</p>
                                        <p ng-show="userForm.mobile.$error.minlength && userForm.mobile.$invalid && !userForm.mobile.$pristine && !userForm.mobile.$error.pattern" class="help-block">Min length is 7.</p>
                                        <p ng-show="userForm.mobile.$error.maxlength && userForm.mobile.$invalid && !userForm.mobile.$pristine && !userForm.mobile.$error.pattern" class="help-block">Max length is 12.</p>
                                        <?= form_error('mobile'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" ng-class="{'has-error' : userForm.company.$invalid && !userForm.company.$pristine, 'has-success' : userForm.company.$valid && !userForm.company.$pristine }">
                                        <input type="text" class="form-control" id="company" ng-minlength="2" ng-maxlength="175" placeholder="Company / University" name="company" ng-model="company" required autocomplete="off">
                                        <p ng-show="userForm.company.$error.required && userForm.company.$invalid && !userForm.company.$pristine" class="help-block">Company is required.</p>
                                        <p ng-show="userForm.company.$error.maxlength && userForm.company.$invalid && !userForm.company.$pristine" class="help-block">Max length is 175.</p>
                                        <?= form_error('company'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" ng-class="{'has-error' : userForm.presentation.$invalid && !userForm.presentation.$pristine, 'has-success' : userForm.presentation.$valid && !userForm.presentation.$pristine }">
                                        <input type="text" class="form-control" id="presentation" ng-minlength="2" ng-maxlength="175" placeholder="Type of Presentation" name="presentation" ng-model="presentation" required autocomplete="off">
                                        <p ng-show="userForm.presentation.$error.required && userForm.presentation.$invalid && !userForm.presentation.$pristine" class="help-block">Presentation is required.</p>
                                        <p ng-show="userForm.presentation.$error.maxlength && userForm.presentation.$invalid && !userForm.presentation.$pristine" class="help-block">Max length is 175.</p>
                                        <?= form_error('presentation'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" ng-class="{'has-error' : userForm.conferences.$invalid && !userForm.conferences.$pristine, 'has-success' : userForm.conferences.$valid && !userForm.conferences.$pristine }">
                                        <select name="conferences" id="conferences"  class="form-control" ng-model="conferences" required>
                                            <option value="">Select Conference Theme</option>
                                            <?php foreach ($conferences as $conference) { ?>
                                                <option value="<?= $conference->id; ?>"><?= $conference->title; ?></option>
                                            <?php } ?>
                                        </select>
                                        <p ng-show="userForm.conferences.$error.required && userForm.conferences.$invalid && !userForm.conferences.$pristine" class="help-block">Conference is required.</p>
                                        <?= form_error('conferences'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-4">
                                <button type="submit" class="btn confer-btn" ng-disabled="userForm.$invalid">Submit Payment<i class="zmdi zmdi-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php $this->load->view('common/footer'); ?>
        <script>
            var validationApp = angular.module('validationApp', []);
            validationApp.controller('mainController', function ($scope) {
                $scope.designation = '<?= set_value('designation') ?>';
                $scope.firstname = '<?= set_value('firstname') ?>';
                $scope.lastname = '<?= set_value('lastname') ?>';
                $scope.company = '<?= set_value('company') ?>';
                $scope.presentation = '<?= set_value('presentation') ?>';
                $scope.conferences = '<?= set_value('conferences') ?>';
                $scope.email = '<?= set_value('email') ?>';
                $scope.country = '<?= set_value('country') ?>';
                $scope.mobile = '<?= set_value('mobile') ?>';
                $scope.setTotal = function ($event) {
                    console.log($event.target.parentNode.parentNode);
                    var totalAmount = $scope.reg_type;
                    console.log(totalAmount);
                };
                $scope.submitForm = function (e, isValid) {
                    if (!isValid) {
                        e.preventDefault();
                    }
                };
            });
        </script>
    </body>
</html>