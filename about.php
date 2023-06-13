<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 <style>
				.prof-card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		max-width: 300px;
		margin: auto;
		text-align: center;
		}

		.prof-title {
		color: grey;
		font-size: 18px;
		}

		.contact-button {
		border: none;
		outline: 0;
		display: inline-block;
		padding: 8px;
		color: white;
		background-color: #000;
		text-align: center;
		cursor: pointer;
		width: 100%;
		font-size: 18px;
		}

		.social-link {
		text-decoration: none;
		font-size: 22px;
		color: black;
		}

		.contact-button:hover, a:hover {
		opacity: 0.7;
		}
	 </style>
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
					<div class='col-sm-4'>
						<div class='box box-solid'>
							<div class='box-body prod-body'>
								<img src="./images/male3.jpg" alt="Dani" style="width:100%">
								<h3>Daniel Yetwale</h3>
							</div>
							<div class='box-footer'>
								<p>1311593</p>	
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='box box-solid'>
							<div class='box-body prod-body'>
								<img src="./images/Tibe.jpg" alt="Dani" style="width:100%">
								<h3>Tibebe Solomon</h3>
							</div>
							<div class='box-footer'>
								<p>1306941</p>	
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='box box-solid'>
							<div class='box-body prod-body'>
								<img src="./images/Wendimu.jpg" alt="Dani" style="width:100%">
								<h3>Wendimu Sitotaw</h3>
							</div>
							<div class='box-footer'>
								<p>1308027</p>	
							</div>
						</div>
					</div>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>