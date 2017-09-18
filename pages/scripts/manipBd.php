        <?php 
          class database
          {
            
            function connection(){
              try {
                $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
              } catch (Exception $e) {
                echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
              }

            }

            // selection d'une bd
            function selectElementToMedia(){
              try {
                  $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                  $req = $db->query("SELECT idmedia,libmedia FROM media");
                  while ($donnee = $req->fetch()) {
                    ?><option value= <?php echo ($donnee['idmedia']);?> > <?php echo($donnee['libmedia']);?> </option>
                    <?php 
                  }
              } catch (Exception $e) {
                echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
              }
              $req->closeCursor();
            }


            function selectElementToSupportOfMedia($idmedia){
              try {
                  $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                  $req = $db->query("SELECT idsupport,libsupport FROM support WHERE idmedia = ".$idmedia);
                  while ($donnee = $req->fetch()) {
                    ?><option value= <?php echo ($donnee['idsupport']);?> > <?php echo($donnee['libsupport']);?> </option>
                    <?php 
                  }
              } catch (Exception $e) {
                echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
              }
              $req->closeCursor();
            }

            //  fonction au cas ou il n y'a pas surfacturation
            function insertionSimpleSansDateFin($libgrilletarif,$indice,$montantind,$cobplusprob,$cobunemarque,$cobplusmarque,$idsupport,$datedeb){
                  try {
                              $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                              $req = $db->prepare('INSERT INTO grilletarifaire 
                              (libgrilletarif,indice,montantind,cobplusprob,cobunemarque,cobplusmarque,idsupport,datedeb) VALUES 
                              (:libgrilletarif,:indice,:montantind,:cobplusprob,:cobunemarque,:cobplusmarque,:idsupport,:datedeb)');
                                      $result = $req->execute(array(
                                            'libgrilletarif' => $libgrilletarif,
                                            'indice' => $indice,
                                            'montantind' => $montantind,
                                            'cobplusprob' => $cobplusprob,
                                            'cobunemarque' => $cobunemarque,
                                            'cobplusmarque' => $cobplusmarque,
                                            'idsupport' => $idsupport,
                                            'datedeb' => $datedeb
                                        ));
                              if (!$result) {
                                  // ça t'affiche juste un code. C'est suffisant en prod pour que l'utilisateur te fasse un retour
                                  echo "Une erreur est survenue : " . $req->errorCode();
                                  // Mais en dev, pour comprendre, tu peux faire ça :
                                  print_r($req->errorInfo());
                                                      } 
                                          }
                                          catch (exception $e) {
                              echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                        }
            }


            function insertionSimpleAvecDateFin($libgrilletarif,$indice,$montantind,$cobplusprob,$cobunemarque,$cobplusmarque,$idsupport,$datedeb,$datefin){
                  try {
                              $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                              $req = $db->prepare('INSERT INTO grilletarifaire 
                              (libgrilletarif,indice,montantind,cobplusprob,cobunemarque,cobplusmarque,idsupport,datedeb,datefin) VALUES 
                              (:libgrilletarif,:indice,:montantind,:cobplusprob,:cobunemarque,:cobplusmarque,:idsupport,:datedeb,:datefin)');
                                      $result = $req->execute(array(
                                            'libgrilletarif' => $libgrilletarif,
                                            'indice' => $indice,
                                            'montantind' => $montantind,
                                            'cobplusprob' => $cobplusprob,
                                            'cobunemarque' => $cobunemarque,
                                            'cobplusmarque' => $cobplusmarque,
                                            'idsupport' => $idsupport,
                                            'datedeb' => $datedeb,
                                            'datefin' => $datefin
                                        ));
                              if (!$result) {
                                  // ça t'affiche juste un code. C'est suffisant en prod pour que l'utilisateur te fasse un retour
                                  echo "Une erreur est survenue : " . $req->errorCode();
                                  // Mais en dev, pour comprendre, tu peux faire ça :
                                  print_r($req->errorInfo());
                                                      } 
                                          }
                                          catch (exception $e) {
                              echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                        }
            }


            // surcharge de fonction au cas ou il y'a surfacturation
            function insertion($libgrilletarif,$indice,$montantind,$cobplusprob,$cobunemarque,$cobplusmarque,$idsupport,$datedeb,$datefin){
                  try {
                        $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                        $req = $db->prepare("insert into grilletarifaire ('libgrilletarif','indice','montantind','cobplusprob','cobunemarque','cobplusmarque','idsupport','datedeb','datefin')values($libgrilletarif,$indice,$montantind,$cobplusprob,$cobunemarque,$cobplusmarque,$idsupport,$datedeb,$datefin);");
                        $result = $db->exec($req);
                            if (!$result) {
        // ça t'affiche juste un code. C'est suffisant en prod pour que l'utilisateur te fasse un retour
                      echo "Une erreur est survenue : " . $req->errorCode();

                      // Mais en dev, pour comprendre, tu peux faire ça :
                      print_r($req->errorInfo());
                          }

                  } 
                  catch (PDOException $e) {
                        echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                  }
            }
            
      }

         ?>