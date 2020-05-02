<!doctype html>
<html lang="en">

  	<?php
		include('include/head.php');
	?>

	<body>
		<?php
		include('include/menu.php');
		?>
	
		<!-- Alert -->
		<div class="alert">
				<span class="a">
				<div class="sepleft">
					<?php while($alert = $comp2->fetch()) { ?>
					<?php
						$idcompoAlert = $alert['id'];
						if($alert['action1state'] == 1){
							$sql = "UPDATE component SET action1state = 0 WHERE id = $idcompoAlert";
							if(mysqli_query($db, $sql)){
								?>
								<div class="alert alert-success alert-dismissible" role="alert">
									<strong>Action <?php echo $alert['nameAction1'] ?> has been launch!</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php
							}
						}
						if($alert['action2state'] == 1){
							$sql = "UPDATE component SET action2state = 0 WHERE id = $idcompoAlert";
							if(mysqli_query($db, $sql)){
								?>
								<div class="alert alert-success alert-dismissible">
									<strong>Action <?php echo $alert['nameAction2'] ?> has been launch!</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php
							}
						}
						if($alert['action3state'] == 1){
							$sql = "UPDATE component SET action3state = 0 WHERE id = $idcompoAlert";
							if(mysqli_query($db, $sql)){
								?>
								<div class="alert alert-success alert-dismissible">
									<strong>Action <?php echo $alert['nameAction3'] ?> has been launch!</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php
							}
						}
						if($alert['action4state'] == 1){
							$sql = "UPDATE component SET action4state = 0 WHERE id = $idcompoAlert";
							if(mysqli_query($db, $sql)){
								?>
								<div class="alert alert-success alert-dismissible">
									<strong>Action <?php echo $alert['nameAction4'] ?> has been launch!</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php
							}
						}
						
					?>
					<?php } ?>
				</div>
			</span>
		</div>

		
		<?php
			session_start();
			error_reporting(0);
			if($_SESSION['username'] == ""){
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
						<label for="ip">Name : </label><br>
						<input type="text" name="name" id="name">
					</p>
					<label for="ip">type : </label><br>
					<select name="type" class="form-control">
						<option>Lightbulb</option>
						<option>Outlet</option>
						<option>Other</option>
					</select><br>
					
					<p>
						<label for="ip">Action 1 name : </label><br>
						<input type="text" name="action1" id="action1"><br>
						<label for="ip">Action 1 IFTTT Link : </label><br>
						<input type="text" name="linkcp" id="linkcp"><br>
					</p>
					<p>
						<label for="ip">Action 2 name : </label><br>
						<input type="text" name="action2" id="action2"><br>
						<label for="ip">Action 3 IFTTT Link : </label><br>
						<input type="text" name="linkcp2" id="linkcp2"><br>
					</p>
					<p>
						<label for="ip">Action 3 name : </label><br>
						<input type="text" name="action3" id="action3"><br>
						<label for="ip">Action 3 IFTTT Link : </label><br>
						<input type="text" name="linkcp3" id="linkcp3"><br>
					</p>
					<p>
						<label for="ip">Action 4 name : </label><br>
						<input type="text" name="action4" id="action4"><br>
						<label for="ip">Action 4 IFTTT Link : </label><br>
						<input type="text" name="linkcp4" id="linkcp4"><br>
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
	</br>

		<!-- pc list -->
		
			<span class="a">
				<div class="sepleft">
<div id="accordion" style="margin: 0px 0 15px 0;">
	<div class="card">
		<div class="card-header" id="headingOne">
			<h5 class="mb-0">
				<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					Computer
				</button>
			</h5>
		</div>
		<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
			<div class="card-body">

					<?php while($a = $pc->fetch()) { ?>
					<div class="centre">
						<div class="card" style="width: 18rem;">
							<br>
							<i class="fas fa-desktop fa-7x"></i>
							<div class="card-body">
								<h5 class="card-title"><?php echo $a['name'] ?></h5>
								<p class="card-text"><?php echo $a['ip'] ?></p>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
								  </button>
								  <div class="dropdown-menu">
									<a class="dropdown-item" href="wol.php?mac=<?php echo $a['ip'] ?>">Turn On</a>
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
					<div class="centre">
						<div class="add">
							<div class="card" style="width: 18rem;">
								<br>
								<a data-toggle="modal" data-toggle="modal" data-target="#exampleModal">
									<i class="fas fa-plus fa-7x" style="opacity: 0.50;padding:51px;"></i>
								</a>
								<div class="card-body">
									<h5 class="card-title"></h5>
									<p class="card-text"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</span>
			
			</div>
		</div>
	</div>
</div>
		
			<!-- Component -->
			<span class="a">
				<div class="sepleft">

				<div id="accordion2" style="margin: 0px 0 15px 0;">
	<div class="card">
		<div class="card-header" id="headingTwo">
			<h5 class="mb-0">
				<button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					Component
				</button>
			</h5>
		</div>
		<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion2">
			<div class="card-body">
					<?php while($b = $comp->fetch()) { ?>
					<div class="centre">
						<div class="card" style="width: 18rem;">
							<br>
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
									<a class="dropdown-item" href="ifttt.php?link=<?php echo $b['link'] ?>&id=<?php echo $b['id'] ?>&action=1"><?php echo $b['nameAction1'] ?></a>
									<?php } ?>
									<!-- link2 -->
									<?php  if($b['nameAction2'] != ''){ ?>
									<a class="dropdown-item" href="ifttt.php?link=<?php echo $b['link2'] ?>&id=<?php echo $b['id'] ?>&action=2"><?php echo $b['nameAction2'] ?></a>
									<?php } ?>
									<!-- link3 -->
									<?php  if($b['nameAction3'] != ''){ ?>
									<a class="dropdown-item" href="ifttt.php?link=<?php echo $b['link3'] ?>&id=<?php echo $b['id'] ?>&action=3"><?php echo $b['nameAction3'] ?></a>
									<?php } ?>
									<!-- link4 -->
									<?php  if($b['nameAction4'] != ''){ ?>
									<a class="dropdown-item" href="ifttt.php?link=<?php echo $b['link4'] ?>&id=<?php echo $b['id'] ?>&action=4"><?php echo $b['nameAction4'] ?></a>
									<?php } ?>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="removeComponent.php?rm=<?php echo $b['id'] ?>">Remove <?php echo $b['name'] ?></a>
								  </div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="centre">
						<div class="add">
							<div class="card" style="width: 18rem;">
								<br>
								<a data-toggle="modal" data-target="#moddalComponent">
									<i class="fas fa-plus fa-7x" style="opacity: 0.50;padding:51px;"></i>
								</a>
								<div class="card-body">
									<h5 class="card-title"></h5>
									<p class="card-text"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</span>
		</div>
	</div>
    <!-- Optional JavaScript -->
	<Script>
	// utility function returning a random item from the input array
const randomItem = arr => arr[Math.floor(Math.random() * arr.length)];

// possible values for the message title and modifier
const messageTitle = [
  'info',
  'success',
  'warning',
  'danger',
];

// possible values for the body of the message
// end result of the emmet shortcut p*10>lorem10
const messageText = [
  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, quaerat.',
  'Ab asperiores inventore tempora maiores, est et magni harum maxime?',
  'Laboriosam, vel maxime. Doloremque saepe aut quis mollitia corporis illo?',
  'Cum eum magnam facere commodi quae voluptate suscipit doloribus architecto?',
  'Ipsa veniam tempora necessitatibus corporis voluptate nobis, ut quam magni.',
  'Veritatis obcaecati non dolorum vero? Ipsam aperiam optio sint dicta.',
  'Itaque quod amet a. Voluptate nostrum temporibus ipsa explicabo exercitationem.',
  'Quasi veritatis inventore mollitia ipsum, aut voluptatibus suscipit a labore.',
  'Iusto alias eius quae ducimus quibusdam veniam sint soluta nam!',
  'Corrupti temporibus sequi laboriosam alias magni? Nam consectetur amet odit!'
];

/* logic
- create a message
- show the message
- allow to dismiss the message through the dismiss button

once the message is dismissed the idea is to go through the loop one more time, with a different title and text values
*/
const notification = document.querySelector('.notification');

// function called when the button to dismiss the message is clicked
function dismissMessage() {
  // remove the .received class from the .notification widget
  notification.classList.remove('received');

  // call the generateMessage function to show another message after a brief delay
  generateMessage();
}

// function showing the message
function showMessage() {
  // add a class of .received to the .notification container
  notification.classList.add('received');

  // attach an event listener on the button to dismiss the message
  // include the once flag to have the button register the click only one time
  const button = document.querySelector('.notification__message button');
  button.addEventListener('click', dismissMessage, { once: true });
}

// function generating a message with a random title and text
function generateMessage() {
  // after an arbitrary and brief delay create the message and call the function to show the element
  const delay = Math.floor(Math.random() * 1000) + 1500;
  const timeoutID = setTimeout(() => {
    // retrieve a random value from the two arrays
    const title = randomItem(messageTitle);
    const text = randomItem(messageText);

    // update the message with the random values and changing the class name to the title's option
    const message = document.querySelector('.notification__message');

    message.querySelector('h1').textContent = title;
    message.querySelector('p').textContent = text;
    message.className = `notification__message message--${title}`;

    // call the function to show the message
    showMessage();
    clearTimeout(timeoutID);
  }, delay);
}

// immediately call the generateMessage function to kickstart the loop
generateMessage();
</Script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>