<?php

function graph_NET2_space_report ( &$rrdtool_graph ) {

	global $context,
	       $rrd_dir,
	       $range,
	       $size;
	
	$series =
		  "DEF:'size'='${rrd_dir}/NET2_storage_size.rrd':'sum':AVERAGE "
		. "DEF:'data'='${rrd_dir}/NET2_DATADISK_disk_usage.rrd':'sum':AVERAGE "
		. "DEF:'mc'='${rrd_dir}/NET2_MCDISK_disk_usage.rrd':'sum':AVERAGE "
		. "DEF:'prod'='${rrd_dir}/NET2_PRODDISK_disk_usage.rrd':'sum':AVERAGE "
		. "DEF:'user'='${rrd_dir}/NET2_USERDISK_disk_usage.rrd':'sum':AVERAGE "
		. "DEF:'group'='${rrd_dir}/NET2_GROUPDISK_disk_usage.rrd':'sum':AVERAGE "
		. "DEF:'localgroup'='${rrd_dir}/NET2_LOCALGROUPDISK_disk_usage.rrd':'sum':AVERAGE "
		. "DEF:'hot'='${rrd_dir}/NET2_HOTDISK_disk_usage.rrd':'sum':AVERAGE "
		. "LINE2:'size'#ff0000:'Total Size' "
		. "AREA:'data'#0000ff:'DATA' "
		. "STACK:'mc'#ff0000:'MC' "
		. "STACK:'prod'#00ff00:'PROD' "
		. "STACK:'user'#ff00ff:'USER' "
		. "STACK:'group'#ffff00:'GROUP' "
		. "STACK:'localgroup'#00ffff:'LOCALGROUP' "
		. "STACK:'hot'#555555:'HOT' "
		;
	
	//required
	$rrdtool_graph['title'] = "NET2 Space last $range";
	$rrdtool_graph['vertical-label'] = 'GiB';
	$rrdtool_graph['series'] = $series;
	
	//optional
	$rrdtool_graph['lower-limit'] = '0';
	$rrdtool_graph['extras'] = '--rigid --base 1024';

	return $rrdtool_graph;

}

?>
