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
$db=mysql_connect("localhost","root","") or die ("Database could not be accesed");
mysql_select_db("account",$db) or die ("Database tables could not be accesed");

$query="select max(c_id) from customer";
$result=mysql_query($query);
$maxno=mysql_result($result,0);	
$maxno++;




echo"<br>";
echo "<center STYLE='COLOR:#988F86; FONT-FAMILY:Sylfaen; FONT-SIZE: 20pt;'><u>ADD NEW USER DETAILS</u></center>";
echo "<form name=fm1 action=shareissue.php method=get>";
echo "<table align=center width=45% CELLPADDING=6% CELLSPACING=1% >";
echo "<tr bgcolor=#D3D0D1>";
echo "<td>Share Id/No:<td>$maxno</td>";
echo "<tr bgcolor=#D1C6BF>";
echo "<td>Name:<td><input type=text name=tname size=48></td>";
echo "<tr bgcolor=#D3D0D1>";
echo "<td>Address:<td><TEXTAREA name=tadd ROWS=5 COLS=37 ></TEXTAREA></TD>";
echo "<tr bgcolor=#D1C6BF>";
//echo "<tr bgcolor=#D3D0D1>";
echo "<td>No of shares:";//<td><option name=tsharecount >";
                     echo "<td><select name=tnumshares>";
					 echo "<option>1<option>2<option>3<option>4<option>5<option>6<option>7<option>8<option>9<option>10
					       <option>11<option>12<option>13<option>14<option>15<option>16<option>17<option>18<option>19<option>20
						   </option>";
					 echo "</select>";
					 echo "</td>";
echo "<tr bgcolor=#D1C6BF>";					 
echo "<td><td align=center><input type=submit value=Submit>&nbsp;&nbsp;&nbsp;&nbsp;<input type=reset value=Reset></td>";
echo "</tr>";
echo "</table>";
echo "<input type=hidden value=$maxno name=cid>";
echo "</form>";


?>