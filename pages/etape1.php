<div id="wizard" class="form_wizard wizard_horizontal">
                      
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
 </div>      
 <div id="step-2">
                          <div class="form-group">
                            <h2>Nomination Grille</h2><br>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Libellé : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12" name="libeleGrille"/>                  
                            </div>
                          </div>

                          
                          <div class="form-group"><br><br><br>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Désirez vous une grille indicé ?</label><br>
                            Oui  :<input type="radio" class="flat" name="indicer" id="oui" value="oui"/> 
                            Non  :<input type="radio" class="flat" name="indicer" id="non" value="non"/><br>
                          </div>                   
                        
                          <!--partie invisibl si non-->
                      <div >
                      <section class="cacher">
                          <div class="form-group" id="1">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" id="textprix">Prix de base :</label>
                            <input type="text" name="PrixBase" id="saisipri" value="0"/> <br><br>
                          </div>
                        
                          <h3 id="textcondition">Conditions de surfacturation :</h3>
                            <p style="padding: 5px;" id="blockcondition">

                              <input type="checkbox" name="Bcp_Prod_Mem_Mark" value="1" class="flat" /> Presence de plusieurs produits de la meme marque
                              <br />

                              <input type="checkbox" name="Prod_Mark_Diff_Mem_Annonceur" value="1" class="flat" /> Presence de produits de marque differentes mais du meme annonceur
                              <br />

                              <input type="checkbox" name="Prod_Mark_Diff_Bcp_Annonceur" value="1" class="flat" /> Presence de marque différentes de plusieurs annonceurs
                              <br />
                            <p>
                      </section>
                          

                        <script src="../vendors/jquery/dist/jquery.min.js"></script>         
                        <script>
                            $(".cacher").hide();
                            $("#non").click(function(){
                              $(".cacher").hide();
                            });
                            $("#oui").click(function(){
                              $(".cacher").show();
                            });
                            
                        </script>


                        <div class="container">
                            <div class='col-md-5'>
                                <div class="form-group">
                                    Date De Début
                                    <div class='input-group date' id='datetimepicker6'>
                                        <input type='text' class="form-control" name="DateDeb"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-5'>
                                <div class="form-group">
                                    Date De Fin
                                    <div class='input-group date' id='datetimepicker7'>
                                        <input type='text' class="form-control" name="DateFin" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- jQuery -->
                        <script src="../vendors/jquery/dist/jquery.min.js"></script>
                        <script type="text/javascript">
                            $(function () {
                                //$('#datetimepicker6').datetimepicker();
                                $('#datetimepicker6').datetimepicker({
                                    format: 'YYYY/MM/DD'
                                });
                                $('#datetimepicker7').datetimepicker({
                                    format: 'YYYY/MM/DD'
                                });
                                $('#datetimepicker7').datetimepicker({
                                    useCurrent: false //Important! See issue #1075
                                });
                                $("#datetimepicker6").on("dp.change", function (e) {
                                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                                });
                            });
                        </script>
                          
                        
 </div>                   

                          
                      </div>
                          <button type="submit">Valider</button>
                      </div>


                      