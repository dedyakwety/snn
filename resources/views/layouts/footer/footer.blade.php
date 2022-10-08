<footer class="footer">
	<!--div class="padding">
        <div class="main">
            <div class="container_12">
                <div class="wrapper">
                    <article class="article-1">
                        <h4>Envoyez nous un message</h4>
                        <form id="contact-form" method="post">
                            <fieldset>
                                <label><input name="email" value="Email" onBlur="if(this.value=='') this.value='Email'" onFocus="if(this.value =='Email' ) this.value=''" /></label>
                                <label><input name="subject" value="Subject" onBlur="if(this.value=='') this.value='Subject'" onFocus="if(this.value =='Subject' ) this.value=''" /></label>
                                <textarea onBlur="if(this.value=='') this.value='Message'" onFocus="if(this.value =='Message' ) this.value=''">Message</textarea>
                                <div class="buttons">
                                    <a href="#" onClick="document.getElementById('contact-form').reset()">Effacer tout</a>
                                    <a href="#" onClick="document.getElementById('contact-form').submit()">Envoyer</a>
                                </div>											
                            </fieldset>           
                        </form>
                    </article>
                    <article class="article-2">
                    	<h4 class="indent-bot">Contactez et rejoignez nous</h4>
                        <ul class="list-services border-bot img-indent-bot">
                        	<li><a href="#">Facebook</a></li>
                            <li><a class="item-1" href="#">Twitter</a></li>
                            <li><a class="item-2" href="#">Picassa</a></li>
                            <li><a class="item-3" href="#">You Tube</a></li>
                        </ul>
                        <p class="p1">Consulting.com &copy; 2011 </p>
                        <p class="p1">Website Template by <a class="link" target="_blank" href="http://store.templatemonster.com?aff=netsib1" rel="nofollow">TemplateMonster.com</a></p>
                       
                    </article>
                </div>
            </div>
        </div>
    </div-->
    <div class="footer-1">
        <div class="div-1">
        	<h3>Envoyez nous un message</h3>
        	<form action="" method="" class="form">
        		@csrf
        		@guest
        		<input type="text" name="nom" class="input" placeholder="Nom">
        		<input type="number" name="contact" class="input" placeholder="Contact">
        		@endguest
        		<textarea name="message" class="message" placeholder="Votre message"></textarea>
        		<button type="submit" class="boutton-footer">Envoyez</button>
        	</form>
        </div>
        <div class="div-2">
            <div class="div-2-2">
                <div class="rx">
                    <div class="rx-1">
                        <a href="#" class="fa fa-facebook"></a>
                    </div>
                    <div class="rx-2">
                        somba na ndaku
                    </div>
                </div>
                </a>
                <div class="rx">
                    <div class="rx-1">
                        <a href="#" class="fa fa-twitter"></a>
                    </div>
                    <div class="rx-2">
                        @somba na ndaku
                    </div>
                </div>
                <div class="rx">
                    <div class="rx-1">
                        <a href="#" class="fa fa-instagram"></a>
                    </div>
                    <div class="rx-2">
                        somba na ndaku
                    </div>
                </div>
                <div class="rx">
                    <div class="rx-1">
                        <a href="#" class="fa fa-whatsapp"></a>
                    </div>
                    <div class="rx-2">
                        +243 897 283 842
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-2">
        <a href="http://copyright.be" target="_blank" id="copy">Copyright © 2022 somba-na-ndaku.com - Tous droits réservés</a>
    </div>
</footer>