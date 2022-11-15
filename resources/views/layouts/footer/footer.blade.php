<footer class="footer">
    <div class="footer-1">
        <div class="div-1">
        	<h3>Envoyez nous un message</h3>
        	<form action="{{ route('store_message') }}" method="POST" class="form">
        		@csrf
        		@guest
        		<input type="text" name="nom" class="input" placeholder="Nom" required>
        		<input type="number" name="contact" class="input" placeholder="Contact" required>
                <input type="email" name="email" class="input" placeholder="Email" required>
        		@endguest
        		<textarea name="message" class="message" placeholder="Votre message" required></textarea>
        		<button type="submit" class="boutton-footer">Envoyez</button>
        	</form>
        </div>
        <div class="div-2">
            <h3>Joignez nous par:</h3>
            <div class="div-2-2">
                <div class="rx">
                    <div class="rx-1">
                        <a href="https://www.facebook.com/profile.php?id=100086428621447" class="fa fa-facebook" id="facebook"></a>
                    </div>
                    <div class="rx-2">
                        somba na ndaku
                    </div>
                </div>
                </a>
                <div class="rx">
                    <div class="rx-1">
                        <a href="#" class="fa fa-twitter" id="twitter"></a>
                    </div>
                    <div class="rx-2">
                        @somba na ndaku
                    </div>
                </div>
                <div class="rx">
                    <div class="rx-1">
                        <a href="#" class="fa fa-instagram" id="instagram"></a>
                    </div>
                    <div class="rx-2">
                        somba na ndaku
                    </div>
                </div>
                <div class="rx">
                    <div class="rx-1">
                        <a href="#" class="fa fa-whatsapp" id="whatsapp"></a>
                    </div>
                    <div class="rx-2">
                        +243 897 283 842
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-2">
        <a href="http://copyright.be" target="_blank" id="copy">Copyright © 2022 Maintenu et réaliser par Dedy Akwety</a>
    </div>
</footer>