<!DOCTYPE html>
<html>
<head>
    <base href="/~eladqb/formValidation/">
    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />

    <!-- JS -->
    <script src="https://code.angularjs.org/1.4.0-rc.1/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.4.0-rc.1/angular-route.min.js"></script>
    <script src="https://code.angularjs.org/1.4.0-rc.1/angular-messages.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/registerService.js"></script>

    <script src="js/hdForm/hiddenForm.js"></script>
</head>
<body >
<div class="container">

    <form ng-app="mainApp" ng-controller="mainController" name="userForm" ng-submit="submitForm(userForm.$valid)" novalidate>

        <!-- FIRST NAME -->
        <div class="form-group"  ng-class="{ 'has-error' : userForm.firstname.$invalid }">
            <label>First Name</label>
            <input type="text" name="firstname" class="form-control" ng-model="user.firstname" ng-minlength="2" ng-maxlength="30" required/>
            <p ng-show="userForm.firstname.$invalid" class="help-block">Your name is required.</p>
            <p ng-show="userForm.firstname.$error.minlength" class="help-block">First name is too short.</p>
            <p ng-show="userForm.firstname.$error.maxlength" class="help-block">First name is too long.</p>
        </div>

        <!-- LAST NAME -->
        <div class="form-group"  ng-class="{ 'has-error' : userForm.lastname.$invalid  }">
            <label>Last Name</label>
            <input type="text" name="lastname" class="form-control" ng-model="user.lastname" ng-minlength="2" ng-maxlength="30"/>
            <p ng-show="userForm.lastname.$error.minlength" class="help-block">Last name is too short.</p>
            <p ng-show="userForm.lastname.$error.maxlength" class="help-block">Last name is too long.</p>
        </div>

        <!-- GENDER -->
        <div class="form-group" ng-controller="genderController" ng-class="{ 'has-error' : userForm.gender.$invalid  }">
            <label>Gender:  </label>
            <label><input type="radio" name="gender" ng-change="genderChanged('male')" ng-model="user.gender" value="male"  /> Male </label>
            <label><input type="radio" name="gender" ng-change="genderChanged('female')" ng-model="user.gender" value="female" /> Female </label>
        </div>

        <!-- EMAIL -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid }">
            <label>Email</label>
            <input type="email" name="email" class="form-control" ng-model="user.email" required/>
            <p ng-show="userForm.email.$invalid" class="help-block">Enter a valid email.</p>
        </div>

        <!-- PHONE -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.phone.$invalid }">
            <label>Phone</label>
            <input type="tel" name="phone" placeholder="000-123456789" class="form-control" ng-model="user.phone" ng-minlength="9" ng-maxlength="14" required/>
            <p ng-show="userForm.phone.$invalid" class="help-block">Your phone is required.</p>
            <p ng-show="userForm.phone.$error.minlenghth" class="help-block">Enter a valid phone.</p>
            <p ng-show="userForm.phone.$error.maxlenghth" class="help-block">Enter a valid phone.</p>
        </div>

        <!-- CURRENCY -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.currency.$invalid }">
            <label>Currency</label>
            <select name="currency" class="form-control" ng-model="user.currency" required>
                <option value="">Select</option>
                <option value="EUR">EURO €</option>
                <option value="USD">USD $</option>
                <option value="TRY">TRY TL</option>
                <option value="AUD">AUD AU$</option>
                <option value="RUB">RUB ₽</option>
                <option value="CNY">CNY ¥</option>
            </select>
            <p ng-show="userForm.currency.$invalid " class="help-block">Please Select</p>
        </div>

        <!-- COUNTRY -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.country.$invalid }">
            <label>Country</label>
        <select name="country" class="form-control" ng-model="user.country" required>
                <option value="">Select</option>
                <option value="242">Aland Islands</option>
                <option value="13">Australia</option>
                <option value="14">Austria</option>
                <option value="17">Bahrain</option>
                <option value="21">Belgium</option>
                <option value="29">Bouvet Island</option>
                <option value="31">British Indian Ocean Territory</option>
                <option value="38">Canada</option>
                <option value="49">Congo</option>
                <option value="50">Congo, the Democratic Republic of the</option>
                <option value="53">Cote D'Ivoire</option>
                <option value="56">Cyprus</option>
                <option value="57">Czech Republic</option>
                <option value="58">Denmark</option>
                <option value="69">Falkland Islands (Malvinas)</option>
                <option value="72">Finland</option>
                <option value="73">France</option>
                <option value="80">Germany</option>
                <option value="84">Greenland</option>
                <option value="93">Heard Island and Mcdonald Islands</option>
                <option value="94">Holy See (Vatican City State)</option>
                <option value="96">Hong Kong</option>
                <option value="97">Hungary</option>
                <option value="98">Iceland</option>
                <option value="101">Iran, Islamic Republic of</option>
                <option value="103">Ireland</option>
                <option value="105">Italy</option>
                <option value="107">Japan</option>
                <option value="109">Kazakhstan</option>
                <option value="112">Korea, Democratic People's Republic of</option>
                <option value="114">Kuwait</option>
                <option value="116">Lao People's Democratic Republic</option>
                <option value="121">Libyan Arab Jamahiriya</option>
                <option value="122">Liechtenstein</option>
                <option value="124">Luxembourg</option>
                <option value="125">Macao</option>
                <option value="126">Macedonia, the Former Yugoslav Republic of</option>
                <option value="129">Malaysia</option>
                <option value="138">Mexico</option>
                <option value="139">Micronesia, Federated States of</option>
                <option value="141">Monaco</option>
                <option value="146">Myanmar</option>
                <option value="150">Netherlands</option>
                <option value="153">New Zealand</option>
                <option value="158">Norfolk Island</option>
                <option value="160">Norway</option>
                <option value="161">Oman</option>
                <option value="164">Palestinian Territory</option>
                <option value="170">Pitcairn</option>
                <option value="171">Poland</option>
                <option value="174">Qatar</option>
                <option value="175">Reunion</option>
                <option value="176">Romania</option>
                <option value="177">Russia</option>
                <option value="179">Saint Helena</option>
                <option value="182">Saint Pierre and Miquelon</option>
                <option value="187">Saudi Arabia</option>
                <option value="192">Singapore</option>
                <option value="197">South Africa</option>
                <option value="198">South Georgia and the South Sandwich Islands</option>
                <option value="199">Spain</option>
                <option value="203">Svalbard and Jan Mayen</option>
                <option value="205">Sweden</option>
                <option value="206">Switzerland</option>
                <option value="207">Syrian Arab Republic</option>
                <option value="208">Taiwan, Province of China</option>
                <option value="210">Tanzania, United Republic of</option>
                <option value="222">Uganda</option>
                <option value="224">United Arab Emirates</option>
                <option value="225">United Kingdom</option>
                <option value="227">United States Minor Outlying Islands</option>
                <option value="232">Viet Nam</option>
                <option value="233">Virgin Islands, British</option>
                <option value="234">Virgin Islands, U.s.</option>
                <option value="235">Wallis and Futuna</option>
            </select >
            <p ng-show="userForm.country.$invalid" class="help-block">Please Select</p>
        </div>

        <!-- PASSWORD -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.password.$invalid }">
            <label>Password</label>
            <input type="password" name="password"  class="form-control" ng-model="user.password" ng-minlength="6" ng-maxlength="30" required/>
            <p ng-show="userForm.password.$invalid" class="help-block">Your password is required.</p>
            <p ng-show="userForm.password.$error.minlenghth" class="help-block">Enter a valid password.</p>
            <p ng-show="userForm.password.$error.maxlenghth" class="help-block">Enter a valid password.</p>
        </div>

        <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid">Submit</button>

        <ng-messages for="user.errors" role="alert" style="color: rgb(244,67,54);">
            <div ng-if="user.errors" ng-repeat="error in user.errors">
                <div ng-message-exp="error">{{ error }}</div>
            </div>
            <div ng-if="msg" ng-repeat="error in user.errors">
                <div ng-message-exp="error">{{ msg }}</div>
            </div>
        </ng-messages>
        <br>
    </form>
    <hd-form>

    </hd-form>


</div>
</body>
</html>
