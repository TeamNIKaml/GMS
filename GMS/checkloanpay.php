<HTML>
 <TITLE>EXAM</TITLE>
 <HEAD>
 
 

   <BODY BGCOLOR=#ECE9D8 BORDER=20  >
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
$loan_id=$_GET['loanradio'];
$amount=$_GET['loanamnt'];

$db=mysql_connect("localhost","root"," ") or die ("Database could not be accesed");
mysql_select_db("account",$db) or die ("Database could not be accesed");


$result=mysql_query("select paid_amt from loan where loan_no=$loan_id")or die("Database error");
$paid=mysql_result($result,paid_amt);	
$result=mysql_query("select return_amt from loan where loan_no=$loan_id")or die("Database error");
$returned=mysql_result($result,return_amt);	

//echo $returned;
//echo $paid;

if(($paid+$amount)>$returned)
                            {
							die("The loan payment amount is excess");
							}
else
{			
mysql_query("update loan set  paid_amt=paid_amt+$amount where loan_no=$loan_id");
mysql_query("update master set net_amt=net_amt+$amount,loan_collected_amt=loan_collected_amt+$amount");

if(($paid+$amount)==$returned)
                   {
				   mysql_query("update loan set status=1 where loan_no=$loan_id");
				   }

$query="select * from loan where loan_no=$loan_id";
$result=mysql_query($query) or die ("Database error");
echo "<br><br><center STYLE='COLOR:#BE201A;FONT-FAMILY:Courier New;FONT-SIZE:24pt;'><u>CURRENT LOAN PAYMENT DETAILS</u></center><br>";
echo "<table align=center  border=1 CELLPADDING=10% CELLSPACING=1% >";
echo   "<th><u>Loan No</u>
		<th><u>Share No</u>
		<th><u>Name</u>
		<th><u>Loan Amount</u>
		<th><u>Prepaid Amount</u>
		<th><u>Current Payment</u>
		<th><u>Total Payment Amount</u>
		<th><u>Issue date</u>
		</th>";
while($row=mysql_fetch_array($result))
     {
	 
	 echo "<tr>
	       <td>$row[loan_no]
		   <td>$row[c_id]
		   <td>$row[c_name]
		   <td>$row[loan_amt]
		   <td>$paid
		   <td>$amount
		   <td>$row[paid_amt]
		   <td>$row[issue_date]
		   </td></tr>";
	 }
	 
}	 
?>