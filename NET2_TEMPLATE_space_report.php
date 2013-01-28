<?php

function graph_NET2_TEMPLATE_space_report ( &$rrdtool_graph ) {

	global $context,
	       $rrd_dir,
	       $range,
	       $size;

	$series =
		  "DEF:'size'='${rrd_dir}/NET2_TEMPLATE_size.rrd':'sum':AVERAGE "
		. "DEF:'used'='${rrd_dir}/NET2_TEMPLATE_disk_usage.rrd':'sum':AVERAGE "
		. "LINE2:'size'#ff0000:'Total Size' "
		. "AREA:'used'#0000ff:'Used' "
		;
	
	//required
	$rrdtool_graph['title'] = "NET2_TEMPLATE Space last $range";
	$rrdtool_graph['vertical-label'] = 'GiB';
	$rrdtool_graph['series'] = $series;
	
	//optional
	$rrdtool_graph['lower-limit'] = '0';
	$rrdtool_graph['extras'] = '--rigid --base 1024';

	return $rrdtool_graph;

}

?>
