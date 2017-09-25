<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Régie publicitaire! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Regie publicitaire</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                 
                  <li><a><i class="fa fa-edit"></i> Modification <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">test</a></li>
                      <li><a href="#">test</a></li>
                      <li><a href="#">test</a></li>
                    </ul>
                  </li>
                
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <br />

           

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              
            </div>
          </nav>
        </div>
        <div class="navbar navbar-right">
            <a id="lien" class="btn " href="index1.php">Support</a>
              <a id="lien" class="btn " href="pagelignegrille.php">les lignes de la grille </a>
              <a id="lien" class="btn " href="">Support</a>
              <a id="lien" class="btn " href="">Médias</a> </div>
      </div>
        <!-- /top navigation -->
        <?php 
          require "scripts/manipBd.php";
         ?>
        <!-- page content -->
        <div class="right_col" role="main" style="heigth:900px;">
          <div class="">
            

             <div class="row" >

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h2>Ajout d'une nouvelle grille tarifaire</h2>
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


                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Step 1 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Step 2 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Step 3 description</small>
                                          </span>
                          </a>
                        </li>                        
                      </ul>
                  <form class="form-horizontal form-label-left" id="valider" method="post" action="variables.php">
                          
                    <div id="step-1">
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

                    <div id="step-2" heigth="900px">
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
                    </div>
                          <!--partie invisibl si non-->
                    <div id="step-4" heigth="900px">
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
                      </div>  
                    </div>  
                  </form>
                      
                        </div>

                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
                            function submitForm(){
                                $('#valider').submit();
                            }
                        </script>

                    </div>
      
 </div>                   <!-- End SmartWizard Content -->

                       

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <script src="../vendors/moment/moment.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="../build/js/custom.js"></script>
    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	
  </body>
</html>