<footer>
	<div class="footer-1">
		<div class="footer-1-1">
			<form action="" method="POST" class="form-message">
				@csrf
				<div class="div-h2">Envoyez nous un message</div>
				<input type="text" name="nom" placeholder="Nom" class="form-control">
				<input type="email" name="email" placeholder="Adresse email" class="form-control">
				<input type="tel" name="contact" placeholder="Contact" class="form-control">
				<textarea placeholder="Message" name="message" id="message" class="form-control"></textarea>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</form>
		</div>
		<div class="footer-1-2">
			<div class="div-h2">Contactez nous</div>
			<div class="div-h3">
				+243 <br>
				813 896 978 -
				897 283 842 - 
				999 999 885
			</div>
			<div class="div-h2">Réjoignez nous</div>
			<div class="social">
				<i class="fa fa-facebook blue-color"></i>
				<i class="fa fa-whatsapp green-color"></i>
				<i class="fa fa-twitter blue-color"></i>
				<i class="fa fa-instagram"></i>
			</div>
		</div>
	</div>
	<div class="footer-2">
        <p class="copyright">Copyright &copy;<a href="https://pronews-first.herokuapp.com"> Réalisé et maintenu par Dedy Akwety Desgo(Dad)</a></p>
	</div>
</footer>