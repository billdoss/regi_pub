      <div id="step-2">
                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Support : </label>
                          <h2 id="h2supp">{{}}</h2>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Grille tarifaire : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control col-md-7 col-xs-12" name="etats">
                                <option value="0">Choix de l'état</option>
                                <option value="1">Activé</option>
                                <option value="2">Caduque</option>
                                <option value="3">tout</option>                                  
                              </select>                              
                            </div>
                          </div>

                              <button type="submit"></button>
                          <script>
                            $('#h2supp').text().append($('#sel2'));
                          </script>
              
      </div>