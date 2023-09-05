<!-- Footer del sito Formula Rent -->
<footer>
    <!-- Sezione del contenuto del footer -->
    <div>
        <!-- Sezione del footer che identifica la prima riga contenente i loghi dei social -->
        <div class="rigafooter">
            <!-- Loghi social cliccabili Facebook, Instagram, Youtube, Twitter -->
            <a href="#" class="link_footer"><i class="fa fa-facebook"></i></a>
            <a href="#" class="link_footer"><i class="fa fa-instagram"></i></a>
            <a href="#" class="link_footer"><i class="fa fa-youtube"></i></a>
            <a href="#" class="link_footer"><i class="fa fa-twitter"></i></a>
        </div>

        <!-- Sezione del footer che ientifica la seconda riga contenente dei link ai contenuti del sito -->
        <div class="rigafooter">
            <!-- Lista di link ai contenuti della pagina auto noleggiabili, come noleggiare, contatti e privacy policy -->
            <ul class="listafooter">
                <li><a href="{{ url('/catalogoauto') }}" class="link_footer">Auto</a></li>
                <li><a href="{{ url('/comenoleggiare') }}" class="link_footer">Come noleggiare</a></li>
                <li><a href="{{ url('/chisiamo') }}" class="link_footer">Chi siamo</a></li>
                <li><a href="{{ url('/faq') }}" class="link_footer">F.A.Q.</a></li>
            </ul>
        </div>

        <!-- Sezione del footer che identifica la terza riga contenente autori e anno -->
        <div class="rigafoot">
            Copyright © 2023 UnivPM - Montagnoli Sara || Remedia Giada
        </div>
    </div>
</footer>
