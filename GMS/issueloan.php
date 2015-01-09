<HTML>
 <TITLE>EXAM</TITLE>
 <HEAD>
 
 

   <BODY BGCOLOR=#ECE9D8 BORDER=20 >
       <STYLE TYPE="TEXT/CSS">
<!--
a:link { color: #000000;}
a:visited { color: #000000;}
a:hover { color: #CCCCCC;
  background-color: #AFBBAD;
  text-decoration: none;
  }
a:active { color: #FA3838;}
P { font-family: "New Century Schoolbook", Times, serif }
P { font-style: oblique }
P { font-weight: 800 }
P { font-size: 24pt/48px }


}
-->
</STYLE> 
<TABLE NAME="DISPLAY" BORDER="0" CELLPADDING="0%" CELLSPACING="0%"  ALIGN="CENTER"  WIDTH="100%" > 
<FONT COLOR="#FA3838">
<TD BACKGROUND="resources\g.jpg"><MARQUEE BACKGROUND="resources\g.jpg" DIRECTION="LEFT" SCROLLDELAY="1" SCROLLAMOUNT="3" BEHAVIOUR="SLIDE" STYLE="COLOR: WHITE; FONT-FAMILY: ARIAL; FONT-SIZE: 8pt;">loginakhil@gmail.com &copy Copyright  </I></MARQUEE></TD><TR>
<!--<TD BGCOLOR="#D0F0FF"></TD><TR>
<TD BGCOLOR="#A1DEFF"></TD><TR>-->
<TD>
<TABLE NAME="BASETABLE" WIDTH=100% CELLPADDING="0%" CELLSPACING="0%"  ALIGN="CENTER" BGCOLOR="#CDC69C"  STYLE="COLOR: WHITE; FONT-FAMILY:Constantia; FONT-SIZE: 18pt;" BACKGROUND="resources\g.jpg">
<TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<TABLE NAME="MENU" BORDER="0" CELLPADDING="2%" CELLSPACING="2%"  ALIGN="CENTER" BGCOLOR="#CDC69C"  STYLE="COLOR: WHITE; FONT-FAMILY:Constantia; FONT-SIZE: 18pt;" BACKGROUND="resources\g.jpg">
<TR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<TD >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<A HREF="index.HTML" STYLE='TEXT-DECORATION: NONE;'>HOME</A>|</TD>
<TD >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<A HREF="newshare.php" STYLE='TEXT-DECORATION: NONE;'>New Share</A>|</TD>
<TD >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<A HREF="newloan.php" STYLE='TEXT-DECORATION: NONE;'>New Loan</A>|</TD>
<TD >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<A HREF="dailycollection.php" STYLE='TEXT-DECORATION: NONE;'>Weekly Payment</A>|</TD>
<TD >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<A HREF="loanpay.php" STYLE='TEXT-DECORATION: NONE;'>Loan Payment</A>|</TD>
</TR>
</TABLE>
</TD><TR>
</TABLE>
</TD>
</TABLE>
</TABLE>
<BR><BR><BR><BR>
<!--<H2><P><CENTER STYLE="COLOR: #BCC2BB; FONT-FAMILY:Comic Sans MS; FONT-SIZE: 54pt;"> Welcome to Share-MAster </CENTER></P></H2>
<DIV><P>

</P></DIV>-->
</HEAD>
</BODY>
</HTML>
<?PHP
$cust=$_GET['cid'];
$amt=$_GET['loanamt'];
$checkno=$_GET['chkno'];
$name=$_GET['cname'];

$db=mysql_connect("localhost","root","") or die ("Database could not be accesed");
mysql_select_db("account",$db) or die ("Database could not be accesed");

$query="select net_amt from master";
$result=mysql_query($query)or die("Database error 1");
$balance_amt=mysql_result($result,net_amt);

$query="select max(loan_no) from loan";
$result=mysql_query($query)or die("Database error 2");
$loanno=mysql_result($result,loan_no);
$loanno++;

mysql_free_result($result);

if($balance_amt>$amt)
    {
	$tamt=$amt*.05;
	$camt=$amt-$tamt;
    mysql_query("insert into loan values($loanno,$cust,'$name',$amt,$camt,$tamt,$amt,0,'$checkno',sysdate(),0)")or die("Database error 3");	
	mysql_query("update master set net_amt=net_amt-$camt,loan_issue_amt=loan_issue_amt+$amt,loan_interest_amt=loan_interest_amt+$tamt")or die("Database error 4");
	
	/*****Details********/
    echo "<center STYLE='COLOR:#988F86; FONT-FAMILY:Sylfaen; FONT-SIZE: 20pt;'><u>LOAN DETAILS</u></center><br>";
    echo "<table border=1 align=center bgcolor=#CFDEE1>";
    echo "<tr bgcolor=#E44D6F>
	      <th>Loan No
	      <th>Share No
		  <th>Name
		  <th>Loan Amount
		  <th>Issue Amount
		  <th>Interest Amount
		  <th>Check No
		  <th>Issue Date</th>";

    $result=mysql_query("select * from loan") or die("Database error 5");
    while($row=mysql_fetch_array($result))
     {
	  $temp=$row[c_numshares]*100;
	  if($row[c_id]==$cust)
	                        {
							echo "<tr bgcolor=#55BE47>
							<td>$row[loan_no]
							<td>$row[c_id]
							<td>$row[c_name]
							<td>$row[loan_amt]
							<td>$row[issue_amt]
							<td>$row[interest_amt]
							<td>$row[check_no]
							<td>$row[issue_date]";
							}
	  else
      { 	  
	  echo "<tr>
	  <td>$row[loan_no]
	  <td>$row[c_id]
	  <td>$row[c_name]
	  <td>$row[loan_amt]
	  <td>$row[issue_amt]
	  <td>$row[interest_amt]
	  <td>$row[check_no]
	  <td>$row[issue_date]";
	        
      }
	 } 
	
	
	//mysql_close();
	//echo "issued loan for rupees $amnt";
    }
else
	{
       echo"Requested amount cannot be issued....";
	}


?>