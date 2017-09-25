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

            function selectElementToSupport(){
              try {
                  $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                  $req = $db->query("SELECT idsupport,libsupport FROM support");
                  while ($donnee = $req->fetch()) {
                    ?><option value= <?php echo ($donnee['idsupport']);?> > <?php echo($donnee['libsupport']);?> </option>
                    <?php 
                  }
              } catch (Exception $e) {
                echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
              }
              $req->closeCursor();
            }

            private function selectElementToFormatCondition($key){
              try {
                    $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                    $req = $db->query("SELECT idformat,libformat FROM format WHERE idformat =".$key);
                    while ($donnee = $req->fetch()) {
                      ?>
                          <td id=<?php echo ($donnee['idformat']);?>><?php echo ($donnee['libformat']);?></td>
                      <?php 
                    }
                } catch (Exception $e) {
                    echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                }
                $req->closeCursor();
            }

            private function selectElementToEmplacementCondition($key){
              try {
                    $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                    $req = $db->query("SELECT idemplacement,libemplacement FROM format WHERE idemplacement =".$key);
                    while ($donnee = $req->fetch()) {
                      ?>
                          <td id=<?php echo ($donnee['idemplacement']);?>><?php echo ($donnee['libemplacement']);?></td>
                      <?php 
                    }
                } catch (Exception $e) {
                    echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                }
                $req->closeCursor();
            }

            private function selectSupportKeyIngriTarif(){
                //$tab = array();
                try {
                    $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');                    
                    $reqIdSupp = $db->query("SELECT idSupport FROM grilletarifaire");
                    while ($idsupp = $reqIdSupp->fetch()) {
                        $this->selectElementToSupportCondition($idsupp['idSupport']);
                    }
                } catch (Exception $e) {
                    echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                }
                $req->closeCursor();
                //var_dump($tab);
            }

            private function selectElementToSupportCondition($key){
              try {
                    $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                    $req = $db->query("SELECT idsupport,libsupport FROM support WHERE idsupport =".$key);
                    while ($donnee = $req->fetch()) {
                      ?>
                          <td id= <?php echo ($donnee['idsupport']);?> ><?php echo ($donnee['libsupport']);?></td>
                      <?php 
                    }
                } catch (Exception $e) {
                    echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                }
                $req->closeCursor();
            }

            function selectElementToLigneGri(){
              try{
                $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                $req = $db->query("SELECT support.libsupport, 
                                      emplacement.libemplacement, 
                                      format.libformat, 
                                      grilletarifaire.montantind
                  FROM `lignegrille`,support, emplacement, format, grilletarifaire
                  WHERE lignegrille.idgrilletarif=grilletarifaire.idgrilletarif
                  and lignegrille.idformat=format.idformat
                  and lignegrille.idemplacement=emplacement.idemplacement
                  and grilletarifaire.IdSupport=support.idsupport
                  ORDER by lignegrille.idgrille asc");
                while ($donnee = $req->fetch()) {
                        ?>
                        <tbody>
                          <tr>
                            <div id="etat">
                                <th scope="row">1</th>
                                <td><?php echo ($donnee['libsupport']);?></td>
                                <td><?php echo ($donnee['libemplacement']);?></td>
                                <td><?php echo ($donnee['libformat']);?></td>
                                <td><?php echo ($donnee['montantind']);?></td>
                                <td id="modif">Modifier</td>
                                <td id="delete">Supprimer</td>
                            </div>
                          </tr>
                        </tbody>
                    <?php 
                  }
              }catch(Exception $e){

              }
                $req->closeCursor();
            }
            
            function selectElementToFormat(){
              try {
                  $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                  $req = $db->query("SELECT idformat,libformat FROM format");
                  while ($donnee = $req->fetch()) {
                    ?><option value= <?php echo ($donnee['idformat']);?> > <?php echo($donnee['libformat']);?> </option>
                    <?php 
                  }
              } catch (Exception $e) {
                echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
              }
              $req->closeCursor();
            }



            function selectElementToEmplacement(){
              try {
                  $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                  $req = $db->query("SELECT idemplacement,libemplacement FROM emplacement");
                  while ($donnee = $req->fetch()) {
                    ?><option value= <?php echo ($donnee['idemplacement']);?> > <?php echo($donnee['libemplacement']);?> </option>
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
                                  //echo "Une erreur est survenue : " . $req->errorCode();
                                  // Mais en dev, pour comprendre, tu peux faire ça :
                                  print_r($req->errorInfo());
                                                      } 
                                          }
                                          catch (exception $e) {
                              echo "IMPOSSIBLE DE SE CONNECTER A LA Base de donnee";
                        }
                        return $db->lastInsertId();
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
                        return $db->lastInsertId();
            }


            // surcharge de fonction au cas ou il y'a surfacturation
            function insertionLignGri($idgrilletarif,$idformat,$idemplacement,$montant/*,$day*/)
            {
                  try {
                        $db = new PDO('mysql:host=localhost;dbname=pigepro','root','');
                        $req = $db->prepare('INSERT INTO lignegrille 
                        (idgrilletarif,idformat,idemplacement,prix) VALUES 
                        (:idgrilletarif,:idformat,:idemplacement,:montant)');
                                $result = $req->execute(array(
                                      'idgrilletarif' => $idgrilletarif,
                                      'idformat' => $idformat,
                                      'idemplacement' => $idemplacement,
                                      //'day' => $day,
                                      'montant' => $montant
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
      }

         ?>