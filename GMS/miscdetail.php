<?PHP
$db=mysql_connect("localhost","root","") or die ("Database could not be accesed");
mysql_select_db("account",$db) or die ("Database tables could not be accesed");

$result=mysql_query("select * from misc") or die("Database error");

echo "<center STYLE='COLOR:#988F86; FONT-FAMILY:Sylfaen; FONT-SIZE: 20pt;'><u>MISC ACCOUNT DETAILS</u></center><br>";
echo "<table align=center  border=1 CELLPADDING=10% CELLSPACING=1% bgcolor=#DEE3E7>";
echo "<th><u>No.</u>
      <th><u>Comment</u>
	  <th><u>Amount</u>
	  <th><u>Issue Date</u></th>";
	  
while($row=mysql_fetch_array($result))
    {
	echo "<tr><td>$row[no]
	      <td>$row[matter]
		  <td>$row[amount]
		  <td>$row[issuedate]";
    }
    
mysql_close();	
?>