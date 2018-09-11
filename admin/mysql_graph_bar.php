<?php 
 include('dbcon.php');
						include("phpgraphlib.php");
						$graph=new PHPGraphLib(850,350);
                        $results = $pdo->prepare("SELECT Total_Amount, Month  FROM tbl_payment WHERE Actif = 1 And Status ='Delivré' GROUP BY Total_Amount");
                        $results->execute();
						if ($results) {
                            while($row = $results->fetch()){
                                  $salesgroup=$row['Total_Amount'];
								  $count=$row['Month'];
								  //add to data areray
								  $dataArray[$count]=$salesgroup;
                        }
						}
						//configure graph
							$graph->addData($dataArray);
							$graph->setTitle("Graphique des ventes");
							$graph->setGradient("lime", "green");
							$graph->setBarOutlineColor("black");
							$graph->setDataValues(true);
							$graph->setDataValueColor('blue', 'red');
							$graph->setXValuesHorizontal(true);
							$graph->createGraph();
                        ?>
						