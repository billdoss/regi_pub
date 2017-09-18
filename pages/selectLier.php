  <?php 
    require "scripts/manipBd.php";
    $q = intval($_GET['q']);
    $basedd = new database();                                    
    $basedd->selectElementToSupportOfMedia($q);
  ?>