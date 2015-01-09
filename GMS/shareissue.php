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
$shares=$_GET['tnumshares'];
$name=$_GET['tname'];
//$shareno=$_GET['tshareno'];
$address=$_GET['tadd'];
$custid=$_GET['cid'];

$db=mysql_connect("localhost","root","") or die ("Database could not be accesed");
mysql_select_db("account",$db) or die ("Database could not be accesed");
mysql_query("insert into customer values($custid,'$name','$address',$shares)") or die ("Database error");//updated customer table

if($custid==1)
             {
			 mysql_query("insert into master values(0,0,0,0,0,0,0,0,0)")or die("Database error 1");
			 }

$amount=$shares*100;


mysql_query("update master set share_issue_amt=share_issue_amt+$amount,work_amt=work_amt+50,net_amt=net_amt+$amount") or die ("Database error 2");//updated master account table

mysql_query("insert into dailycollection values($custid,'$name',sysdate(),0)")or die ("Databse error 3");//updated dailycollection table

/*****Details********/
echo "<center STYLE='COLOR:#988F86; FONT-FAMILY:Sylfaen; FONT-SIZE: 20pt;'><u>SHARE HOLDER DETAILS</u></center><br>";
echo "<table border=1 align=center bgcolor=#CFDEE1>";
echo "<tr bgcolor=#E44D6F><th><u>Share No</u><th><u>Name</u><th><u>Address</u><th><u>No of shares</u><th><u>Share Amount</u></th>";

$result=mysql_query("select * from customer") or die("Database error 4");
while($row=mysql_fetch_array($result))
     {
	  $temp=$row['c_numshares']*100;
	  if($row['c_id']==$custid)
	                        {
							echo "<tr bgcolor=#55BE47><td>$row[c_id]<td>$row[c_name]<td>$row[c_add]<td>$row[c_numshares]<td>$temp</td>";
							}
	  else
      { 	  
	  echo "<tr><td>$row[c_id]<td>$row[c_name]<td>$row[c_add]<td>$row[c_numshares]<td>$temp</td>";
      }
	 } 



?>
