<h2>My Matches</h2>

<?php
	foreach ($matches as $match => $value) 
	{
		echo "<h3>" . $value["id"] . "</h3>";
		echo "<table class='table table-striped'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Match Name</th>";
		echo "<th>Match Description</th>";
		echo "<th></th>";
		echo "</tr>";
		echo "</thead>";

		foreach ($value["matches"] as $match => $result) 
		{
			echo "<tr>";
			echo "<td>" . $result["name"] . "</td>";
			echo "<td>" . $result["description"] . "</td>";
			echo "<td>";
			
			echo Html::anchor('play/play/'.$result["id"], 'Play'); 

			if($role > 1)
			{
				echo Html::anchor('matches/view/'.$result["id"], ' View'); 
				echo Html::anchor('matches/edit/'.$result["id"], ' Edit');  
				echo Html::anchor('matches/delete/'.$result["id"], ' Delete', array('onclick' => "return confirm('Are you sure?')"));	
			}
			
			
			echo "</td>";
			echo "</tr>";
		}
		
		echo "</table>";
	}
?>