<!doctype html>
<html lang="en">

  	<?php
		include('include/head.php');
	?>

	<body>
		<?php
		include('include/menu.php');
		?>
	
		<!-- Button trigger modal -->
		</br>
		<button type="button" class="btn btn-primary sepleft" data-toggle="modal" data-target="#exampleModal">
		Add Computer
		</button>
				<button type="button" class="btn btn-primary sepleft" data-toggle="modal" data-target="#moddalComponent">
		Add Component
		</button>
		
		<?php
			if($_SESSION['username'] !== ""){
				header("location:index.php");
			}
		?>

	<!-- Modal -->

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Computer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				
				<!-- Add computer form -->
				
				<form action="addcomputer.php" method="post">
					<p>
						<label for="ip">@Mac : </label>
						<input type="text" name="ip" id="ip">
					</p>
					<p>
						<label for="ip">Name : </label>
						<input type="text" name="name" id="name">
					</p>
				
				</div>
			  <div class="modal-footer">
				<input class="btn btn-primary" type="submit" value="Submit" >
				</form>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
	</br></br>
	
	
		<div class="modal fade" id="moddalComponent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Component</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				
				<!-- Add component form -->
				
				<form action="addcomponent.php" method="post">
					<p>
						<label for="ip">Name : </label><br />
						<input type="text" name="name" id="name">
					</p>
					<label for="ip">type : </label><br />
					<select name="type" class="form-control">
						<option>Lightbulb</option>
						<option>Outlet</option>
						<option>Other</option>
					</select><br />
					
					<p>
						<label for="ip">Action 1 name : </label><br />
						<input type="text" name="action1" id="action1"><br />
						<label for="ip">Action 1 IFTTT Link : </label><br />
						<input type="text" name="linkcp" id="linkcp"><br />
					</p>
					<p>
						<label for="ip">Action 2 name : </label><br />
						<input type="text" name="action2" id="action2"><br />
						<label for="ip">Action 3 IFTTT Link : </label><br />
						<input type="text" name="linkcp2" id="linkcp2"><br />
					</p>
					<p>
						<label for="ip">Action 3 name : </label><br />
						<input type="text" name="action3" id="action3"><br />
						<label for="ip">Action 3 IFTTT Link : </label><br />
						<input type="text" name="linkcp3" id="linkcp3"><br />
					</p>
					<p>
						<label for="ip">Action 4 name : </label><br />
						<input type="text" name="action4" id="action4"><br />
						<label for="ip">Action 4 IFTTT Link : </label><br />
						<input type="text" name="linkcp4" id="linkcp4"><br />
					</p>
					
				
				</div>
			  <div class="modal-footer">
				<input class="btn btn-primary" type="submit" value="Submit" >
				</form>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>		
	</br></br>
	
	

		<!-- pc list -->
		
			<span class="a"></br>
				<div class="sepleft">
					<?php while($a = $pc->fetch()) { ?>
					<div class="centre">
						<div class="card" style="width: 18rem;">
							<br />
							<i class="fas fa-desktop fa-7x"></i>
							<!--<img src="images/pc.png" class="card-img-top" alt="">-->
							<div class="card-body">
								<h5 class="card-title"><?php echo $a['name'] ?></h5>
								<p class="card-text"><?php echo $a['ip'] ?></p>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
								  </button>
								  <div class="dropdown-menu">
									<a class="dropdown-item" href="#">Turn On</a>
									<a class="dropdown-item" href="#">Turn Off</a>
									<a class="dropdown-item" href="#">ETA</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="removeComputer.php?rm=<?php echo $a['id'] ?>">Remove <?php echo $a['name'] ?></a>
									
								  </div>
								</div>
							</div>
						</div>			
					</div>
					<?php } ?>
				</div>
			</span>
			
			<!-- Component -->
			
			<span class="a"></br>
				<div class="sepleft">
					<?php while($b = $comp->fetch()) { ?>
					<div class="centre">
						<div class="card" style="width: 18rem;">
							<br />
							<?php 
							switch ($b['type']) {
								case 'Lightbulb':
									?><i class="fas fa-lightbulb fa-7x"></i><?php
									break;
								case 'Outlet':
									 ?><i class="fas fa-plug fa-7x"></i><?php
									break;
								case 'Other':
									?><i class="fas fa-network-wired fa-7x"></i><?php
									break;
							}
							?>
							<!--<img src="images/pc.png" class="card-img-top" alt="">-->
							<div class="card-body">
								<h5 class="card-title"><?php echo $b['name'] ?></h5>
								<p class="card-text"><?php echo $b['type'] ?></p>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
								  </button>
								  <div class="dropdown-menu">
									<!-- link1 -->
									<?php  if($b['nameAction1'] != ''){ ?>
									<a class="dropdown-item" href="
										<?php
										$curl = curl_init();
										curl_setopt($curl, CURLOPT_URL, $b['link']);
										curl_setopt($curl, CURLOPT_COOKIESESSION, true);
										curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
										$return = curl_exec($curl);
										curl_close($curl);
										?>
									"><?php echo $b['nameAction1'] ?></a>
									<?php } ?>
									<!-- link2 -->
									<?php  if($b['nameAction2'] != ''){ ?>
									<a class="dropdown-item" href="
										<?php
										$curl = curl_init();
										curl_setopt($curl, CURLOPT_URL, $b['link2']);
										curl_setopt($curl, CURLOPT_COOKIESESSION, true);
										curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
										$return = curl_exec($curl);
										curl_close($curl);
										?>
									"><?php echo $b['nameAction2'] ?></a>
									<?php } ?>
									<!-- link3 -->
									<?php  if($b['nameAction3'] != ''){ ?>
									<a class="dropdown-item" href="
										<?php
										$curl = curl_init();
										curl_setopt($curl, CURLOPT_URL, $b['link3']);
										curl_setopt($curl, CURLOPT_COOKIESESSION, true);
										curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
										$return = curl_exec($curl);
										curl_close($curl);
										?>
									"><?php echo $b['nameAction3'] ?></a>
									<?php } ?>
									<!-- link4 -->
									<?php  if($b['nameAction4'] != ''){ ?>
									<a class="dropdown-item" href="
										<?php
										$curl = curl_init();
										curl_setopt($curl, CURLOPT_URL, $b['link4']);
										curl_setopt($curl, CURLOPT_COOKIESESSION, true);
										curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
										$return = curl_exec($curl);
										curl_close($curl);
										?>
									"><?php echo $b['nameAction4'] ?></a>
									<?php } ?>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="removeComponent.php?rm=<?php echo $b['id'] ?>">Remove <?php echo $b['name'] ?></a>
									
								  </div>
								</div>
							</div>
						</div>			
					</div>
					<?php } ?>
				</div>
			</span>
	
    <!-- Optional JavaScript -->
	
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>