<?Php
session_start();
$id=$_GET['id'];
if(!is_numeric($id)){
echo "Data Error";
exit;
}
//db_conecton
$conn = mysqli_connect('localhost','root','','login');
//content
$sql="SELECT *  FROM landing where id='$id' ";
$result = mysqli_query($conn , $sql) or die("Bad Query : $sql");
//questions
$querya = mysqli_query($conn,"SELECT * FROM `que` WHERE `id`='".$id."'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>WhitePaper</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>
      .text {
         display: block;
         width: 195px;
         overflow: hidden;
         white-space: nowrap;
         text-overflow: ellipsis;
      }
   </style>
</head>
<body>
      <?php
      if (mysqli_num_rows($result) > 0 ) {
         while ($row = mysqli_fetch_array($result)) {
      ?>
   <section>
      <a class="navbar-brand" href=""><img src="upload/IT-securitytalks.gif" alt="logo" style="width:280px;"></a>
   </section>
      <section id="services-3" class="services-3 bg-lightgrey wide-60 services-section division">
         <h5 class="h3-md text-uppercase"
            style="color:black; background-color: orange; text-align: center; font-size: 25px;padding-left: 10px; padding-top: 30px;padding-bottom: 30px; font-family: Georgia;">
         <?php echo $row['title'] ?>
         </h5>
         <div class="container">
            <div class="row">
               <div class="col-lg-12" style="border-style: solid;">
                  <div class="section-title mb-60 ">
                  <br>
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="col-lg-4" data-wow-duration="2.5s" data-wow-delay="0.4s" style="margin-left:150px;">
                           <img class="" src="upload/<?php echo $row['image'] ?>" width="400" height="300"
                              style="  margin-left: 10px; border-radius: 0px; border:2px solid black;" />
                        </div>
                        <br>
                        <h3 name=whitepaper style="font-family: Georgia; font-size: 23px; text-align:center">
                           <?php echo $row['title'] ?>
                        </h3>
                        <br>
                        <h5 style="color:#800080; text-align:center; font-family: Georgia;">Date :
                           <?php echo $row['date'] ?> . Indusrty :
                           <?php echo $row['cat'] ?>
                        </h5>
                        <br>
                        <p
                           style="text-align: justify; padding:13px;margin:13px; color:black; font-size: 17px; font-family:  Merriweather;">
                           <?php echo $row['des'] ?>
                        </p>
                        <br>
                        <br>
                           <div>
                              <hr style="border-top: 1px solid black;">
                              <h3>Recommended for Professionals Like You:</h3>
                              <hr style="border-top: 1px solid black;">
                           </div>
                           <br>
                           <br>
                           <?php
                        	$sql = "select * from landing order by id desc limit 1";
                        	$resulta = mysqli_query($conn , $sql) or die("Bad Query : $sql");
                        ?>
                              <?php
                              if (mysqli_num_rows($resulta) > 0 ) {
                              while ($rowb = mysqli_fetch_array($resulta)) {
                                 ?>
               <div class="container" >
                  <div class="row">
                     <div style= "width: 15rem; "  id="myTable">
                        <div class="card" style="border:solid lightgray; border-width: 13px; border-radius: 10px;">
                            <a class="img-card">
                            <img style="width:190px; height: 190px;" src= "upload/<?php echo $rowb['image'] ?>">
                              </a>
                                 <div class="card-content">
                                    <span class="text" style=" font-family:  Merriweather;">
                                       <?php echo $rowb['title'] ?>
                                    </span>
                                 </div>
                                    <div class="card-read-more btn btn-link btn-block"
                                       style=" font-family:  Merriweather;font-weight: 600;">
                                       <?php
                                          echo "<a href='landing.php?id={$rowb['id']}'><h5>{$rowb['butt']}</h5></a>\n"; ?>
                                    </div>
                                 </div>
                        </div>
                     </div>
               </div>
                           <?php 
                			}
                		}else {
              			echo "";
                		}
                   ?>
                   </div>
                           <div class="col-lg-4 text-left" style="align-content: center; font-family:  Merriweather; ">
                              <h3 class="text-uppercase text-center "
                                 style="background-color:orange; color:white; font-size: 20px; font-family:  Merriweather;  padding:15px 20px 15px 0px ">
                                 Download Free WhitePaper</h3>
                              <form action="" method="POST" enctype="multipart/form-data" class=""
                                 style="border-style: solid; padding:10px; color:black;background-color: #E0E0E0; ">
                                 <input class="form-control" name="whitepaper" value="<?php echo $row['title'] ?>"
                                    type='hidden' />
                                    <div style="display:none">
                                       <a href="upload/<?php echo $row['file'] ?>" download id="dowl" >download</a>
                                    </div>
                                    <div class="input-group">
                                       <input type="text" style=" font-size: 14px;" name="fullname" class="form-control"
                                          minlength="3" placeholder="Full Name" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <input type="email" style=" font-size: 14px;" name="cemail" class="form-control"
                                          placeholder="Corporate Email" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <input type="text" name="phone" style=" font-size: 14px;" minlength="5"
                                          class="form-control" placeholder="Phone" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <select name="country" class="form-control" style="font-size: 13px;" required>
                                          <option value="" selected>Select Country</option>
                                          <option value="GB">United Kingdom</option>
                                          <option value="US">United States</option>
                                          <option value="AF">Afghanistan</option>
                                          <option value="AL">Albania</option>
                                          <option value="DZ">Algeria</option>
                                          <option value="AS">American Samoa</option>
                                          <option value="AD">Andorra</option>
                                          <option value="AO">Angola</option>
                                          <option value="AI">Anguilla</option>
                                          <option value="AQ">Antarctica</option>
                                          <option value="AG">Antigua and Barbuda</option>
                                          <option value="AR">Argentina</option>
                                          <option value="AM">Armenia</option>
                                          <option value="AW">Aruba</option>
                                          <option value="AU">Australia</option>
                                          <option value="AT">Austria</option>
                                          <option value="AZ">Azerbaijan</option>
                                          <option value="BS">Bahamas</option>
                                          <option value="BH">Bahrain</option>
                                          <option value="BD">Bangladesh</option>
                                          <option value="BB">Barbados</option>
                                          <option value="BY">Belarus</option>
                                          <option value="BE">Belgium</option>
                                          <option value="BZ">Belize</option>
                                          <option value="BJ">Benin</option>
                                          <option value="BM">Bermuda</option>
                                          <option value="BT">Bhutan</option>
                                          <option value="BO">Bolivia</option>
                                          <option value="BA">Bosnia and Herzegovina</option>
                                          <option value="BW">Botswana</option>
                                          <option value="BV">Bouvet Island</option>
                                          <option value="BR">Brazil</option>
                                          <option value="IO">British Indian Ocean Territory</option>
                                          <option value="BN">Brunei Darussalam</option>
                                          <option value="BG">Bulgaria</option>
                                          <option value="BF">Burkina Faso</option>
                                          <option value="BI">Burundi</option>
                                          <option value="KH">Cambodia</option>
                                          <option value="CM">Cameroon</option>
                                          <option value="CA">Canada</option>
                                          <option value="CV">Cape Verde</option>
                                          <option value="KY">Cayman Islands</option>
                                          <option value="CF">Central African Republic</option>
                                          <option value="TD">Chad</option>
                                          <option value="CL">Chile</option>
                                          <option value="CN">China</option>
                                          <option value="CX">Christmas Island</option>
                                          <option value="CC">Cocos (Keeling) Islands</option>
                                          <option value="CO">Colombia</option>
                                          <option value="KM">Comoros</option>
                                          <option value="CG">Congo</option>
                                          <option value="CD">Congo, the Democratic Republic of the</option>
                                          <option value="CK">Cook Islands</option>
                                          <option value="CR">Costa Rica</option>
                                          <option value="CI">Cote D'Ivoire</option>
                                          <option value="HR">Croatia</option>
                                          <option value="CU">Cuba</option>
                                          <option value="CY">Cyprus</option>
                                          <option value="CZ">Czech Republic</option>
                                          <option value="DK">Denmark</option>
                                          <option value="DJ">Djibouti</option>
                                          <option value="DM">Dominica</option>
                                          <option value="DO">Dominican Republic</option>
                                          <option value="EC">Ecuador</option>
                                          <option value="EG">Egypt</option>
                                          <option value="SV">El Salvador</option>
                                          <option value="GQ">Equatorial Guinea</option>
                                          <option value="ER">Eritrea</option>
                                          <option value="EE">Estonia</option>
                                          <option value="ET">Ethiopia</option>
                                          <option value="FK">Falkland Islands (Malvinas)</option>
                                          <option value="FO">Faroe Islands</option>
                                          <option value="FJ">Fiji</option>
                                          <option value="FI">Finland</option>
                                          <option value="FR">France</option>
                                          <option value="GF">French Guiana</option>
                                          <option value="PF">French Polynesia</option>
                                          <option value="TF">French Southern Territories</option>
                                          <option value="GA">Gabon</option>
                                          <option value="GM">Gambia</option>
                                          <option value="GE">Georgia</option>
                                          <option value="DE">Germany</option>
                                          <option value="GH">Ghana</option>
                                          <option value="GI">Gibraltar</option>
                                          <option value="GR">Greece</option>
                                          <option value="GL">Greenland</option>
                                          <option value="GD">Grenada</option>
                                          <option value="GP">Guadeloupe</option>
                                          <option value="GU">Guam</option>
                                          <option value="GT">Guatemala</option>
                                          <option value="GN">Guinea</option>
                                          <option value="GW">Guinea-Bissau</option>
                                          <option value="GY">Guyana</option>
                                          <option value="HT">Haiti</option>
                                          <option value="HM">Heard Island and Mcdonald Islands</option>
                                          <option value="VA">Holy See (Vatican City State)</option>
                                          <option value="HN">Honduras</option>
                                          <option value="HK">Hong Kong</option>
                                          <option value="HU">Hungary</option>
                                          <option value="IS">Iceland</option>
                                          <option value="IN">India</option>
                                          <option value="ID">Indonesia</option>
                                          <option value="IR">Iran, Islamic Republic of</option>
                                          <option value="IQ">Iraq</option>
                                          <option value="IE">Ireland</option>
                                          <option value="IL">Israel</option>
                                          <option value="IT">Italy</option>
                                          <option value="JM">Jamaica</option>
                                          <option value="JP">Japan</option>
                                          <option value="JO">Jordan</option>
                                          <option value="KZ">Kazakhstan</option>
                                          <option value="KE">Kenya</option>
                                          <option value="KI">Kiribati</option>
                                          <option value="KP">Korea, Democratic People's Republic of</option>
                                          <option value="KR">Korea, Republic of</option>
                                          <option value="KW">Kuwait</option>
                                          <option value="KG">Kyrgyzstan</option>
                                          <option value="LA">Lao People's Democratic Republic</option>
                                          <option value="LV">Latvia</option>
                                          <option value="LB">Lebanon</option>
                                          <option value="LS">Lesotho</option>
                                          <option value="LR">Liberia</option>
                                          <option value="LY">Libyan Arab Jamahiriya</option>
                                          <option value="LI">Liechtenstein</option>
                                          <option value="LT">Lithuania</option>
                                          <option value="LU">Luxembourg</option>
                                          <option value="MO">Macao</option>
                                          <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                          <option value="MG">Madagascar</option>
                                          <option value="MW">Malawi</option>
                                          <option value="MY">Malaysia</option>
                                          <option value="MV">Maldives</option>
                                          <option value="ML">Mali</option>
                                          <option value="MT">Malta</option>
                                          <option value="MH">Marshall Islands</option>
                                          <option value="MQ">Martinique</option>
                                          <option value="MR">Mauritania</option>
                                          <option value="MU">Mauritius</option>
                                          <option value="YT">Mayotte</option>
                                          <option value="MX">Mexico</option>
                                          <option value="FM">Micronesia, Federated States of</option>
                                          <option value="MD">Moldova, Republic of</option>
                                          <option value="MC">Monaco</option>
                                          <option value="MN">Mongolia</option>
                                          <option value="MS">Montserrat</option>
                                          <option value="MA">Morocco</option>
                                          <option value="MZ">Mozambique</option>
                                          <option value="MM">Myanmar</option>
                                          <option value="NA">Namibia</option>
                                          <option value="NR">Nauru</option>
                                          <option value="NP">Nepal</option>
                                          <option value="NL">Netherlands</option>
                                          <option value="AN">Netherlands Antilles</option>
                                          <option value="NC">New Caledonia</option>
                                          <option value="NZ">New Zealand</option>
                                          <option value="NI">Nicaragua</option>
                                          <option value="NE">Niger</option>
                                          <option value="NG">Nigeria</option>
                                          <option value="NU">Niue</option>
                                          <option value="NF">Norfolk Island</option>
                                          <option value="MP">Northern Mariana Islands</option>
                                          <option value="NO">Norway</option>
                                          <option value="OM">Oman</option>
                                          <option value="PK">Pakistan</option>
                                          <option value="PW">Palau</option>
                                          <option value="PS">Palestinian Territory, Occupied</option>
                                          <option value="PA">Panama</option>
                                          <option value="PG">Papua New Guinea</option>
                                          <option value="PY">Paraguay</option>
                                          <option value="PE">Peru</option>
                                          <option value="PH">Philippines</option>
                                          <option value="PN">Pitcairn</option>
                                          <option value="PL">Poland</option>
                                          <option value="PT">Portugal</option>
                                          <option value="PR">Puerto Rico</option>
                                          <option value="QA">Qatar</option>
                                          <option value="RE">Reunion</option>
                                          <option value="RO">Romania</option>
                                          <option value="RU">Russian Federation</option>
                                          <option value="RW">Rwanda</option>
                                          <option value="SH">Saint Helena</option>
                                          <option value="KN">Saint Kitts and Nevis</option>
                                          <option value="LC">Saint Lucia</option>
                                          <option value="PM">Saint Pierre and Miquelon</option>
                                          <option value="VC">Saint Vincent and the Grenadines</option>
                                          <option value="WS">Samoa</option>
                                          <option value="SM">San Marino</option>
                                          <option value="ST">Sao Tome and Principe</option>
                                          <option value="SA">Saudi Arabia</option>
                                          <option value="SN">Senegal</option>
                                          <option value="CS">Serbia and Montenegro</option>
                                          <option value="SC">Seychelles</option>
                                          <option value="SL">Sierra Leone</option>
                                          <option value="SG">Singapore</option>
                                          <option value="SK">Slovakia</option>
                                          <option value="SI">Slovenia</option>
                                          <option value="SB">Solomon Islands</option>
                                          <option value="SO">Somalia</option>
                                          <option value="ZA">South Africa</option>
                                          <option value="GS">South Georgia and the South Sandwich Islands</option>
                                          <option value="ES">Spain</option>
                                          <option value="LK">Sri Lanka</option>
                                          <option value="SD">Sudan</option>
                                          <option value="SR">Suriname</option>
                                          <option value="SJ">Svalbard and Jan Mayen</option>
                                          <option value="SZ">Swaziland</option>
                                          <option value="SE">Sweden</option>
                                          <option value="CH">Switzerland</option>
                                          <option value="SY">Syrian Arab Republic</option>
                                          <option value="TW">Taiwan, Province of China</option>
                                          <option value="TJ">Tajikistan</option>
                                          <option value="TZ">Tanzania, United Republic of</option>
                                          <option value="TH">Thailand</option>
                                          <option value="TL">Timor-Leste</option>
                                          <option value="TG">Togo</option>
                                          <option value="TK">Tokelau</option>
                                          <option value="TO">Tonga</option>
                                          <option value="TT">Trinidad and Tobago</option>
                                          <option value="TN">Tunisia</option>
                                          <option value="TR">Turkey</option>
                                          <option value="TM">Turkmenistan</option>
                                          <option value="TC">Turks and Caicos Islands</option>
                                          <option value="TV">Tuvalu</option>
                                          <option value="UG">Uganda</option>
                                          <option value="UA">Ukraine</option>
                                          <option value="AE">United Arab Emirates</option>
                                          <option value="UM">United States Minor Outlying Islands</option>
                                          <option value="UY">Uruguay</option>
                                          <option value="UZ">Uzbekistan</option>
                                          <option value="VU">Vanuatu</option>
                                          <option value="VE">Venezuela</option>
                                          <option value="VN">Viet Nam</option>
                                          <option value="VG">Virgin Islands, British</option>
                                          <option value="VI">Virgin Islands, U.s.</option>
                                          <option value="WF">Wallis and Futuna</option>
                                          <option value="EH">Western Sahara</option>
                                          <option value="YE">Yemen</option>
                                          <option value="ZM">Zambia</option>
                                          <option value="ZW">Zimbabwe</option>
                                       </select>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <input type="text" name="state" style=" font-size: 14px;" minlength="4"
                                          class="form-control" placeholder="State " required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <input type="text" name="city" minlength="4" style=" font-size: 14px;"
                                          class="form-control" placeholder="City " required>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <input type="text" name="address" minlength="4" style=" font-size: 14px;"
                                          class="form-control" placeholder="Address" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <input type="text" name="postalcode" style=" font-size: 14px;" class="form-control"
                                          placeholder="Postal Code" required>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <input type="text" name="companyname" style=" font-size: 14px;" minlength="2"
                                          class="form-control" placeholder="Company Name" required>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <select class="form-control" name="industry" id="industry" style="font-size: 13px;"
                                          required>
                                          <option value="" selected>Select Industry</option>
                                          <option value="Aerospace and Defense">Aerospace and Defense</option>
                                          <option value="Automotive">Automotive</option>
                                          <option value="Chemicals and Metals and Mining">Chemicals and Metals and Mining
                                          </option>
                                          <option value="Computer Hardware">Computer Hardware</option>
                                          <option value="Computer Software and Services">Computer Software and Services
                                          </option>
                                          <option value="Construction and Building Materials">Construction and Building
                                             Materials</option>
                                          <option value="Consumer Products">Consumer Products</option>
                                          <option value="Consumer Services">Consumer Services</option>
                                          <option value="Corporate Services">Corporate Services</option>
                                          <option value="Education">Education</option>
                                          <option value="Energy and Environmental">Energy and Environmental</option>
                                          <option value="Financial Services">Financial Services</option>
                                          <option value="Government and Non-Profit">Government and Non-Profit</option>
                                          <option value="Health Care Equipment and Services">Health Care Equipment and
                                             Services</option>
                                          <option value="Industrial Manufacturing and Services">Industrial Manufacturing
                                             and Services</option>
                                          <option value="Media and Entertainment">Media and Entertainment</option>
                                          <option value="Retail and Wholesale and Distribution">Retail and Wholesale and
                                             Distribution</option>
                                          <option value="Telecommunications">Telecommunications</option>
                                          <option value="Transportation">Transportation</option>
                                          <option value="Other">Other Industry</option>
                                       </select>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                       <select class="form-control" name="jobtitle" id="job_title" style="font-size: 13px;"
                                          required>
                                          <option value="" selected>Select Job Title</option>
                                          <option value="Director of Operations">Director of Operations</option>
                                          <option value="Director of Finance">Director of Finance</option>
                                          <option value="Purchasing Director">Purchasing Director</option>
                                          <option value="Procurement Director">Procurement Director</option>
                                          <option value="IT Director">IT Director</option>
                                          <option value="Technology Director">Technology Director</option>
                                          <option value="Director of Reservations">Director of Reservations</option>
                                          <option value="Director of Loyalty">Director of Loyalty</option>
                                          <option value="Director Cargo">Director Cargo</option>
                                          <option value="VP of Operations">VP of Operations</option>
                                          <option value="VP of Finance">VP of Finance</option>
                                          <option value="VP of Director">VP of Director</option>
                                          <option value="Procurement Vice President">Procurement Vice President</option>
                                          <option value="VP IT">VP IT</option>
                                          <option value="Technology VP">Technology VP</option>
                                          <option value="VP of Reservations">VP of Reservations</option>
                                          <option value="VP of Loyalty">VP of Loyalty</option>
                                          <option value="VP of Cargo">VP of Cargo</option>
                                          <option value="Head of Operations">Head of Operations</option>
                                          <option value="Chief Operations Officer">Chief Operations Officer</option>
                                          <option value="Head of Customer Loyalty">Head of Customer Loyalty</option>
                                          <option value="Chief Customer Loyalty Officer">Chief Customer Loyalty Officer
                                          </option>
                                          <option value="Head of Reservations">Head of Reservations</option>
                                          <option value="Chief Reservations Officer">Chief Reservations Officer</option>
                                          <option value="Head of Finance">Head of Finance</option>
                                          <option value="Chief Finance Officer">Chief Finance Officer</option>
                                          <option value="Head of Purchasing">Head of Purchasing</option>
                                          <option value="Head of Procurement">Head of Procurement</option>
                                          <option value="Chief Purchasing Officer">Chief Purchasing Officer</option>
                                          <option value="Chief Procurement Officer">Chief Procurement Officer</option>
                                          <option value="Head of Information Technology">Head of Information Technology
                                          </option>
                                          <option value="Chief Technology Officer">Chief Technology Officer</option>
                                          <option value="Head of Cargo">Head of Cargo</option>
                                          <option value="Chief Cargo Officer">Chief Cargo Officer</option>
                                          <option value="Other">Other</option>
                                       </select>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                    <br>
                                    <?php
                                       while($rowa = mysqli_fetch_array($querya)){
                                          ?>
                                    <h5>Q.
                                       <?php echo $rowa['question'] ?>
                                    </h5>
                                    </tr>
                                    <?php
                                       }
                                       ?>
                                    <?php
                                    $conn = mysqli_connect('localhost','root','','login');
                                    $query = "SELECT * FROM que WHERE id = '$id' ";
                                    $result2= mysqli_query($conn,$query);
                                    while($rowa = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                    $var = explode(",",$rowa['Options']);

                                    foreach ($var as $key => $value) {
                                    if (in_array($value, $var)) {
                                       ?>
                                    <h5>
                                    <?php
                                    echo "<input type= \"checkbox\" name=\" id=\" value=\"\" /> " ."" . $value ;
                                       }else {
                                          echo "<input type=\"checkbox\" name=\" id=\" value=\"\" /> " . "" . $value ;
                                                }
                                                echo "<br>";
                                             }
                                    ?>
                                    <br>
                                    <?php
                                      }
                                      ?>
                                    </h5>
                                    <?php 
                                       }
                                       }else {
                                          echo "<h2>no</h2>";
                                             }
                                    ?>
                                    <h5 class="text-justify"><input type="checkbox" value="YES-1" name="data[11]"
                                       style="margin-right: 5px;" required>I would like to receive information from
                                    vendors sponsoring this content and willing to share the above information with
                                    techsterhub. </h5>
                                 <br>
                                 <h5 class="text-justify"><input type="checkbox" value="YES-2" name="data[12]"
                                       style="margin-right: 5px;" required>By checking this box, I agree that
                                    techsterhub can share my data with select partners to contact me by email or phone
                                    and provide more information about this content.</h5>
                                 <br>
                                 <button type="submit" name="download" class="btn btn btn-block"
                                    style=" background-color:orange; color: white; margin-left: 86px; font-family:  Merriweather; font-size: 19px;padding-bottom: 10px;" src="<?php echo $row['file'] ?>">Download
                                    Now</button>
                              </form>
                              <br>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
   </section>
   <br>
   <footer class="page-footer font-small blue" style="font-size: 14px; background-color:black; color: white; ">
      <div class="footer-copyright text-center py-3">© 2021 Copyright :
         <a href="http://itsecuritytalks.com/"> itsecuritytalks.com</a>
      </div>
   </footer>
</body>
</html>

<?php
$conn = mysqli_connect('localhost','root','','login');
if (isset($_POST['download'])) {
  $fullname = $_POST['fullname'];
  $cemail = $_POST['cemail'];
  $phone = $_POST['phone'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $postalcode = $_POST['postalcode'];
  $companyname = $_POST['companyname'];
  $industry = $_POST['industry'];
  $jobtitle = $_POST['jobtitle'];
  $whitepaper = $_POST['whitepaper'];

  $execute = mysqli_query($conn, "INSERT INTO `registration`(`fullname`, `cemail`, `phone`, `country`, `state`, `city`, `address`, `postalcode`, `companyname`, `industry`, `jobtitle`, `whitepaper`) VALUES ('$fullname','$cemail','$phone','$country','$state','$city','$address','$postalcode','$companyname','$industry','$jobtitle','$whitepaper')");

   if ($execute) {
      echo "<script>
         document.getElementById('dowl').click();</script>";
      } else {
         echo "error";
      }
   }
?>