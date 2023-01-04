<!DOCTYPE html>
<html>
<head>
	<title>Mabs Fitness</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>



<body>

<div class="board">
  <center> <h1> WELCOME TO MABS FITNESS</h1> </center>
</div>

<div class="container">
  <div class="row">
    <div class="well">
      <h3>Healthy Meal Plan - 30 Days</h3>
      <h4>$30.00 USD</h4>
    </div>
    <div class="col-sm-7">
    <form class="register" action="popup3.php" method="POST">
     <div class="form-group">
        <?php
          if (isset($_GET['error'])) {?>
            <div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
        <?php }elseif(isset($_GET['success'])){?>
            <div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
        <?php } ?>
      </div>
          <li> <input type="text" name="fullname" placeholder="Full name"> </li>
          <li> <input type="hidden" name="package" value="healthy meal"> </li>
          <li> <input type="email" name="email" placeholder="Email Address"> </li>
          <li> <input type="password" name="password" placeholder="Create Password"> </li>
          <li> <input type="password" name="con_password" placeholder="Confirm Password"> </li>
          <li> <input type="text" name="address" placeholder="Address"> </li>
          <li> <input type="text" name="city" placeholder="City"> </li>
          <li> <select id="country" name="country">
                <option value="usa">United States of America</option>
                <option value="algeria">Algeria</option>
                <option value="andorra">Andorra</option>
                <option value="angola">Angola</option>
                <option value="antigua">Antigua and Barbuda</option>
                <option value="argentina">Argentina</option>
                <option value="armenia">Armenia</option>
                <option value="australia">Australia</option>
                <option value="austria">Austria</option>
                <option value="azerbaijan">Azerbaijan</option>
                <option value="bahamas">Bahamas</option>
                <option value="bahrain">Bahrain</option>
                <option value="bangladesh">Bangladesh</option>
                <option value="barbados">Barbados</option>
                <option value="belarus">Belarus</option>
                <option value="belgium">Belgium</option>
                <option value="belize">Belize</option>
                <option value="benin">Benin</option>
                <option value="bhutan">Bhutan</option>
                <option value="bolivia">Bolivia</option>
                <option value="bosnia">Bosnia and Herzgovina</option>
                <option value="botswana">Botswana</option>
                <option value="brazil">Brazil</option>
                <option value="brunei">Brunei</option>
                <option value="bulgaria">Bulgaria</option>
                <option value="burkina">Burkina Faso</option>
                <option value="burundi">Burundi</option>
                <option value="cabo">Cabo Verde</option>
                <option value="cambodia">Cambodia</option>
                <option value="cameroon">Cameroon</option>
                <option value="canada">Canada</option>
                <option value="car">Central African Republic</option>
                <option value="chad">Chile</option>
                <option value="china">China</option>
                <option value="colombia">Colombia</option>
                <option value="comoros">Comoros</option>
                <option value="cdr">Congo DR</option>
                <option value="congo">Republic of Congo</option>
                <option value="costarica">Costa Rica</option>
                <option value="cote">Cote d'Ivoire</option>
                <option value="croatia">Croatia</option>
                <option value="cuba">Cuba</option>
                <option value="cyprus">Cyprus</option>
                <option value="czech">Czech Republic</option>
                <option value="denmark">Denmark</option>
                <option value="djibouti">Djibouti</option>
                <option value="dominica">Dominica</option>
                <option value="dominican">Dominican Republic</option>
                <option value="east-timor">East Timor</option>
                <option value="ecuador">Ecuador</option>
                <option value="egypt">Egypt</option>
                <option value="savador">El Savador</option>
                <option value="equitorial">Equitorial Guinea</option>
                <option value="eritrea">Eritrea</option>
                <option value="estonia">Estonia</option>
                <option value="eswatini">Eswatini</option>
                <option value="ethiopia">Ethiopia</option>
                <option value="fiji">Fiji</option>
                <option value="finland">Finland</option>
                <option value="france">France</option>
                <option value="gabon">Gabon</option>
                <option value="gambia">The Gambia</option>
                <option value="georgia">Georgia</option>
                <option value="germany">Germany</option>
                <option value="ghana">Ghana</option>
                <option value="greece">Greece</option>
                <option value="grenada">Grenada</option>
                <option value="guatemala">Guatemala</option>
                <option value="guinea">Guinea</option>
                <option value="guinea-bissau">Guinea-Bissau</option>
                <option value="guyana">Guyana</option>
                <option value="haiti">Haiti</option>
                <option value="honduras">Honduras</option>
                <option value="hungary">Hungary</option>
                <option value="iceland">Iceland</option>
                <option value="india">India</option>
                <option value="indonesia">Indonesia</option>
                <option value="ireland">Ireland</option>
                <option value="isreal">Isreal</option>
                <option value="italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="japan">Japan</option>
                <option value="jordan">Jordan</option>
                <option value="kazakhstan">Kazakhstan</option>
                <option value="kenya">Kenya</option>
                <option value="kiribati">Kiribati</option>
                <option value="kosovo">Kosovo</option>
                <option value="kuwait">Kuwait</option>
                <option value="kyrgyzstan">Kyrgyzstan</option>
                <option value="laos">Laos</option>
                <option value="latvia">Latvia</option>
                <option value="lebanon">Lebanon</option>
                <option value="lesotho">Lesotho</option>
                <option value="liberia">Liberia</option>
                <option value="libya">Libya</option>
                <option value="liechtenstein">Liechtenstein</option>
                <option value="lithuania">Lithuania</option>
                <option value="luxembourg">Luxembourg</option>
                <option value="madagascar">Madagascar</option>
                <option value="malawi">Malawi</option>
                <option value="maldives">Maldives</option>
                <option value="mali">Mali</option>
                <option value="malta">Malta</option>
                <option value="marshall">Marshall Islands</option>
                <option value="mauritania">Mauritania</option>
                <option value="mauritius">Mauritius</option>
                <option value="mexico">Mexico</option>
                <option value="micronesia">Micronesia</option>
                <option value="moldova">Moldova</option>
                <option value="monaco">Monaco</option>
                <option value="mongolia">Mongolia</option>
                <option value="montenegro">Montenegro</option>
                <option value="morocco">Morocco</option>
                <option value="mozambique">Mozambique</option>
                <option value="myanmar">Myanmar</option>
                <option value="namibia">Namibia</option>
                <option value="nauru">Nauru</option>
                <option value="nepal">Nepal</option>
                <option value="netherlands">Netherlands</option>
                <option value="zealand">New Zealand</option>
                <option value="nicaragua">Nicaragua</option>
                <option value="niger">Niger</option>
                <option value="nigeria">Nigeria</option>
                <option value="macedonia">North Macedonia</option>
                <option value="dprk">North Korea</option>
                <option value="norway">Norway</option>
                <option value="oman">Oman</option>
                <option value="pakistan">Pakistan</option>
                <option value="palau">Palau</option>
                <option value="panama">Panama</option>
                <option value="papua">Papua New Guinea</option>
                <option value="paraguay">Paraguay</option>
                <option value="peru">Peru</option>
                <option value="phillipines">Phillipines</option>
                <option value="poland">Poland</option>
                <option value="portugal">Portugal</option>
                <option value="qatar">Qatar</option>
                <option value="romania">Romania</option>
                <option value="russia">Russia</option>
                <option value="rwanda">Rwanda</option>
                <option value="saint-kitts">Saint Kitts and Nevis </option>
                <option value="saint-lucia">Saint Lucia</option>
                <option value="saint-vincent">Saint Vincent and the Grenadines</option>
                <option value="samoa">Samoa</option>
                <option value="san-marino">San Marino</option>
                <option value="sao-tome">Sao Tome and Principe</option>
                <option value="saudi">Saudi Arabia</option>
                <option value="senegal">Senegal</option>
                <option value="serbia">Serbia</option>
                <option value="seychelles">Seychelles</option>
                <option value="sierra">Sierra Leone</option>
                <option value="singapore">Singapore</option>
                <option value="slovekia">Slovakia</option>
                <option value="slovenia">Slovenia</option>
                <option value="solomon">Solomon Islands</option>
                <option value="south-africa">South Africa</option>
                <option value="korea">South Korea</option>
                <option value="sudan">South Sudan</option>
                <option value="spain">Spain</option>
                <option value="sri-lanka">Sri Lanka</option>
                <option value="suriname">Suriname</option>
                <option value="sweden">Sweden</option>
                <option value="switzerland">Switzerland</option>
                <option value="syria">Syria</option>
                <option value="taiwan">Taiwan</option>
                <option value="tajikistan">Tajikistan</option>
                <option value="tanzania">Tanzania</option>
                <option value="thailand">Thailand</option>
                <option value="togo">Togo</option>
                <option value="tonga">Tonga</option>
                <option value="trinidad">Trinidad and Tobago</option>
                <option value="tunisia">Tunisia</option>
                <option value="turkey">Turkey</option>
                <option value="turkmenistan">Turkmenistan</option>
                <option value="tuvalu">Tuvalu</option>
                <option value="uganda">Uganda</option>
                <option value="ukraine">Ukraine</option>
                <option value="uae">United Arab Emirates</option>
                <option value="uk">United Kingdom</option>
                <option value="uruguay">Uruguay</option>
                <option value="uzbekistan">Uzbekistan</option>
                <option value="vanuatu">Vanuatu</option>
                <option value="venezuela">Venezuela</option>
                <option value="vietnam">Vietnam</option>
                <option value="yemen">Yemen</option>
                <option value="zambia">Zambia</option>
                <option value="zimbabwe">Zimbabwe</option>
               </select>
          </li>
          <li> <input type="text" name="zipcode" placeholder="Zip/Postal code"> </li>
          <button type="submit" name="create"> Create my subscription</button>
        </form>
        <h4>Supported by</h4>
        <img src="img/img-8.png" class="img-responsive">
    </div>


    <div class="col-sm-5">
      <h3> Message from Mabs </h3>
      <video controls>
        <source src="img/vid.mp4" type="video/mp4">
      </video>

      <h3>Take the 30 Days Challenge</h3>
      <h4>Ready to jump start your weight loss or switch up your workout regimen? Well let's do it</h4>

      <p>What you'll get</p>
      
      <ul>
        <li>Daily Virtual Fun Workouts,</li>
        <li>Dail Healthy Meal Plans,</li>
        <li>Dedicated WhatsApp Support Group</li>
      </ul>

      <!-- <p>What you'll learn</p>
        <ul>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</li>
        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</li>
      </ul> -->

     <b> Program Access is available immediately after purchase. Simply log in using the email and password you provided during registeration.</b>
    </div>

  </div>
</div>





<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>




