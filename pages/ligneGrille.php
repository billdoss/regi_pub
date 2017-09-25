<?php 
          
          require "scripts/manipBd.php";
         
         ?>




<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br><br>
              <div class="title_center">
                <h3>Les lignes de la grille</h3>
              </div>

            </div>
<br><br><br>
            <div class="clearfix"></div>
            <div class="row" id="show">
              <div class="col-md-6 col-sm-6 col-xs-6" id="modif">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Modification <small>de ligne</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form class="form-horizontal form-label-left" method="post" action="varligne.php">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Support : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-7 col-xs-12" name="support">
                                <option value="0">Choix du Support</option>
                                  <?php 
                                    $basedd = new database();
                                    $basedd->selectElementToSupport();
                                  ?>
                              </select>                              
                            </div>
                          </div>
                          

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 mov">Format : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <select class="form-control col-md-8 col-xs-12" id="sel2" name="format">
                                <option value="0">Choix du Format</option>
                                <?php 
                                    $basedd = new database();
                                    $basedd->selectElementToFormat();
                                  ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 mov">Emplacement : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <select class="form-control col-md-8 col-xs-12" id="sel2" name="emplacement">
                                <option value="0">Choix du Emplacement</option>
                                <?php 
                                    $basedd = new database();
                                    $basedd->selectElementToEmplacement();
                                  ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12 mov">Montant / Indice : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <input type="text" name="montant_ind">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <button type="submit">valider</button>
                            </div>
                          </div>
                  </form>
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
                </div>
              </div>


            </div>
            <div class="container">
              <div class="row">
              <div class="col-md-7 col-sm-7 col-xs-7">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>les lignes <small>grilles</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Support</th>
                          <th>Emplacement</th>
                          <!--<th>Format</th>-->
                          <th>Montant / Indice</th>
                          <th>Modification</th>
                          <th>Suppression</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <?php 
                              $base = new database();
                              $base->selectElementToLigneGri();
                              ?>
                        </tr>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


            </div>
            </div>
            
          </div>
        </div>
        <!-- /page content -->
          <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <script>
          //$("#modif").hide();
          //$("#mofif").click(function(){
            //$("#show").show();
          //});
          

        </script>