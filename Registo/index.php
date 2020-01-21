<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<title>Registar</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- CSS Files -->
    <link href="../assets/layout.register/css/bootstrap.min.css" rel="stylesheet" />
	<link href="./css/OverrideLayout.css" rel="stylesheet" />
	<!-- Fonts and Icons-->
	<link href="../assets/layout.register/css/themify-icons.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	</head>

	<body>
	<!-- Navbar -->
	<?php include '../Common/navbar.html' ?>

	<div class="image-container set-full-height" style="background-image: url('../assets/img/register/Sample-Image (6).jpg')">
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="card wizard-card card-register" data-color="black" id="wizardProfile">
		                    <form name="registo" id="registo" method="POST">
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Registar</h3>
									<p class="category">Estas informações são necessárias para poder efetuar um registo.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#about" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-info-alt"></i>
												</div>
												Sobre
											</a>
										</li>
			                            <li>
											<a href="#account" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-pencil"></i>
												</div>
												Dados
											</a>
										</li>
			                            <li>
											<a href="#address" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-map"></i>
												</div>
												Morada
											</a>
										</li>
										<li>
											<a href="#credentials" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-key"></i>
												</div>
												Login
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                            	<div class="row">
											<div class="col-sm-6 col-sm-offset-1">
												<div class="form-group">
													<label>Nome <small> (*)</small></label>
													<input name="nome" id="nome" type="text" class="form-control" placeholder="Nome...">
												</div>
												<div class="form-group">
													<label>Sobrenome <small> (*)</small></label>
													<input name="ultimoNome" id="ultimonome" type="text" class="form-control" placeholder="Sobrenome...">
												</div>
											</div>
											<div class="col-sm-4">
												<br>
												<div class="picture-container">
													<div class="picture">
														<img src="../assets/img/default-avatar.jpg" class="picture-src" id="wizardPicturePreview" title="">
														<!--<input type="file" id="wizard-picture">-->
													</div>
													<br>
													<h6>Escolha uma Imagem</h6>
												</div>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Email  <small> (*)</small></label>
													<input name="email" id="email" type="email" class="form-control" placeholder="email@outlook.com">
												</div>
											</div>
										</div>
		                            </div>
		                            <div class="tab-pane" id="account">
		                                <div class="row">
											<div class="row">
												<div class="col-sm-5 col-sm-offset-1">
													<div class="form-group">
														<label>Data de Nascimento  <small> (*)</small></label>
														<input name="dataNascimento" id="dataNascimento" type="date" placeholder="Data de Nascimento" class="form-control">
													</div>
													<div class="form-group">
														<label>Âmbito</label>
														<select name="scope" id="scope" class="form-control"></select>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="form-group">
														<label>Telemóvel <small> (*)</small></label><br>
														<input name="telefone" id="telefone" type="text" class="form-control" placeholder="Telemóvel" pattern="[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}">
													</div>
													<div class="form-group">
													</div>
												</div>
												<div class="col-sm-10 col-sm-offset-1">
													<div class="form-group">
														<label>Afiliação</label>
														<input  name="organizacao" id="organizacao" type="text" class="form-control" placeholder="Afiliação">
													</div>
												</div>
											</div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	<div class="form-group">
		                                            <label>Morada <small> (*)</small></label>
		                                            <input name="morada" id="morada" type="text" class="form-control" placeholder="Travesso do Rio">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <div class="form-group">
		                                            <label>Código Postal</label>
		                                            <input name="codPostal" id="codPostal" type="text" class="form-control" placeholder="0000-000">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group">
		                                            <label>Cidade <small> (*)</small></label>
		                                            <input  name="cidade" id="cidade" type="text" class="form-control" placeholder="Cidade">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5">
		                                        <div class="form-group">
		                                            <label>País <small> (*)</small></label><br>
		                                            <select name="pais" id="pais" class="form-control">
														<option value="Afganistan">Afghanistan</option>
														<option value="Albania">Albania</option>
														<option value="Algeria">Algeria</option>
														<option value="American Samoa">American Samoa</option>
														<option value="Andorra">Andorra</option>
														<option value="Angola">Angola</option>
														<option value="Anguilla">Anguilla</option>
														<option value="Antigua & Barbuda">Antigua & Barbuda</option>
														<option value="Argentina">Argentina</option>
														<option value="Armenia">Armenia</option>
														<option value="Aruba">Aruba</option>
														<option value="Australia">Australia</option>
														<option value="Austria">Austria</option>
														<option value="Azerbaijan">Azerbaijan</option>
														<option value="Bahamas">Bahamas</option>
														<option value="Bahrain">Bahrain</option>
														<option value="Bangladesh">Bangladesh</option>
														<option value="Barbados">Barbados</option>
														<option value="Belarus">Belarus</option>
														<option value="Belgium">Belgium</option>
														<option value="Belize">Belize</option>
														<option value="Benin">Benin</option>
														<option value="Bermuda">Bermuda</option>
														<option value="Bhutan">Bhutan</option>
														<option value="Bolivia">Bolivia</option>
														<option value="Bonaire">Bonaire</option>
														<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
														<option value="Botswana">Botswana</option>
														<option value="Brazil">Brazil</option>
														<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
														<option value="Brunei">Brunei</option>
														<option value="Bulgaria">Bulgaria</option>
														<option value="Burkina Faso">Burkina Faso</option>
														<option value="Burundi">Burundi</option>
														<option value="Cambodia">Cambodia</option>
														<option value="Cameroon">Cameroon</option>
														<option value="Canada">Canada</option>
														<option value="Canary Islands">Canary Islands</option>
														<option value="Cape Verde">Cape Verde</option>
														<option value="Cayman Islands">Cayman Islands</option>
														<option value="Central African Republic">Central African Republic</option>
														<option value="Chad">Chad</option>
														<option value="Channel Islands">Channel Islands</option>
														<option value="Chile">Chile</option>
														<option value="China">China</option>
														<option value="Christmas Island">Christmas Island</option>
														<option value="Cocos Island">Cocos Island</option>
														<option value="Colombia">Colombia</option>
														<option value="Comoros">Comoros</option>
														<option value="Congo">Congo</option>
														<option value="Cook Islands">Cook Islands</option>
														<option value="Costa Rica">Costa Rica</option>
														<option value="Cote DIvoire">Cote DIvoire</option>
														<option value="Croatia">Croatia</option>
														<option value="Cuba">Cuba</option>
														<option value="Curaco">Curacao</option>
														<option value="Cyprus">Cyprus</option>
														<option value="Czech Republic">Czech Republic</option>
														<option value="Denmark">Denmark</option>
														<option value="Djibouti">Djibouti</option>
														<option value="Dominica">Dominica</option>
														<option value="Dominican Republic">Dominican Republic</option>
														<option value="East Timor">East Timor</option>
														<option value="Ecuador">Ecuador</option>
														<option value="Egypt">Egypt</option>
														<option value="El Salvador">El Salvador</option>
														<option value="Equatorial Guinea">Equatorial Guinea</option>
														<option value="Eritrea">Eritrea</option>
														<option value="Estonia">Estonia</option>
														<option value="Ethiopia">Ethiopia</option>
														<option value="Falkland Islands">Falkland Islands</option>
														<option value="Faroe Islands">Faroe Islands</option>
														<option value="Fiji">Fiji</option>
														<option value="Finland">Finland</option>
														<option value="France">France</option>
														<option value="French Guiana">French Guiana</option>
														<option value="French Polynesia">French Polynesia</option>
														<option value="French Southern Ter">French Southern Ter</option>
														<option value="Gabon">Gabon</option>
														<option value="Gambia">Gambia</option>
														<option value="Georgia">Georgia</option>
														<option value="Germany">Germany</option>
														<option value="Ghana">Ghana</option>
														<option value="Gibraltar">Gibraltar</option>
														<option value="Great Britain">Great Britain</option>
														<option value="Greece">Greece</option>
														<option value="Greenland">Greenland</option>
														<option value="Grenada">Grenada</option>
														<option value="Guadeloupe">Guadeloupe</option>
														<option value="Guam">Guam</option>
														<option value="Guatemala">Guatemala</option>
														<option value="Guinea">Guinea</option>
														<option value="Guyana">Guyana</option>
														<option value="Haiti">Haiti</option>
														<option value="Hawaii">Hawaii</option>
														<option value="Honduras">Honduras</option>
														<option value="Hong Kong">Hong Kong</option>
														<option value="Hungary">Hungary</option>
														<option value="Iceland">Iceland</option>
														<option value="Indonesia">Indonesia</option>
														<option value="India">India</option>
														<option value="Iran">Iran</option>
														<option value="Iraq">Iraq</option>
														<option value="Ireland">Ireland</option>
														<option value="Isle of Man">Isle of Man</option>
														<option value="Israel">Israel</option>
														<option value="Italy">Italy</option>
														<option value="Jamaica">Jamaica</option>
														<option value="Japan">Japan</option>
														<option value="Jordan">Jordan</option>
														<option value="Kazakhstan">Kazakhstan</option>
														<option value="Kenya">Kenya</option>
														<option value="Kiribati">Kiribati</option>
														<option value="Korea North">Korea North</option>
														<option value="Korea Sout">Korea South</option>
														<option value="Kuwait">Kuwait</option>
														<option value="Kyrgyzstan">Kyrgyzstan</option>
														<option value="Laos">Laos</option>
														<option value="Latvia">Latvia</option>
														<option value="Lebanon">Lebanon</option>
														<option value="Lesotho">Lesotho</option>
														<option value="Liberia">Liberia</option>
														<option value="Libya">Libya</option>
														<option value="Liechtenstein">Liechtenstein</option>
														<option value="Lithuania">Lithuania</option>
														<option value="Luxembourg">Luxembourg</option>
														<option value="Macau">Macau</option>
														<option value="Macedonia">Macedonia</option>
														<option value="Madagascar">Madagascar</option>
														<option value="Malaysia">Malaysia</option>
														<option value="Malawi">Malawi</option>
														<option value="Maldives">Maldives</option>
														<option value="Mali">Mali</option>
														<option value="Malta">Malta</option>
														<option value="Marshall Islands">Marshall Islands</option>
														<option value="Martinique">Martinique</option>
														<option value="Mauritania">Mauritania</option>
														<option value="Mauritius">Mauritius</option>
														<option value="Mayotte">Mayotte</option>
														<option value="Mexico">Mexico</option>
														<option value="Midway Islands">Midway Islands</option>
														<option value="Moldova">Moldova</option>
														<option value="Monaco">Monaco</option>
														<option value="Mongolia">Mongolia</option>
														<option value="Montserrat">Montserrat</option>
														<option value="Morocco">Morocco</option>
														<option value="Mozambique">Mozambique</option>
														<option value="Myanmar">Myanmar</option>
														<option value="Nambia">Nambia</option>
														<option value="Nauru">Nauru</option>
														<option value="Nepal">Nepal</option>
														<option value="Netherland Antilles">Netherland Antilles</option>
														<option value="Netherlands">Netherlands (Holland, Europe)</option>
														<option value="Nevis">Nevis</option>
														<option value="New Caledonia">New Caledonia</option>
														<option value="New Zealand">New Zealand</option>
														<option value="Nicaragua">Nicaragua</option>
														<option value="Niger">Niger</option>
														<option value="Nigeria">Nigeria</option>
														<option value="Niue">Niue</option>
														<option value="Norfolk Island">Norfolk Island</option>
														<option value="Norway">Norway</option>
														<option value="Oman">Oman</option>
														<option value="Pakistan">Pakistan</option>
														<option value="Palau Island">Palau Island</option>
														<option value="Palestine">Palestine</option>
														<option value="Panama">Panama</option>
														<option value="Papua New Guinea">Papua New Guinea</option>
														<option value="Paraguay">Paraguay</option>
														<option value="Peru">Peru</option>
														<option value="Phillipines">Philippines</option>
														<option value="Pitcairn Island">Pitcairn Island</option>
														<option value="Poland">Poland</option>
														<option value="Portugal">Portugal</option>
														<option value="Puerto Rico">Puerto Rico</option>
														<option value="Qatar">Qatar</option>
														<option value="Republic of Montenegro">Republic of Montenegro</option>
														<option value="Republic of Serbia">Republic of Serbia</option>
														<option value="Reunion">Reunion</option>
														<option value="Romania">Romania</option>
														<option value="Russia">Russia</option>
														<option value="Rwanda">Rwanda</option>
														<option value="St Barthelemy">St Barthelemy</option>
														<option value="St Eustatius">St Eustatius</option>
														<option value="St Helena">St Helena</option>
														<option value="St Kitts-Nevis">St Kitts-Nevis</option>
														<option value="St Lucia">St Lucia</option>
														<option value="St Maarten">St Maarten</option>
														<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
														<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
														<option value="Saipan">Saipan</option>
														<option value="Samoa">Samoa</option>
														<option value="Samoa American">Samoa American</option>
														<option value="San Marino">San Marino</option>
														<option value="Sao Tome & Principe">Sao Tome & Principe</option>
														<option value="Saudi Arabia">Saudi Arabia</option>
														<option value="Senegal">Senegal</option>
														<option value="Seychelles">Seychelles</option>
														<option value="Sierra Leone">Sierra Leone</option>
														<option value="Singapore">Singapore</option>
														<option value="Slovakia">Slovakia</option>
														<option value="Slovenia">Slovenia</option>
														<option value="Solomon Islands">Solomon Islands</option>
														<option value="Somalia">Somalia</option>
														<option value="South Africa">South Africa</option>
														<option value="Spain">Spain</option>
														<option value="Sri Lanka">Sri Lanka</option>
														<option value="Sudan">Sudan</option>
														<option value="Suriname">Suriname</option>
														<option value="Swaziland">Swaziland</option>
														<option value="Sweden">Sweden</option>
														<option value="Switzerland">Switzerland</option>
														<option value="Syria">Syria</option>
														<option value="Tahiti">Tahiti</option>
														<option value="Taiwan">Taiwan</option>
														<option value="Tajikistan">Tajikistan</option>
														<option value="Tanzania">Tanzania</option>
														<option value="Thailand">Thailand</option>
														<option value="Togo">Togo</option>
														<option value="Tokelau">Tokelau</option>
														<option value="Tonga">Tonga</option>
														<option value="Trinidad & Tobago">Trinidad & Tobago</option>
														<option value="Tunisia">Tunisia</option>
														<option value="Turkey">Turkey</option>
														<option value="Turkmenistan">Turkmenistan</option>
														<option value="Turks & Caicos Is">Turks & Caicos Is</option>
														<option value="Tuvalu">Tuvalu</option>
														<option value="Uganda">Uganda</option>
														<option value="United Kingdom">United Kingdom</option>
														<option value="Ukraine">Ukraine</option>
														<option value="United Arab Erimates">United Arab Emirates</option>
														<option value="United States of America">United States of America</option>
														<option value="Uraguay">Uruguay</option>
														<option value="Uzbekistan">Uzbekistan</option>
														<option value="Vanuatu">Vanuatu</option>
														<option value="Vatican City State">Vatican City State</option>
														<option value="Venezuela">Venezuela</option>
														<option value="Vietnam">Vietnam</option>
														<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
														<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
														<option value="Wake Island">Wake Island</option>
														<option value="Wallis & Futana Is">Wallis & Futana Is</option>
														<option value="Yemen">Yemen</option>
														<option value="Zaire">Zaire</option>
														<option value="Zambia">Zambia</option>
														<option value="Zimbabwe">Zimbabwe</option>
		                                            </select>
		                                        </div>
		                                    </div>
		                                </div>
									</div>
									<div class="tab-pane" id="credentials">
		                            	<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<div class="form-group">
													<label>Nome de Utilizador <small> (*)</small></label>
													<input name="username" id="username" type="text" placeholder="Username" class="form-control" pattern="^[A-Za-z0-9_]{1,32}$" required>
												</div>
											</div>
										
											<div class="col-sm-8 col-sm-offset-2">
												<div class="form-group">
													<label>Palavra-passe  <small> (*)</small></label>
													<input  id="pass1" name="pass1" type="password" class="form-control" placeholder="Palavra-passe" required>
												</div>
												<div class="form-group">
													<label>Repita Palavra-passe  <small> (*)</small></label>
													<input id="pass2" name="pass2" type="password" class="form-control" placeholder="Repita Palavra-passe" required>
												</div>
												<br>
												<br>
											</div>
										</div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-default btn-wd' name='next' value='Seguinte' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' value='Registar'/>
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Anterior' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

		<div class="footer register-footer text-center">
            <h6>©
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</h6>
        </div>
	
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets/layout.register/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="../assets/layout.register/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/layout.register/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	
	<!--  Plugin for the Wizard -->
	<script src="../assets/layout.register/js/paper-bootstrap-wizard.js" type="text/javascript"></script>
	<script src="../assets/layout.register/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="./script/scr.GetScopes.js"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->

	<script>
        $(function () {
            $("#nav-placeholder").load("../Common/navbar-base.html"); //Adicionar navbar no COMMON
            $("#footer-placeholder").load("../Common/footer-custom.html");
        });
    </script>

</html>
