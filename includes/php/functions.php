<?php
function load_styleSheets($STYLES)
{
	for($i=0;$i<count($STYLES);$i++)
	{
		$style = $STYLES[$i];
		echo "<link href='$style' rel='stylesheet'/>";
	}
}

function load_scripts($SCRIPTS)
{
	for($i=0;$i<count($SCRIPTS);$i++)
	{
		$script = $SCRIPTS[$i];
		echo "<script src='$script'></script>";
	}
}

function get_num_rows($table, $where)
{
	global $conx;
	$query = "SELECT COUNT(*) as total FROM $table WHERE $where";
	$query = mysqli_query($conx, $query);
	if($query and mysqli_num_rows($query)>0)
	{
		$row =  mysqli_fetch_array($query);
		return $row["total"];
	}
}