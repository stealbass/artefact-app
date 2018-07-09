<?php 
 include('dbcon.php');
						include("phpgraphlib.php");
						include("phpgraphlib_pie.php");
						$graph=new PHPGraphLibPie(450,280);
                        $results = $pdo->prepare("SELECT Total_Amount, Date  FROM tbl_payment WHERE Actif = 1 And Status ='Payé' GROUP BY Total_Amount");
                        $results->execute();
						if ($results) {
                            while($row = $results->fetch()){
                                  $salesgroup=$row['Total_Amount'];
								  $count=$row['Date'];
								  //add to data areray
								  $dataArray[$count]=$salesgroup;
                        }
						}
						//configure graph
							$graph->addData($dataArray);
							$graph->setTitle("Graphique des ventes");
							$graph->setLabelTextColor("blue");
							$graph->createGraph();
                        ?>