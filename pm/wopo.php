&nbsp;
&nbsp;
<br>
<br>
<table width="700" border="1">
  <tr>
    <td>Stage id</td>
    <td>Work order</td>
    <td>Description</td>
    <td>Rate</td>
    
  </tr>
 
<?php
#####################################
$result=mysqli_query($con,"SELECT * from stg_stage");
$result1=mysqli_query($con,"SELECT * from orders");
$result2=mysqli_query($con,"SELECT * from wok_order");
$result3=mysqli_query($con,"SELECT * from pod_order");
#####################################

function disp()
{
	?>
<tr>
    <td><?php echo $_SESSION['id']; ?></td>
    <td><?php echo $_SESSION['woid']; ?></td>
    <td><?php echo $_SESSION['desc']; ?></td>
    <td><?php echo $_SESSION['rate']; ?></td>    
  </tr>
 	

<?php
}
while($row1=mysqli_fetch_array($result2))
{	
	if($row1['wo_wocid']==$_REQUEST['or'])
		{
			while($row=mysqli_fetch_array($result))
			{
				if($row['st_woid']==$_REQUEST['or'])
				{
					$_SESSION['id']=$row['st_stid'];
					$_SESSION['woid']=$row['st_woid'];
					$_SESSION['desc']=$row['st_stdesc'];
					$_SESSION['rate']=@$row['st_strate'];
					disp();
				}
			}
		}
}
?>
</table>
&nbsp;
&nbsp;

<form method="POST" action="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_REQUEST['pn']; ?>&or=<?php echo $_SESSION['order'];?>&st=insert">
     
    <input type="submit" value="Approve" name="Approvalwopo">&nbsp;&nbsp;&nbsp; 
    <input type="submit" value="Reject" name="Rejectwopo">
</form>  