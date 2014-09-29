<?php session_start(); 
?>

<script type="text/javascript">
function validate_form1()
{
for (i=1;i<=$('#num_cat').val();i++) {
if(document.forms["form4"]["description-"+i].value=="")
{
alert("Please Enter The Description");
return false;
}
else if(document.forms["form4"]["quantity-"+i].value=="")
{
alert("Please Enter The Quantity");
return false;
}
}
return true;
}
</script>




<script src="jquery-1.4.2.min.js"></script>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" type="text/css" href="cssstyles.css" />

<style> 
body {
/*  background: url(../random-login-form/css/image/wallpaper2.jpeg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;*/
        width:80%;
        margin-left:auto;
        margin-right:auto;
}
</style>

<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/uploader.js"></script>


<link type="text/css" href="css/uploader.css" rel="stylesheet" />


<script type="text/javascript">
$(document).ready(function()
{
	new multiple_file_uploader
	({
		form_id: "fileUpload", 
		autoSubmit: true,
		server_url: "uploader.php" // PHP file for uploading the browsed files
	});
});
</script>






<meta charset="UTF-8">

<title>PS page</title>
</head>

<body>

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px;  background:green;">
  <table width="200" border="1">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="ps_page.php?op=quotation">Quotation</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="ps_page.php?op=wo_po">PO / WO Preparation</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="ps_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;background:red;">
  <div class="header" align="center">
  <table width="700" border="1">
    <tr>
      <td width="342">Employee Name : <?php echo $_SESSION['Employee'];?> </td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role : <?php echo $_SESSION['role'];?></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
if($_REQUEST['op']=='quotation' || $_REQUEST['op']=='approval' || $_REQUEST['op']=='wo_po')
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" border="1">
      <tr>
        <td width="612" height="33">Project Name : 
          <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612">Status :<label>
              <select name="status" id="status">
                <option value="">Choose</option>  
                <option value="Project created">Project created</option>
                <option value="Request for quotation">Request for quotation</option>
                <option value="Create quotation">Create quotation</option>
                <option value="Quotation approval">Quotation approval</option>
                <option value="WO created">WO created</option>
                <option value="PO created">PO created</option>
              </select>
              </label>
          
          </td>
      </tr>
      <tr>
        <td>Project ID : 
          <input type="text" placeholder="Project ID" name="project_id"></td>
        <td><input name="search_submit" type="submit" class="style3" value="Search" /></td>
      </tr>
    </table>
	</form>
  </div>
  
  <?php }?>
<div class="search_table" align="center">
  <p>&nbsp;</p>
  <table width="700" border="1">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Initiated By </td>
    </tr>
    <?php 

   include 'another.php'; 
   ?>
  </table>
  </div>
  <p>&nbsp;</p>
  <?php
  if($_REQUEST['op']=='quotation' && $_REQUEST['search']=='click' && $_REQUEST['po']=='click')
  {
  if(isset($_REQUEST['quote']))
  {
$quote_no=$_REQUEST['quote']+1;
  }
  else
  {
    $quote_no=1;
  }
  if($quote_no!=4)
  {
  ?>
  
  <div class="quote" align="center">
<p>Quote<?php echo $quote_no; ?></p>
  <form name="form4" method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=project1&po=click&wo=create&quote=<?php echo $quote_no; ?>" onSubmit="return validate_form1()">
    <p>Vendor Name : <input type="text" placeholder="Vendor Name" name="vendor_name"> Contact No : <input type="text" placeholder="Contact No" name="contact_no"></p>
	
	<table width="700" border="1">
  <tr>
    <td>Sno</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Rate</td>
    <td>Total</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

    <input name="quote_submit" type="submit" class="style3" value="Submit" />
  </form>



</div>

<?php
}
if($quote_no==4)
{
?>

<div class="upload_box">
<form name="fileUpload" id="fileUpload" action="javascript:void(0);" enctype="multipart/form-data">
<div class="file_browser"><input type="file" name="multiple_files[]" id="_multiple_files" class="hide_broswe"  /></div>
<div class="file_upload"><input type="submit" value="Upload" class="upload_button" /> </div>
</form>
</div>	


<div class="file_boxes">

</div>
<span id="removed_files"></span>
<br>
<p>&nbsp;</p>
<p>&nbsp;</p>




<?php
}
}

if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
?>

  <div class="wo_po" align="center">
  <form name="form5" method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=project1&po=click&wo=create"  >
    <p>Vendor Name : <input type="text" placeholder="Vendor Name" name="vendor_name"> Contact No : <input type="text" placeholder="Contact No" name="contact_no"></p>
	
	<table width="700" border="1">
  <tr>
    <td>Sno</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Rate</td>
    <td>Total</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<p>	
  <?php
    include 'dynamic_textfield1.php';
   ?>
</p>
    <input name="wo_po_submit" type="submit" class="style3" value="Submit" />
  </form>



</div>


<?php
}
?>
</div>
</div></div>
</body>
</html>



<?php

if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click' && @$_REQUEST['pn']=='project1' && @$_REQUEST['po']=='click' && @$_REQUEST['wo']=='create')
{
  include 'connection.php';
    $count=1;
    while (isset($_REQUEST['description-'.$count])) {

      $desc=$_REQUEST['description-'.$count];
      $per=$_REQUEST['percentage-'.$count];


      $id_search=mysqli_query($con,"SELECT max(st_stid) as maximum from stg_stage");



while ($row=mysqli_fetch_array($id_search))
 {
    if(empty($row['maximum']))
    {
      $id_no="ST-00001";
    }
    else
    {
      if(intval(substr($row['maximum'], 4))==99999)
      {
        $str=substr($row['maximum'],0,2);
        ++$str;
        $id_no=$str.'-00001';
       
      }
      else
        $id_no=++$row['maximum'];      

    }
  }
   
    
      $insert="INSERT INTO stg_stage(st_stid,st_stdesc,st_strate) VALUES('$id_no','$desc','$per')";
      mysqli_query($con,$insert);
    $count++;
    
    }

      echo "<script>alert('stage table updated');</script>";
 }
?>



<?php

function id()
{



 
  }

  ?>