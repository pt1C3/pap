<?php
session_start();
if (isset($_SESSION["username"]) == false || isset($_SESSION["password"]) == false) header("location:./register.php") ?>
<html>

<head>
    <title>Account Creation - LetsGame</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="accountCreation.css">
    <link rel="icon" href="./images/iconfavicon.ico">
</head>

<body>
    <!--Navbar-->
    <?php
    include './components/navbar.php';

    $username = $_SESSION["username"];
    $password = $_SESSION["password"];

    ?>
    <!--Navbar-->

    <!--Login Page-->



    <div class="dataRegister">
        <h1>Account Details</h1>
        <form class="register-form" action="./auth/accountRegist.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?= $username ?>">
            <input type="hidden" name="password" value="<?= $password ?>">
            <input type="email" placeholder="Email" name="email" required /><br>
            <input type="text" placeholder="Name" name="name" required /><br>
            <input type="date" name="birthdate" required />

            <div class="sex">
                <p style="padding-right:36%;font-size:13pt;padding-bottom:20px;">I am:</p>
                <label for="male">Male</label>
                <input type="radio" name="sex" value="M" required />
                <label for="female">Female</label>
                <input type="radio" name="sex" value="F" required />
                <label for="other">Other</label>
                <input type="radio" name="sex" value="O" required />
                <br>
            </div>
            <br>


            <input type="text" placeholder="Steam Profile Link" name="steam" /><br>
            <input type="text" placeholder="Epic Games ID" name="epic" /><br>
            <input type="text" placeholder="Uplay ID" name="uplay" /><br>
            <select name="country">
                <option value='Afghanistan'>Afghanistan</option>
                <option value='Albania'>Albania</option>
                <option value='Algeria'>Algeria</option>
                <option value='Andorra'>Andorra</option>
                <option value='Angola'>Angola</option>
                <option value='Antigua and Barbuda'>Antigua and Barbuda</option>
                <option value='Argentina'>Argentina</option>
                <option value='Armenia'>Armenia</option>
                <option value='Australia'>Australia</option>
                <option value='Austria'>Austria</option>
                <option value='Azerbaijan'>Azerbaijan</option>
                <option value='Bahamas '>Bahamas </option>
                <option value='Bahrain'>Bahrain</option>
                <option value='Bangladesh'>Bangladesh</option>
                <option value='Barbados'>Barbados</option>
                <option value='Belarus'>Belarus</option>
                <option value='Belgium'>Belgium</option>
                <option value='Belize'>Belize</option>
                <option value='Benin'>Benin</option>
                <option value='Bhutan'>Bhutan</option>
                <option value='Bolivia'>Bolivia</option>
                <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
                <option value='Botswana'>Botswana</option>
                <option value='Brazil'>Brazil</option>
                <option value='Brunei Darussalam'>Brunei Darussalam</option>
                <option value='Bulgaria'>Bulgaria</option>
                <option value='Burkina Faso'>Burkina Faso</option>
                <option value='Burundi'>Burundi</option>
                <option value='Cabo Verde'>Cabo Verde</option>
                <option value='Cambodia'>Cambodia</option>
                <option value='Cameroon'>Cameroon</option>
                <option value='Canada'>Canada</option>
                <option value='Central African Republic'>Central African Republic</option>
                <option value='Chad'>Chad</option>
                <option value='Chile'>Chile</option>
                <option value='China'>China</option>
                <option value='Colombia'>Colombia</option>
                <option value='Comoros'>Comoro</option>
                <option value='Congo'>Congo</option>
                <option value='Costa Rica'>Costa Rica</option>
                <option value='Croatia'>Croatia</option>
                <option value='Cuba'>Cuba</option>
                <option value='Cyprus'>Cyprus</option>
                <option value='Czechia'>Czechia</option>
                <option value='Democratic Republic of the Congo'>Democratic Republic of the Congo</option>
                <option value='Denmark'>Denmark</option>
                <option value='Djibouti'>Djibouti</option>
                <option value='Dominica'>Dominica</option>
                <option value='Dominican Republic'>Dominican Republic</option>
                <option value='Ecuador'>Ecuador</option>
                <option value='Egypt'>Egypt</option>
                <option value='El Salvador'>El Salvador</option>
                <option value='Equatorial Guinea'>Equatorial Guinea</option>
                <option value='Eritrea'>Eritrea</option>
                <option value='Estonia'>Estonia</option>
                <option value='Eswatini'>Eswatini</option>
                <option value='Ethiopia'>Ethiopia</option>
                <option value='Fiji'>Fiji</option>
                <option value='Finland'>Finland</option>
                <option value='France'>France</option>
                <option value='Gabon'>Gabon</option>
                <option value='Gambia'>Gambia</option>
                <option value='Georgia'>Georgia</option>
                <option value='Germany'>Germany</option>
                <option value='Ghana'>Ghana</option>
                <option value='Greece'>Greece</option>
                <option value='Grenada'>Grenada</option>
                <option value='Guatemala'>Guatemala</option>
                <option value='Guinea'>Guinea</option>
                <option value='Guinea-Bissau'>Guinea-Bissau</option>
                <option value='Guyana'>Guyana</option>
                <option value='Haiti'>Haiti</option>
                <option value='Honduras'>Honduras</option>
                <option value='Hungary'>Hungary</option>
                <option value='Iceland'>Iceland</option>
                <option value='India'>India</option>
                <option value='Indonesia'>Indonesia</option>
                <option value='Iran'>Iran </option>
                <option value='Iraq'>Iraq</option>
                <option value='Ireland'>Ireland</option>
                <option value='Israel'>Israel</option>
                <option value='Italy'>Italy</option>
                <option value='Jamaica'>Jamaica</option>
                <option value='Japan'>Japan</option>
                <option value='Jordan'>Jordan</option>
                <option value='Kazakhstan'>Kazakhstan</option>
                <option value='Kenya'>Kenya</option>
                <option value='Kiribati'>Kiribati</option>
                <option value='Kuwait'>Kuwait</option>
                <option value='Kyrgyzstan'>Kyrgyzstan</option>
                <option value='Latvia'>Latvia</option>
                <option value='Lebanon'>Lebanon</option>
                <option value='Lesotho'>Lesotho</option>
                <option value='Liberia'>Liberia</option>
                <option value='Libya'>Libya</option>
                <option value='Liechtenstein'>Liechtenstein</option>
                <option value='Lithuania'>Lithuania</option>
                <option value='Luxembourg'>Luxembourg</option>
                <option value='Madagascar'>Madagascar</option>
                <option value='Malawi'>Malawi</option>
                <option value='Malaysia'>Malaysia</option>
                <option value='Maldives'>Maldives</option>
                <option value='Mali'>Mali</option>
                <option value='Malta'>Malta</option>
                <option value='Marshall Islands'>Marshall Islands</option>
                <option value='Mauritania'>Mauritania</option>
                <option value='Mauritius'>Mauritius</option>
                <option value='Mexico'>Mexico</option>
                <option value='Micronesia'>Micronesia</option>
                <option value='Monaco'>Monaco</option>
                <option value='Mongolia'>Mongolia</option>
                <option value='Montenegro'>Montenegro</option>
                <option value='Morocco'>Morocco</option>
                <option value='Mozambique'>Mozambique</option>
                <option value='Myanmar'>Myanmar</option>
                <option value='Namibia'>Namibia</option>
                <option value='Nauru'>Nauru</option>
                <option value='Nepal'>Nepal</option>
                <option value='Netherlands'>Netherlands</option>
                <option value='New Zealand'>New Zealand</option>
                <option value='Nicaragua'>Nicaragua</option>
                <option value='Niger '>Niger </option>
                <option value='Nigeria'>Nigeria</option>
                <option value='North Macedonia'>North Macedonia</option>
                <option value='Norway'>Norway</option>
                <option value='Oman'>Oman</option>
                <option value='Pakistan'>Pakistan</option>
                <option value='Palau'>Palau</option>
                <option value='Panama'>Panama</option>
                <option value='Papua New Guinea'>Papua New Guinea</option>
                <option value='Paraguay'>Paraguay</option>
                <option value='Peru'>Peru</option>
                <option value='Philippines'>Philippines</option>
                <option value='Poland'>Poland</option>
                <option value='Portugal'>Portugal</option>
                <option value='Qatar'>Qatar</option>
                <option value='Republic of Korea'>Republic of Korea</option>
                <option value='Republic of Moldova'>Republic of Moldova</option>
                <option value='Romania'>Romania</option>
                <option value='Russian Federation'>Russian Federation</option>
                <option value='Rwanda'>Rwanda</option>
                <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
                <option value='Saint Lucia'>Saint Lucia</option>
                <option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
                <option value='Samoa'>Samoa</option>
                <option value='San Marino'>San Marino</option>
                <option value='Sao Tome and Principe'>Sao Tome and Principe</option>
                <option value='Saudi Arabia'>Saudi Arabia</option>
                <option value='Senegal'>Senegal</option>
                <option value='Serbia'>Serbia</option>
                <option value='Seychelles'>Seychelles</option>
                <option value='Sierra Leone'>Sierra Leone</option>
                <option value='Singapore'>Singapore</option>
                <option value='Slovakia'>Slovakia</option>
                <option value='Slovenia'>Slovenia</option>
                <option value='Solomon Islands'>Solomon Islands</option>
                <option value='Somalia'>Somalia</option>
                <option value='South Africa'>South Africa</option>
                <option value='South Sudan'>South Sudan</option>
                <option value='Spain'>Spain</option>
                <option value='Sri Lanka'>Sri Lanka</option>
                <option value='Sudan'>Sudan</option>
                <option value='Suriname'>Suriname</option>
                <option value='Sweden'>Sweden</option>
                <option value='Switzerland'>Switzerland</option>
                <option value='Syrian Arab Republic'>Syrian Arab Republic</option>
                <option value='Tajikistan'>Tajikistan</option>
                <option value='Thailand'>Thailand</option>
                <option value='Timor-Leste'>Timor-Leste</option>
                <option value='Togo'>Togo</option>
                <option value='Tonga'>Tonga</option>
                <option value='Trinidad and Tobago'>Trinidad and Tobago</option>
                <option value='Tunisia'>Tunisia</option>
                <option value='Turkey'>Turkey</option>
                <option value='Turkmenistan'>Turkmenistan</option>
                <option value='Tuvalu'>Tuvalu</option>
                <option value='Uganda'>Uganda</option>
                <option value='Ukraine'>Ukraine</option>
                <option value='United Arab Emirates'>United Arab Emirates</option>
                <option value='United Kingdom of Great Britain and Northern Ireland'>United Kingdom of Great Britain and Northern Ireland </option>
                <option value='United Republic of Tanzania'>United Republic of Tanzania</option>
                <option value='United States of America'>United States of America </option>
                <option value='Uruguay'>Uruguay</option>
                <option value='Uzbekistan'>Uzbekistan</option>
                <option value='Vanuatu'>Vanuatu</option>
                <option value='Venezuela'>Venezuela </option>
                <option value='Viet Nam'>Viet Nam</option>
                <option value='Yemen'>Yemen</option>
                <option value='Zambia'>Zambia</option>
                <option value='Zimbabwe'>Zimbabwe</option>
            </select><br>
            <label class="imgbutton" for="image" >Profile Image</label>    
            <input  type="file" id="image" name="image" accept="image/png, image/jpeg" required><br>
            <input type="text" name="biography" placeholder="Biography" style="width:40%;text-align:left;">
            <br>
            <input type="submit" class="button" value="Let's Gam" >


        </form>

    </div>
    <!--Register Page-->
    <?php include './components/footer.php'; ?>
</body>

</html>