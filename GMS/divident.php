<HTML>
 <TITLE>Share</TITLE>
 <HEAD>
 
 

   <BODY BGCOLOR=#EBFDFD BORDER=20 ONLOAD="check_brzr()" BACKGROUND="resources\BACK.JPG">
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
<TR>&nbsp;&nbsp;
<TD >&nbsp;&nbsp;|<A HREF="index.HTML" STYLE='TEXT-DECORATION: NONE;'>Home</A>|</TD>
<TD >&nbsp;&nbsp;|<A HREF="master.php" STYLE='TEXT-DECORATION: NONE;'>Master Account</A>|</TD>
<TD >&nbsp;&nbsp;|<A HREF="custdetails.php" STYLE='TEXT-DECORATION: NONE;'>Customer Detail</A>|</TD>
<TD >&nbsp;&nbsp;|<A HREF="loandetail.php" STYLE='TEXT-DECORATION: NONE;'>Loan Detail</A>|</TD>
<TD >&nbsp;&nbsp;|<A HREF="divident.php" STYLE='TEXT-DECORATION: NONE;'>Divident Detail</A>|</TD>
</TR>
</TABLE>
</TD><TR>
</TABLE>
</TD>
</TABLE>
</TABLE>
<BR><BR><BR><BR>
<H2><P><CENTER STYLE="COLOR: #BCC2BB; FONT-FAMILY:Comic Sans MS; FONT-SIZE: 54pt;"> Welcome to Share-MAster </CENTER></P></H2>
<DIV><P>

</P></DIV>
</HEAD>
</BODY>
</HTML>



<?PHP
	include "customer.php";
	$cust = array();
	$c = new customer;
	$cust = $c->select();

echo "<center STYLE='COLOR:#988F86; FONT-FAMILY:Sylfaen; FONT-SIZE: 20pt;'><u>SHARE HOLDER DETAILS</u></center>";
echo "<table align=center  border=1 CELLPADDING=10% CELLSPACING=1% >";
echo "<th><u>Share No</u>
      <th><u>Name</u>
	  <th><u>Address</u>
	  <th><u>No of Shares</u>
	  </th>";
	 
foreach ($cust as &$value)
     {
	 
	   echo "<tr>
	         <td>$value->id 
			 <td>$value->name
			 <td>$value->address 
			 <td>$value->numshares 
			
			 ";
	   
	 
	 }
	 
echo "</table>";	 
mysql_close();
?>