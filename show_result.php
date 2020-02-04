<div class="container">
    <h3>Drug Metabolism Prediction</h3>
    <div class="row">
        <div class="span7">

            <div class="well">
             
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Proteins</th>
                            <th>Prediction</th>
                            <th>Confidence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                        foreach ($result_ar as $k => $v) {
								    if ($k == "smiles" || $k == "image") continue;
                            echo "
                            <tr>
                                <td><b>", $k, "</b></td>";
									 if ($v['activity'] == "active")
									 	echo "<td><b><span class='badge bg-success'>", $v['activity'], "</span></b></td>";
									 else
									 	echo "<td><b><span class='badge bg-danger'>", $v['activity'], "</span></b></td>";
									 echo "<td>", number_format((float)$v['confidence']*100, 2, '.', '') , " %</td>
                            </tr>";
                        }
                        ?>
                  
                    </tbody>
                </table>
					 <form>
					     <input type="button" class="btn btn-inverse" value="Back" onclick="history.go(-1);return true;">
					 </form>

            </div>
        </div>
		  <div class="span2"></div>
		  <div class="span3">
		      <div class="well">
			       <?php echo '<img src="data:image/gif;base64,' . $result_ar["image"] . '" alt="' . $result_ar["smiles"] .'" style="width:260px;height:255px;" /><br/>';?>
				    <?php echo '<b>'. $result_ar['smiles'] . '</b>'; ?>
				</div>
		  </div>
    </div>


</div>
