<!--This file is updated by Urvashi on 22 aug 2018
-->
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JYSK Login</title>
<link rel='shortcut icon' type='image/x-icon' href='images/JYSK.ico' />
<link href="JF.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css">
<link href="css/bootstrap-glyphicons.css" rel="stylesheet">
<style>
  .custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
  }
  label{
    font-size: 14px;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
  }
  .form-signin {
    width: 50%;
    border: 1px solid;
}
.table {
    width: 90% !important;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
    font-size:20px;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: none !important;
    font-size:20px;
}
input:button{
cursor:pointer;
}
.error{
  color:red;
 
}
.databox{
  width:50%;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef;
    opacity: 1;
}

</style>
<script src="js/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/bootstrap.css" />  
<script src="js/jquery.validate.min.js"></script>

 <?php
      function isMobile() {
          return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
      }
      // If the user is on a mobile device, redirect them
      if(isMobile()){
      ?>
<style>
.databox,.table td, .table th{
    width:90%;
    font-size:30px;
   
  }
  .form-control,.HugeTitle
  {
    font-size:30px;
  }
  .form-signin{
    width:90%;
  }
  .btn{
    text-align:center;
    
  }
  select,#password, input,a,select.form-control:not([size]):not([multiple]) {
    height: 150px;
    font-size:30px !important;
    text-align:center;
   
}
 
  </style>


      <?php }
      ?>
<script>
  $(document).ready(function() {
$("form[name='store']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      storename: "required",
      password: {
        required: true
      }
    },
    // Specify validation error messages
    messages: {
      storename:{
        required :"Please select store"
      },
      password: {
        required: "Please provide a password"
      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      var storeid = ($('#storename :selected').val());
      var pwd = $('#password').val();
      
   
    //alert(storeid);
	  window.location.href =  "dsp_Menu.php?L="+storeid+"&P="+pwd;
    }
  });


    $(".form-control").css("border-color", "none");
    if($('#password').val()!='') {
      //alert("hi");

      var pwd = $('#password').val();
      //alert(pwd);

      $.ajax({
        type:"GET",
        cache:false,
        url:"stores.php",
        data:{data:pwd},    // multiple data sent using ajax
        success: function (data) {
         if(data.trim()==''){
           $('#passwordwrong').html("Wrong Password !!");
         }
         else{
          $('#passwordwrong').html("");
          $('#storename').html(data);
        }
        
        }
      });
      return false;
    }

    else{
      $('#getstoredata').click(function () {

      var pwd = $('#password').val();
      //alert(pwd);

      $.ajax({
        type:"GET",
        cache:false,
        url:"stores.php",
        data:{data:pwd},    // multiple data sent using ajax
        success: function (data) {
         if(data.trim()==''){
           $('#passwordwrong').html("Wrong Password !!");
         }
         else{
          $('#passwordwrong').html("");
          $('#storename').html(data);
        }
        
        }
      });
      return false;

    });
    }

  
  });

</script>

</head>

<body onload="store.reset();">
<!-- dsp_carriers -->
<?php //include("application.cfm");?>

<p></p><p><p><p><center>
<Img src="JYSK.jpg" align="middle" />
<p>
<Table class="databox"><tr><td class="HugeTitle" align="center">Flyer Distribution Program</td></tr></Table>

<p><p>
<form name="store" id="store" class="form-signin">
<table align="center" class="table">
<thead>
<div  style="color:red" id="passwordwrong"></div>
   <tr> <td colspan="3"><center>
   <?php   if($_SESSION['jy_pwd'])
            {
              if($_SESSION['jy_pwd'] == "KOL9376") {
                $_SESSION['jy_client'] = "Lawrence";
              echo " Welcome Back Lawrence !";  
              }
              else if($_SESSION['jy_pwd'] == "EXC6821") {
                $_SESSION['jy_client'] ="Eythor";
              echo " Welcome Back Eythor !";  
              }
              else if($_SESSION['jy_pwd'] == "IMS7439") {
                $_SESSION['jy_client'] ="Iain";
              echo " Welcome Back Iain !";  
              }
              else if($_SESSION['jy_pwd'] == "DGU0385") {
                $_SESSION['jy_client'] ="Darryl";
              echo " Welcome Back Darryl !";  
              }
              else if($_SESSION['jy_pwd'] == "PTN4487") {
                $_SESSION['jy_client'] ="Paul";
              echo " Welcome Back Paul !";  
              }
            }
    ?>
         </center>  </td> 
      
        </tr>
        <?php
        if(isMobile()){
      ?>

<tr>
     <td>Password :</td>
     </tr>
     <tr>
     <?php if($_SESSION['jy_pwd']){ ?>
     <td ><input class="form-control"  value="<?php echo (trim($_SESSION['jy_pwd']));?>"  type="text" disabled readonly="readonly" name="password" id="password" >
       </td>
     <?php }  else {?>
      <td ><input class="form-control"  value="" type="text" name="password"  id="password" placeholder="Enter Password here" required='required'>
       </td>
     <?php  }  ?>
     </tr>
     <tr>
       <td>
       <input type="button" name="getstoredata" id="getstoredata" class="btn btn-primary" value="Get store">

     </td>
   </tr>

   <tr>
     <td>Store List :</td>
     </tr>
     <tr>
     <td>
     <select class="form-control"  placeholder="Select Store"  required='required' name="storename" id='storename'></select>
     </td>

</tr>
<tr><br/></tr>
<tr>
<td >
<input type="submit" class="btn btn-primary"  name="submit" id="submit" value="Login">

<?php if($_SESSION['jy_pwd']){?>

<a class="btn btn-danger" href="logout.php" title="Click to enter into new group ">Logout</a>
<?php }?>
</td>
   </tr>





      <?php
      }else{
      ?>
        <tr>
     <td>Password :</td>
     <?php if($_SESSION['jy_pwd']){ ?>
     <td><input class="form-control"  value="<?php echo (trim($_SESSION['jy_pwd']));?>"  type="text" disabled readonly="readonly" name="password" id="password" >
       </td>
     <?php }  else {?>
      <td><input class="form-control"  value="" type="text" name="password"  id="password" placeholder="Enter Password here" required='required'>
       </td>
     <?php  }  ?>
       <td>
       <input type="button" name="getstoredata" id="getstoredata" class="btn btn-primary" value="Login">
     </td>
   </tr>

   <tr>
     <td>Store List :</td>
     <td>
     <select class="form-control"  placeholder="Select Store"  required='required' name="storename" id='storename'></select>
     </td>

</tr>
<tr><br/></tr>
<tr>
<td></td>
<td colspan="2">
<input type="submit" class="btn btn-primary"  name="submit" id="submit" value="Get Store">

<?php if($_SESSION['jy_pwd']){?>
<a class="btn btn-danger" href="logout.php" title="Click to enter into new group ">Logout</a>
<?php }?>
</td>
   </tr>

      <?php }
      ?>
 </table>
 
</div>

</body>
</html>
