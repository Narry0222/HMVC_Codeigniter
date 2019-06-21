<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('common/head'); ?>
        <script src="<?= root ?>assets/angularjs/core/angular.min.js"></script>
        <style>
            .login_view {max-width: 430px; margin-top: 50px;}
            .login_heading.panel-heading { background: #46b8da; color: #FFF;}
            .login_heading h4 {text-transform: uppercase; font-size: 22px;}
            .panel-info {box-shadow: 0 0 15px 2px #ddd;}
        </style>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <?php $this->load->view('common/nav'); ?>
            <div class="content-wrapper">
                <div class="m-heading"><h4>Change Password</h4></div>
                <div class="container login_view">
                    <?php $this->load->view('common/alert'); ?>
                    <div class="panel panel-info">
                        <div class="panel-heading text-center login_heading">
                            <h4>Change Password</h4>
                        </div>
                        <div class="panel-body" ng-app="validationApp" ng-controller="changeController">
                            <div class="col-md-12">
                                <form method="post" action="<?= current_url(); ?>" name="changeForm" id="changeForm" ng-submit="submitForm($event, changeForm.$valid)" novalidate>
                                    <div class="form-group" ng-class="{'has-error' : changeForm.current_password.$invalid && !changeForm.current_password.$pristine, 'has-success' : changeForm.current_password.$valid && !changeForm.current_password.$pristine }">
                                        <label>Current Password</label>
                                        <span class="star">*</span>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                            <input type="password" class="form-control" id="current_password"  placeholder="Enter Password" ng-model="current_password" autocomplete="off" required name="current_password">
                                        </div>
                                        <p ng-show="changeForm.current_password.$error.required && changeForm.current_password.$invalid && !changeForm.current_password.$pristine" class="help-block">Password is required.</p>
                                        <?= form_error('current_password'); ?>
                                    </div>
                                    <div class="form-group" ng-class="{'has-error' : changeForm.password.$invalid && !changeForm.password.$pristine, 'has-success' : changeForm.password.$valid && !changeForm.password.$pristine }">
                                        <label>New Password</label>
                                        <span class="star">*</span>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                            <input type="password" ng-minlength="6" class="form-control" id="password"  placeholder="Enter Password" ng-model="password" autocomplete="off" required name="password">
                                        </div>
                                        <p ng-show="changeForm.password.$error.required && changeForm.password.$invalid && !changeForm.password.$pristine" class="help-block">Password is required.</p>
                                        <p ng-show="changeForm.password.$error.minlength && changeForm.password.$invalid && !changeForm.password.$pristine && !changeForm.password.$error.required" class="help-block">Accepts min 6 characters.</p>    
                                        <?= form_error('password'); ?>
                                    </div>
                                    <div class="form-group" ng-class="{'has-error' : changeForm.confirm_password.$invalid && !changeForm.confirm_password.$pristine, 'has-success' : changeForm.confirm_password.$valid && !changeForm.confirm_password.$pristine }">
                                        <label>Confirm Password</label>
                                        <span class="star">*</span>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                            <input type="password" class="form-control" id="confirm_password"  placeholder="Enter Confirm Password" ng-model="confirm_password" autocomplete="confirm_password" required name="confirm_password" pw-check="password">
                                        </div>
                                        <p ng-show="changeForm.confirm_password.$error.required && changeForm.confirm_password.$invalid && !changeForm.confirm_password.$pristine" class="help-block">Confirm Password is required.</p>
                                        <p ng-show="changeForm.confirm_password.$error.pwmatch && changeForm.confirm_password.$invalid && !changeForm.confirm_password.$pristine && !changeForm.confirm_password.$error.required" class="help-block">Password does not match.</p>
                                        <?= form_error('confirm_password'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" style="margin-top: 15px;" value="Submit Password" ng-disabled="changeForm.$invalid" class="btn btn-info submit-button">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
        <script>
            var validationApp = angular.module('validationApp', []);

            validationApp.controller('changeController', function ($scope) {
                $scope.confirm_password = '<?= set_value('confirm_password'); ?>';
                $scope.password = '<?= set_value('password'); ?>';
                $scope.submitForm = function (e, isValid) {
                    if (!isValid) {
                        e.preventDefault();
                    }
                }
            });

            validationApp.directive('pwCheck', [function () {
                    return {
                        require: 'ngModel',
                        link: function (scope, elem, attrs, ctrl) {
                            var firstPassword = '#' + attrs.pwCheck;
                            elem.add(firstPassword).on('keyup', function () {
                                scope.$apply(function () {
                                    var v = elem.val() === $(firstPassword).val();
                                    ctrl.$setValidity('pwmatch', v);
                                });
                            });
                        }
                    }
                }]);
        </script>
    </body>
</html>