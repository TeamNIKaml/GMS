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
$db=mysql_connect("localhost","root","") or die ("Database could not be accesed");
mysql_select_db("account",$db) or die ("Database could not be accesed");

$loan_id=$_GET['counter'];
$ans=array(counter);
//echo $counter;
$gain=0;
for($i=1;$i<=$counter;$i++)
 {
 $tname="c"."$i";
    {
	$ans[$i]=$_GET[$tname];
    mysql_query("update dailycollection set amount=amount+$ans[$i],last_date=sysdate() where c_id=$i") or die("Database error 1");
	$gain+=$ans[$i];
	}
 }

 
mysql_query("update master set net_amt=net_amt+$gain,daily_collection_amt=daily_collection_amt+$gain") or die("Database eroor 2");

$result=mysql_query("select c_id,c_name,amount from dailycollection") or die("Database erro 3");
echo "<center STYLE='COLOR:#988F86; FONT-FAMILY:Sylfaen; FONT-SIZE: 20pt;'><u>DAILY COLLECTION DETAILS</u></center><br>";
echo "<table align=center  border=1 CELLPADDING=10% CELLSPACING=1% bgcolor=#DEE3E7 >";
echo "<th>Share No<th>Name<th>Previous amount<th>Amount Paid<th>Current Amount</th>";
$i=1;
while($row=mysql_fetch_array($result)) 
     {
	 $pre=$row[amount]-$ans[$i];
	 echo "<tr><td>$row[c_id]<td>$row[c_name]<td>$pre<td>$ans[$i]<td>$row[amount]</td>";
	 $i++;
	 }
mysql_close();

?>