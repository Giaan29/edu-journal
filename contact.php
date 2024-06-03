<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="contact.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,800;1,900&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Contacts	</title>
</head>
<body>

    <header>
        <a href="index.php" class="logo">Edu-Journal</a>

        <ul class="nav-bar">
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="log-in.php">LOG-IN</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>
    </header>
    
	<div class="container">
		<main class="row">
			
			<section class="col left">

				<div class="contactTitle">
					<h2>Contact Us<h2>
					<p>Got questions or feedback? We're here to help! Use the form below to reach out. We'll get back to you ASAP. Thanks for connecting with us!</p>
				</div>

			

				<div class="contactInfo">
					
					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-phone"></i>
						</div>
						<div class="details">
							<span>Phone</span>
							<span>+09 123</span>
						</div>
					</div>

					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-envelope"></i>
						</div>
						<div class="details">
							<span>Email</span>
							<span>hilo@gmail.com</span>
						</div>
					</div>

					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-location-dot"></i>
						</div>
						<div class="details">
							<span>Location</span>
							<span>San Pabluy</span>
						</div>
					</div>

				</div>

				

				<div class="socialMedia">
					<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="#"><i class="fa-brands fa-twitter"></i></a>
					<a href="#"><i class="fa-brands fa-instagram"></i></a>
					<a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
				</div>

				
			</section>

			

			<section class="col right">
				
			

				<form class="messageForm" method="post" action="contacts.php">
					
					<div class="inputGroup halfWidth">
						<input type="text" name="cname" required="required">
						<label>Your Name</label>
					</div>

					<div class="inputGroup halfWidth">
						<input type="email" name="email" required="required">
						<label>Email</label>
					</div>

					<div class="inputGroup fullWidth">
						<input type="text" name="sub" required="required">
						<label>Subject</label>
					</div>

					<div class="inputGroup fullWidth">
						<textarea name="message" required="required"></textarea>
						<label>Say Something</label>
					</div>

					<div class="inputGroup fullWidth">
						<button>Send Message</button>
					</div>

				</form>

				
			</section>

			

		</main>
	</div>
</body>
</html>