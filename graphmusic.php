<?php
// inclusion des classes
require('./jpgraph/src/jpgraph.php');
require('./jpgraph/src/jpgraph_bar.php');
require "./include/functions.inc.php";

// donnees des axes Y et X
$ydata = array();
$xdata = array();

$list = readCSV('songdata.csv');
for ($i=1; $i<sizeof($list); $i++) {
    array_push($ydata, $list[$i][2]);
    array_push($xdata, $list[$i][0]);     
}

 // Create the graph. These two calls are always required
 $graph = new Graph(1000,500,'auto');
 $graph->SetScale("textint");

 $theme_class = new UniversalTheme;
 $graph->SetTheme($theme_class);

 $graph->Set90AndMargin(200,40,40,40);
 $graph->img->SetAngle(90); 

 $graph->SetBox(false);

 $graph->ygrid->SetFill(false);
 $graph->xaxis->SetTickLabels($xdata);
 $graph->yaxis->HideLine(false);
 $graph->yaxis->HideTicks(false,false);

 // Create the bar plots
 $bplot = new BarPlot($ydata);

 // ...and add it to the graPH
 $graph->Add($bplot);

 $bplot->SetColor("white");
 $bplot->SetFillColor("#c52138");

 $graph->title->Set("Histogramme des musiques consultés");

 // Display the graph
 $graph->Stroke();
?>