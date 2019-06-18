<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('common/head'); ?>
        <script src="<?= root ?>assets/angularjs/core/angular.min.js"></script>
        <style>
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
        </style>
    </head>
    <body>
        <?php $this->load->view('common/nav'); ?>

        <!-- Breadcrumb Area Start -->
        <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(<?= root; ?>assets/theme/img/bg-img/27.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="page-title">ABSTRACT SUBMISSION</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Abstract</li>
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
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.company.$invalid && !userForm.company.$pristine, 'has-success' : userForm.company.$valid && !userForm.company.$pristine }">
                                        <input type="text" class="form-control" id="company" ng-minlength="2" ng-maxlength="175" placeholder="Company / University" name="company" ng-model="company" required autocomplete="off">
                                        <p ng-show="userForm.company.$error.required && userForm.company.$invalid && !userForm.company.$pristine" class="help-block">Company is required.</p>
                                        <p ng-show="userForm.company.$error.maxlength && userForm.company.$invalid && !userForm.company.$pristine" class="help-block">Max length is 175.</p>
                                        <?= form_error('company'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.presentation.$invalid && !userForm.presentation.$pristine, 'has-success' : userForm.presentation.$valid && !userForm.presentation.$pristine }">
                                        <input type="text" class="form-control" id="presentation" ng-minlength="2" ng-maxlength="175" placeholder="Type of Presentation" name="presentation" ng-model="presentation" required autocomplete="off">
                                        <p ng-show="userForm.presentation.$error.required && userForm.presentation.$invalid && !userForm.presentation.$pristine" class="help-block">Presentation is required.</p>
                                        <p ng-show="userForm.presentation.$error.maxlength && userForm.presentation.$invalid && !userForm.presentation.$pristine" class="help-block">Max length is 175.</p>
                                        <?= form_error('presentation'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-5" ng-class="{'has-error' : userForm.conferences.$invalid && !userForm.conferences.$pristine, 'has-success' : userForm.conferences.$valid && !userForm.conferences.$pristine }">
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
                                <div class="col-md-4">
                                    <div class="form-group" ng-class="{ 'has-error' : userForm.abstract.$invalid && !userForm.abstract.$pristine, 'has-success' : userForm.abstract.$valid && !userForm.abstract.$pristine }">
                                        <label class="control-label">Abstract File</label>
                                        <span class="text-danger">*</span>&nbsp;&nbsp;
                                        <span class="help-block errorabstract"></span>
                                        <input type="file" onChange="ValidateSingleInput(this);" class="form-control" id="abstract" name="abstract" ng-model="abstract" required valid-file>
                                        <p style="margin-top: 10px; color:#31708f; margin-bottom: 0; font-size: 11px;"><i>Accepts ( DOC | DOCX | PDF | TXT ) Files | Upto 3MB</i></p>
                                        <p ng-show="!userForm.abstract.$valid && !userForm.abstract.$pristine" class="help-block">Abstract is required</p>
                                        <?= form_error('abstract'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" ng-class="{ 'has-error' : userForm.biography.$invalid && !userForm.biography.$pristine, 'has-success' : userForm.biography.$valid && !userForm.biography.$pristine }">
                                        <label class="control-label">Biography</label>
                                        <span class="text-danger">*</span>&nbsp;&nbsp;
                                        <span class="help-block errorbiography"></span>
                                        <input type="file" onChange="ValidateSingleInput(this);" class="form-control" id="biography" name="biography" ng-model="biography" required valid-file>
                                        <p style="margin-top: 10px; color:#31708f; margin-bottom: 0; font-size: 11px;"><i>Accepts ( DOC | DOCX | PDF | TXT ) Files | Upto 3MB</i></p>
                                        <p ng-show="!userForm.biography.$valid && !userForm.biography.$pristine" class="help-block">Biography is required</p>
                                        <?= form_error('biography'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" ng-class="{ 'has-error' : userForm.photo.$invalid && !userForm.photo.$pristine, 'has-success' : userForm.photo.$valid && !userForm.photo.$pristine }">
                                        <label class="control-label">Upload Photo</label>
                                        <span class="text-danger">*</span>&nbsp;&nbsp;
                                        <span class="help-block errorphoto"></span>
                                        <input type="file" onChange="ValidateSingleInput(this);" class="form-control" id="photo" name="photo" ng-model="photo" required valid-file>
                                        <p style="margin-top: 10px; color:#31708f; margin-bottom: 0; font-size: 11px;"><i>Accepts ( JPG | JPEG | PNG ) Files | Upto 3MB</i></p>
                                        <p ng-show="!userForm.photo.$valid && !userForm.photo.$pristine" class="help-block">Photo is required</p>
                                        <?= form_error('photo'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-4">
                                <button type="submit" class="btn confer-btn" ng-disabled="userForm.$invalid">Submit Abstract <i class="zmdi zmdi-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-12 pt-4">
                        <div class="text-left wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                            <h4 class="text-black text-uppercase mb-3 color-pink">GUIDELINES FOR ORAL, POSTER AND E-POSTER : </h4>
                            <p class="wow fadeInUp text-justify" data-wow-delay="300ms"><i class="fa fa-angle-double-right"></i>&nbsp; Abstracts should be submitted for plenary lectures, invited lectures, session lectures, poster presentations and E-posters. Participants presenting plenary lecture or invited lecture or session lecture or poster presentations or E-posters will be submitting abstracts and submitted abstracts will be reviewed for novelty and practical application. A confirmation mail will be sent in regards of receiving your abstract and if no mail has been received within two weeks, please contact the conference coordinator. Abstracts can be submitted online via the conference website or you can also send us through e-mail. Those submitted by fax or post will not be considered. All submissions will be acknowledged upon successful submission via the website to yourself and/or your co-authors from the online submission system.</p>
                            <ul class="abstract-points ml-4">
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">Abstract should be forwarded in word or PDF format</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">All abstracts must be written in English</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">Use a standard font like Arial or Times New Roman and 12-point size</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">The number of authors per abstract is unlimited. Authors should mention their affiliation. Corresponding author or presenting author should give his address along with complete contact details. In final conference book, only one author name will be mentioned, who is presenting in the conference.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">The title should have a maximum of 150 characters.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">Tables, graphs, and images are not allowed in abstract</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">Define all abbreviations and concepts in your abstract at first use.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">References are not required in abstract</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">Biography of the author must be included in the abstract or should be submitted separately.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">A latest photograph of author should be submitted</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">Abstracts can be submitted online via the conference website or you can also send us through e-mail. Those submitted by fax or post will not be considered. All submissions will be acknowledged upon successful submission via the website to yourself and/or your co-authors from the online submission system.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">A confirmation email will be sent in regards to receiving your abstract and if no email has been received within two weeks, please contact the conference coordinator.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">An acceptance letter will be sent to authors after review process is completed and abstract has been accepted for presentation.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">Check your submission with no grammatical or technical corrections.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">If there are any changes in abstract content, title or author details, please provide changes before printing process begins.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms">After completion of the conference, speakers could submit their full-length papers to any of our related journals and will be published within 2 months of time period.</li>
                            </ul>
                            <p class="wow fadeInUp text-justify" data-wow-delay="300ms"><i class="fa fa-angle-double-right"></i>&nbsp; For more details, please contact <b class="color-pink">nursing@conferencesus.com</b></p>
                            <p class="wow fadeInUp text-justify" data-wow-delay="300ms"><i class="fa fa-angle-double-right"></i>&nbsp; THE CONFERENCE OFFERS TWO OPTIONS FOR ABSTRACT SUBMISSION : <b class="color-pink">FORMAT A AND FORMAT B</b></p>
                            <h4 class="text-black text-uppercase mb-3 color-pink">FORMAT A : CLASSICAL SCIENTIFIC STUDIES</h4>
                            <p class="wow fadeInUp text-justify" data-wow-delay="300ms"><i class="fa fa-angle-double-right"></i>&nbsp; <b>The first option is most suited for scientific research. The abstract text should not exceed 250 words. Abstracts presented under the first option should contain concise statements of : </b></p>
                            <ul class="abstract-points ml-4 mb-4">
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>The title of Presentation : </b> Follow standard title capitalization and scientific names should be italicized.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Author Name(s) and Affiliation(s) : </b> The first name should be the presenting author.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Background : </b> indicates the purpose and objective of the research, the hypothesis that was tested or a description of the problem being analyzed or evaluated.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Materials & Methods : </b> the experimental methods used ( including statistical analysis employed ).</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Results : </b> present as clearly as possible the findings/outcome of the study, with specific results in summarized form.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Conclusions : </b> A summary of findings that are supported by your results.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Biography : </b> Short description of presenting author.</li>
                            </ul>
                            <h4 class="text-black text-uppercase mb-3 color-pink">FORMAT B: REVIEW BASED ON STUDIES</h4>
                            <p class="wow fadeInUp text-justify" data-wow-delay="300ms"><i class="fa fa-angle-double-right"></i>&nbsp; <b>The second option abstract submission should contain concise statements of : </b></p>
                            <ul class="abstract-points ml-4 mb-4">
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>The title of Presentation : </b> Follow standard title capitalization and scientific names should be italicized.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Author Name(s) and Affiliation(s) : </b> The first name should be the presenting author.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Background : </b> indicates the purpose and objective of the research, the hypothesis that was tested or a description of the problem being analyzed or evaluated.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Maximum Length : </b> The abstract text should not exceed 250 words.</li>
                                <li class="wow fadeInUp text-justify ml-4" data-wow-delay="300ms"><b>Biography : </b> Short description of presenting author.</li>
                            </ul>
                            <p class="wow fadeInUp text-justify" data-wow-delay="300ms"><i class="fa fa-angle-double-right"></i>&nbsp; <b>We encourage work that introduces new ideas and conceptualizations, research and understanding to the field, as well as analysis of both success and failure.</b></p>
                            <p class="wow fadeInUp text-justify" data-wow-delay="300ms"><i class="fa fa-angle-double-right"></i>&nbsp; For more details, please contact <b class="color-pink">nursing@conferencesus.com</b></p>
                        </div>
                    </div>
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
                $scope.submitForm = function (e, isValid) {
                    if (!isValid) {
                        e.preventDefault();
                    }
                };
            });

            validationApp.directive('validFile', function () {
                return {
                    require: 'ngModel',
                    link: function (scope, el, attrs, ngModel) {
                        //change event is fired when file is selected
                        el.bind('change', function () {
                            scope.$apply(function () {
                                ngModel.$setViewValue(el.val());
                                ngModel.$render();
                            });
                        });
                    }
                }
            });

        </script>

        <script>
            var _validFileExtensions = [];
            function ValidateSingleInput(oInput) {
                _validFileExtensions = (oInput.id === 'photo') ? [".jpg", ".jpeg", ".png"] : [".doc", ".docx", ".pdf", ".txt"];
                if (oInput.type == 'file') {
                    var sFileName = oInput.value;
                    var ids = oInput.id;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }
                        if (!blnValid) {
                            $(".error" + ids).text("Invalid Attachment File");
                            $(".error" + ids).show();
                            oInput.value = "";
                            $('#' + ids).focus();
                            return false;
                        }
                    }
                }
                var filesize = oInput.files[0].size / 1024 / 1024; /* IN KB */
                var id = oInput.id;
                if (filesize >= 3) {
                    $(".error" + ids).html("less than or 3MB..!");
                    $(".error" + ids).show();
                    oInput.value = "";
                    $('#' + ids).focus();
                    return false;
                } else {
                    $(".error" + ids).hide();
                    return true;
                }
                return true;
            }
        </script>
    </body>
</html>