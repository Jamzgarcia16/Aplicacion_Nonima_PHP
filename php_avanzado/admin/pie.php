<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span><?php echo AUTOR; ?> <br><?php echo EMPRESA; ?></span><hr>
      <!-- Codigo para enviar mensaje atravez de Whats app al numero de la negra! -->
      <div class="ccw_plugin chatbot" style="bottom:10px; right:10px;">
        <!-- style 4   chip - logo+text -->
        <div class="style4 animated no-animation ccw-no-hover-an">
          <?php
          $men_wp = "https://web.whatsapp.com/send?phone=573124554800&text=Hola,negra estoy haciendo una prueba para mi pagina de arreglo de computadores.";
          $face = "https://www.facebook.com/JamzGarciaPCS";
          $youtube = "https://www.youtube.com/watch?v=-ez5xl6VoGM&t=1696s";
          $linkedin = "https://co.linkedin.com/";
          $twiter = "https://twitter.com/";
          $instagram = "https://www.instagram.com/?hl=es-la";

          #Mientras $men_wp este encryptado no se va a enviar el mensaje de whats app, es una forma de ocultarlo pero no se deja enviar encryptado toca mostrarlo en la URL 
          #$men_wp   = crypt('https://web.whatsapp.com/send?phone=573124554800&text=Hola,negra estoy haciendo una prueba para mi pagina de arreglo de computadores.', '$2a$07$usesomesillystringforsalt$');
          $correcto   = crypt('https://web.whatsapp.com/send?phone=573124554800&text=Hola,negra estoy haciendo una prueba para mi pagina de arreglo de computadores.', '$2a$07$usesomesillystringforsalt$');
          $incorrecto = crypt('apple',  '$2a$07$usesomesillystringforsalt$');
          #str_rot13($men_wp);
          #var_dump($men_wp);

          #var_dump(hash_equals($men_wp, $correcto));
          #var_dump(hash_equals($men_wp, $incorrecto));

          ?>
                <a target="_blank" href="<?php echo $men_wp ?>" class="nofocus">
                   <!-- <h6><?php #echo $men_wp;  ?></h6>  --><!-- se debe descomentarear el html y el #echo, se hace este comentario para idicar que esta linea de codigo es solo para depurar  -->
                    <div class="chip " id="style-4" data-ccw="style-4" style="color: #0a0a0a; background-color: #FFFFFF; text-align: right; float: right;" >
                        <!-- <img class="" id="s4-icon" data-ccw="style-4" src="https://demo.webconjuntoresidencial.com/wp-content/plugins/click-to-chat-for-whatsapp/./assets/img/whatsapp-logo.png" alt="Contact Person"> losers!! xD -->
                        <br>
                        <img class="" id="s4-icon" data-ccw="style-4" src="https://demo.webconjuntoresidencial.com/wp-content/plugins/click-to-chat-for-whatsapp/./assets/img/whatsapp-logo.png" alt="Contact Person"  width="50" height="50"></div>  
                </a>
                <a target="_blank" href="<?php echo $face ?>" class="nofocus">
                   <!-- <h6><?php #echo $men_wp;  ?></h6>  --><!-- se debe descomentarear el html y el #echo, se hace este comentario para idicar que esta linea de codigo es solo para depurar  -->
                    <div class="chip " id="style-4" data-ccw="style-4" style="color: #0a0a0a; background-color: #FFFFFF; text-align: right;
                    float: right;" >
                        <!-- <img class="" id="s4-icon" data-ccw="style-4" src="https://demo.webconjuntoresidencial.com/wp-content/plugins/click-to-chat-for-whatsapp/./assets/img/whatsapp-logo.png" alt="Contact Person"> losers!! xD -->
                        <br>
                        <img class="" id="s4-icon" data-ccw="style-4" src="../fotos/face-logo.png" alt="Facebook"  width="50" height="50"></div>  
                </a>
                <a target="_blank" href="<?php echo $youtube ?>" class="nofocus">
                    <div class="chip " id="style-4" data-ccw="style-4" style="color: #0a0a0a; background-color: #FFFFFF; text-align: right;
                     float: right;" >
                        <!-- <img class="" id="s4-icon" data-ccw="style-4" src="https://demo.webconjuntoresidencial.com/wp-content/plugins/click-to-chat-for-whatsapp/./assets/img/whatsapp-logo.png" alt="Contact Person"> losers!! xD -->
                        <br>
                        <img class="" id="s4-icon" data-ccw="style-4" src="../fotos/youtube-logo.png" alt="Youtube"  width="50" height="50"></div>  
                </a>
                <a target="_blank" href="<?php echo $linkedin ?>" class="nofocus">
                    <div class="chip " id="style-4" data-ccw="style-4" style="color: #0a0a0a; background-color: #FFFFFF; text-align: right;
                    float: right;" >
                        <!-- <img class="" id="s4-icon" data-ccw="style-4" src="https://demo.webconjuntoresidencial.com/wp-content/plugins/click-to-chat-for-whatsapp/./assets/img/whatsapp-logo.png" alt="Contact Person"> losers!! xD -->
                        <br>
                        <img class="" id="s4-icon" data-ccw="style-4" src="../fotos/linkedin-logo.png" alt="linkedin"  width="50" height="50"></div>  
                </a>
                <a target="_blank" href="<?php echo $twiter ?>" class="nofocus">
                    <div class="chip " id="style-4" data-ccw="style-4" style="color: #0a0a0a; background-color: #FFFFFF; text-align: right;float: right;" >
                        <!-- <img class="" id="s4-icon" data-ccw="style-4" src="https://demo.webconjuntoresidencial.com/wp-content/plugins/click-to-chat-for-whatsapp/./assets/img/whatsapp-logo.png" alt="Contact Person"> losers!! xD -->
                        <br>
                        <img class="" id="s4-icon" data-ccw="style-4" src="../fotos/twiter-logo.png" alt="twiter"  width="50" height="50"></div>  
                </a>

                <a target="_blank" href="<?php echo $instagram ?>" class="nofocus">
                    <div class="chip " id="style-4" data-ccw="style-4" style="color: #0a0a0a; background-color: #FFFFFF; text-align: right;  " >
                        <!-- <img class="" id="s4-icon" data-ccw="style-4" src="https://demo.webconjuntoresidencial.com/wp-content/plugins/click-to-chat-for-whatsapp/./assets/img/whatsapp-logo.png" alt="Contact Person"> losers!! xD -->
                        <br>
                        <img class="" id="s4-icon" data-ccw="style-4" src="../fotos/instagram-logo.png" alt="instagram"  width="50" height="50"></div>  
                </a>

        </div>
      </div>
    </div>
  </div>
</footer>