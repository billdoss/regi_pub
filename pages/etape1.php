<br><br>
<br><br>
<div id="step-1">
                        <form class="form-horizontal form-label-left" method="post" action="variables.php">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Le Médias concerné : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-7 col-xs-12" name="medias" onchange="showUser(this.value)">
                                <option value="0">Choix du Média</option>
                                  <?php 
                                    $basedd = new database();
                                    $basedd->selectElementToMedia();
                                  ?>
                              </select>                              
                            </div>
                          </div>
                      

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 mov">Le Support concerné : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <select class="form-control col-md-8 col-xs-12" id="sel2" name="support">
                                <option value="0">Choix du Support</option>
                              </select>
                            </div>
                          </div>
                          <!--script de chargement interne-->
                          
<script>
  function showUser(str) {
      if (str == "0") {
          document.getElementById("sel2").innerHTML = "Choix du Support";
          return;
      } else { 
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("sel2").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","selectLier.php?q="+str,true);
          xmlhttp.send();
      }
  }
</script>
                          

<br><br>
<br><br>
                        <div class="form-group"><!--
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Support : </label>
                          <h2 id="h2supp">{{}}</h2>-->
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Grille tarifaire : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-7 col-xs-12" name="etats">
                                <option value="0">Choix de l'état</option>
                                <option value="Activé">Activé</option>
                                <option value="Caduque">Caduque</option>
                                <option value="tout">tout</option>                                  
                              </select>                              
                            </div>
                          </div>

  <br><br>

                          <div class="form-group">
                            <h2>Nomination Grille</h2><br>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Libellé : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="libeleGrille"/>                  
                            </div>
                          </div>

                          
                          <div class="form-group"><br>
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Désirez vous une grille indicé ?</label><br>
                            Oui:<input type="radio" class="flat" name="indicer" id="oui" value="oui"  checked="" required/> 
                            Non:<input type="radio" class="flat" name="indicer" id="non" value="non"/><br><br>
                          </div>


    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <script>
                                  
                                  //$("#non").click(function(){
                                    //  $(".cacher").hide();
                                  //});
                            </script>

                          <!--partie invisibl si non-->
                      <div class="cacher">
                          <div class="form-group" id="1">
                          <label class="control-label col-md-5 col-sm-5 col-xs-12">Prix de base :</label>
                            <input type="text" name="PrixBase" value="0"/> <br><br>
                          </div>

                          <h3>Conditions de surfacturation :</h3>
                          <div class="form-group">
                          <label class="control-label col-md-5 col-sm-5 col-xs-12"><li>Presence de plusieurs produits de la meme marque :</li></label>
                            <input type="text" name="Bcp_Prod_Mem_Mark" value="0"/> <br><br>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-5 col-sm-5 col-xs-12"><li>Presence de produits de marque differentes mais du meme annonceur :</li></label>
                            <input type="text" name="Prod_Mark_diff_mem_annonceur" value="0"/> <br><br>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-5 col-sm-5 col-xs-12"><li>Presence de marque différentes de plusieurs annonceurs :</li></label>
                            <input type="text" name="Prod_Mark_diff_bcp_annonceur" value="0"/> <br><br>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-5 col-sm-5 col-xs-12">Date de Début  :</label>
                            <input type="date" name="DateDeb" value="0"/> <br><br>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-5 col-sm-5 col-xs-12">Date de Fin  :</label>
                            <input type="date" name="DateFin" value="0"/> <br><br>
                          </div>
                      </div>
                          

                              <button type="submit">Valider</button>
		                     
                      </div>