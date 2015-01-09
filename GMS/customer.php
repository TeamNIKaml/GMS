<?php
	class customer
	{
		var $id;
		var $name;
		var $address;
		var $numshares;
		function select()
		{
			$db=mysql_connect("localhost","root","") or die ("Database could not be accesed");
			mysql_select_db("account",$db) or die ("Database tables could not be accesed");
			$result = mysql_query("select * from customer");
			$i=1;
			$cust = array();
			while($row = mysql_fetch_array($result))
			{
				$cust[$i] = new customer;
				$cust[$i]->id = $row['c_id'];
				$cust[$i]->name = $row['c_name'];
				$cust[$i]->address = $row['c_add'];
				$cust[$i++]->numshares = $row['c_numshares'];
				//$i++;
			}
			foreach ($cust as &$value)
     {
	 
	   echo "<tr>
	         <td>$value->id 
			 <td>$value->name
			 <td>$value->address 
			 <td>$value->numshares 
			
			 ";
	   
	 
	 }
			
			
			return $cust;
		}
	}
?>
