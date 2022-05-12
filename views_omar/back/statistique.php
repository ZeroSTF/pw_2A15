<?php // content="text/plain; charset=utf-8"
require ('../../jpgraph-4.4.0/src/jpgraph.php');
require ('../../jpgraph-4.4.0/src/jpgraph_pie.php');
require ('../../jpgraph-4.4.0/src/jpgraph_pie3d.php');
include '../../Controller/abonnement.php';
$abonnementb=new abonnementA();
$type1= $abonnementb->gettype1();
$type2 =$abonnementb->gettype2();
$type3=$abonnementb->gettype3();

foreach($type1 as $row1)
$type1=$row1['total'];

foreach($type2 as $row2)
$type2=$row2['total'];
foreach($type3 as $row3)
    $type3=$row3['total'];
// Some data
$data = array($type1,$type2,$type3);

// Create the Pie Graph. 
$graph = new PieGraph(500,350);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Statistique par type abonnement");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();

?>