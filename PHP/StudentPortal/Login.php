<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Student Login</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="../../CSS/Login.css?<?php echo time(); ?>">
</head>

<body>
<div class="container-fluid">
  <div class="row background">
    <div class="comsats col-md-12 col-xs-12">
      <img src="../../IMAGES/CIITLogo_Plain.png"  align="middle">
      <strong class="textcolor"><h1>Welcome to Comsats Hostel Login</h1></strong>
    </div>
  </div>
</div>
  <div class="form">
      <ul class="tab-group">
        <li class="tab active"><a href="#oldlogin">Old Student</a></li>
        <li class="tab"><a href="#newlogin">New Student</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="oldlogin">
          <h1>Login Old Student</h1>
            <form action="LoginProcessing.php" method="post" enctype="multipart/form-data">
                <p style="vertical-align: bottom; width: 100%;">

                        <select name="degree" class="degree form-control" style="width: 30%">
                            <option>DDP</option>
                            <option>SDP</option>
                        </select>
                    <span class="textcolor">-</span>

                    <select name="fall" id="year" class="form-control" style="width: 30%">
                        <?php
                        $year = date("Y");
                        $year = ($year - 6)%2000;;
                        $i=0;
                        while($i <=6 ){
                            echo '<option value="FA'.$year.'">FA'.$year.'</option>';
                            echo '<option value="SP'.$year.'">SP'.$year.'</option>';
                            $year++;$i++;
                        }
                        ?>
                    </select>
                <span class="textcolor">-</span>
                    <select id="program" class="form-control" name="degreeProgram" style="width: 30%">
                        <option value="BAR">BAR</option>
                        <option value="BBA">BBA</option>
                        <option value="BBS">BBS</option>
                        <option value="BCE">BCE</option>
                        <option value="BCS">BCS</option>
                        <option value="BDE">BDE</option>
                        <option value="BEC">BEC</option>
                        <option value="BECO">BECO</option>
                        <option value="BEE">BEE</option>
                        <option value="BFA">BFA</option>
                        <option value="BIT">BIT</option>
                        <option value="BPH">BPH</option>
                        <option value="BPSY">BPSY</option>
                        <option value="BS(ECE)">BS(ECE)</option>
                        <option value="BS(EEE)">BS(EEE)</option>
                        <option value="BSAF">BSAF</option>
                        <option value="BSE">BSE</option>
                        <option value="BSM">BSM</option>
                        <option value="BTE">BTE</option>
                        <option value="MBA">MBA</option>
                        <option value="MBA1">MBA1</option>
                        <option value="MBE">MBE</option>
                        <option value="MBM">MBM</option>
                        <option value="MBO">MBO</option>
                        <option value="MBT">MBT</option>
                        <option value="MBX">MBX</option>
                        <option value="MCS">MCS</option>
                        <option value="MSCHEM">MSCHEM</option>
                        <option value="MSCS">MSCS</option>
                        <option value="MSECO">MSECO</option>
                        <option value="MSEE">MSEE</option>
                        <option value="MSENG">MSENG</option>
                        <option value="MSMATH">MSMATH</option>
                        <option value="MSMS">MSMS</option>
                        <option value="MSPHY">MSPHY</option>
                        <option value="MSPM">MSPM</option>
                        <option value="MSSM">MSSM</option>
                        <option value="MSSTAT">MSSTAT</option>
                        <option value="MSTE">MSTE</option>
                        <option value="PChem">PChem</option>
                        <option value="PCS">PCS</option>
                        <option value="PEE">PEE</option>
                        <option value="PMATH">PMATH</option>
                        <option value="PMS">PMS</option>
                        <option value="PPHY">PPHY</option>
                        <option value="PSTAT">PSTAT</option>
                    </select>
                <span class="textcolor">-</span>
                   <div class="field-wrap">
                    <label>
                        ID<span class="req">*</span>
                    </label>
                  <input name="rollNumber" class="form-control" type="text"required autocomplete="off"/>
                </div>
                </p>
                <div class="clear">
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input name="check" type="password"required autocomplete="off"/>
                </div>

                <p class="forgot"><a href="#">Forgot Password?</a></p>

                <button name="submit" class="button button-block"/ >Log In</button>
            </form>
        </div>
        
        <div id="newlogin">
          <h1>Login New Student</h1>
          
          <form action="LoginProcessing.php" method="post" enctype="multipart/form-data">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>

          
          </form>

        </div>

      </div><!-- tab-content -->
      
</div>
<!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="../../JS/index.js"></script>

</body>
</html>
