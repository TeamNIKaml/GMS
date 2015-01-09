<HTML>
<TITLE>Share Master</TITLE>
  <SCRIPT LANGUAGE="JavaScript">
 <!--
  function printall()
  {
  window.print();
  }
 //-->
</SCRIPT>
 <!--
   <BODY BGCOLOR=#EBFDFD BORDER=20 ONLOAD="printall()">
   
   //-->
   <BODY BORDER=20 >
   


<?PHP

$db=mysql_connect("localhost","root","") or die ("Database could not be accesed");
mysql_select_db("account",$db) or die ("Database tables could not be accesed");

echo "<center STYLE='COLOR:#988F86; FONT-FAMILY:Sylfaen; FONT-SIZE: 20pt;'><u>MASTER ACCOUNT DETAILS</u></center><br>";
echo "<table align=center  border=1 CELLPADDING=3% CELLSPACING=0% bgcolor=#FFFFFF>";	 
echo   "<th><u>Share</u>
		<th><u>Loan Issued</u>
		<th><u>Loan Payment</u>
		<th><u>Loan Interest</u>
		<th><u>Weekly Collection</u>
		<th><u>Bank Interest</u>
		<th><u>Working Fund</u>
		<th><u>Misc Expence</u>
		<th><u>Working Fund Balance</u>
		<th><u>Net Balance</u>
        </th>";

$result=mysql_query("select * from master") or die ("Database error");
	 
while($row=mysql_fetch_array($result))
     {
	 $temp=$row[work_amt]-$row[misc_amt];
	 echo "<tr>
	       <td>$row[share_issue_amt]
		   <td>$row[loan_issue_amt]
		   <td>$row[loan_collected_amt]
		   <td>$row[loan_interest_amt]
		   <td>$row[daily_collection_amt]
		   <td>$row[bank_interest_amt]
		   <td>$row[work_amt]
		   <td>$row[misc_amt]
		   <td>$temp
		   <td>$row[net_amt]
		   </td></tr>";
	 }
echo "</table>";
mysql_close();	 
	 
?>