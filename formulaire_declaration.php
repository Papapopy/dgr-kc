<?php
include("database.php");
error_reporting(0);

  if(isset($_POST['submit'])){
  $nom_entite = $_POST['nom_entite'];
  $nom_nature = $_POST['nom_nature'];
  $Nif = $_POST['Nif'];
  $Rccm = $_POST['Rccm'];
  $numrep= $_POST['numrep'];
  $Rs_Nom = $_POST['Rs_Nom'];
  $Sigle = $_POST['Sigle'];
  $Num_Avenue = $_POST['Num_Avenue'];
  $quartier_assuj = $_POST['quartier_assuj'];
  $Commune_Assuj = $_POST['Commune_Assuj'];
  $Ville_assuj = $_POST['Ville_assuj'];	
  $Territoire_assuj = $_POST['Territoire_assuj'];
  $num_telephone1 = $_POST['num_telephone1'];
  $num_telephone2 = $_POST['num_telephone2'];
  $email = $_POST['email'];

 if(!empty($Sigle) && !empty($Rs_Nom)){
  $query = "INSERT INTO assujetti(nom_entite,nom_nature,Nif,Rccm,numrep,Rs_Nom,Sigle,Num_Avenue,quartier_assuj,Commune_Assuj,Ville_assuj,Territoire_assuj,num_telephone1,num_telephone2,email)VALUES('$nom_entite','$nom_nature','$Nif','$Rccm','$numrep','$Rs_Nom','$Sigle','$Num_Avenue','$quartier_assuj','$Commune_Assuj','$Ville_assuj','$Territoire_assuj','$num_telephone1','$num_telephone2','$email')";
  $result = $conn->query($query);
  if($result){
    echo '<script>alert("Enregistrement reussi")</script>';
 }  
 }
  }
 
  if(isset($_POST['Envoyer'])){
    $nature_proprieteArr = $_POST['nature_propriete'];
    $date_declaArr = $_POST['date_decla'];
    $adresse_physArr = $_POST['adresse_phys'];
    $rangArr = $_POST['rang'];
    $superficieArr = $_POST['superficie'];
    $tauxArr = $_POST['taux'];
    $montantArr = $_POST['montant'];
        if(!empty($nature_proprieteArr)){
            for($i = 0; $i < count($nature_proprieteArr); $i++){
                if(!empty($nature_proprieteArr[$i])){
                    $nature_propriete = $nature_proprieteArr[$i];
                    $date_decla = $date_declaArr[$i];
                    $adresse_phys = $adresse_physArr[$i];
                    $rang = $rangArr[$i];
                    $superficie= $superficieArr[$i];
                    $taux = $tauxArr[$i];
                    $montant = $montantArr[$i];
                   $sql="INSERT INTO propriete (nature_propriete,date_decla,adresse_phys,rang,superficie,taux,montant)  Values('".$nature_propriete."','".$date_decla."','".$adresse_phys."','".$rang."','".$superficie."','".$taux."','".$montant."')";
    if ($conn->query($sql) === TRUE) 
    { 
        echo "New record created successfully";
     }
      else
     {
         echo 'Record not successfully';
     }
    
      }   
    
        }
           }
              }      
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Saisie de la tele-declaration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="./style.css">
</head>
<body>
 
  <!--<div class="container">-->
    <h3 id="STD">Saisie de la Télé-Déclaration</h3>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#DeclaAssuj">Identification de l'Assujetti</a></li>
      <li><a href="#menu1">Détails sur les Propriétés</a></li>
     <!-- <li><a href="#menu2">Menu 2</a></li>
      <li><a href="#menu3">Menu 3</a></li>-->
      </ul>
    <div class="tab-content">
      <div id="DeclaAssuj" class="tab-pane fade in active">
      <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading assuj">Identification de l'Assujetti</div>
            <form method="POST" action="" name="propriete">
              <div class="input-group PanelAssuj">
                  <span class="input-group-addon">Entité Fiscale</span>
                    <select class="form-control" id="EntiteFisc" name="nom_entite">
                      <option value="">Select Entite Fiscale</option>
                      <?php 
                      $query ="SELECT nom_entite FROM entite_fiscale";
                      $result = $conn->query($query);
                      if($result->num_rows> 0){
                          while($optionData=$result->fetch_assoc()){
                          $option =$optionData['nom_entite'];
                      ?>
                      <?php
                      //selected option
                      if(!empty($nom_entite) && $nom_entite==$option){
                      // selected option
                      ?>
                      <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                      <?php 
                      continue;
                      }?>
                      <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                      <?php
                      }}
                      ?> 
                      </select>
                  <span class="input-group-addon">Nature Jurudique</span>
                    <select class="form-control" id="NatJur" name="nom_nature">
                        <option value="">- Choisir votre nature -</option>     
                            <?php 
                            $query ="SELECT nom_nature FROM nature_juridique";
                            $result = $conn->query($query);
                            if($result->num_rows> 0){
                                while($optionData=$result->fetch_assoc()){
                                $option =$optionData['nom_nature'];
                            ?>
                            <?php
                            //selected option
                            if(!empty($nom_nature) && $nom_nature==$option){
                            // selected option
                            ?>
                            <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                            <?php 
                          continue;
                          }?>
                            <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                          <?php
                            }}
                          ?>   
                    </select>
                <span class="input-group-addon">Noms ou Raison Sociale</span>
                <input id="noms_rs" type="text" class="form-control" name="Rs_Nom" placeholder="Saisir vos informations">
                </div>
                  <div class="input-group PanelAssuj">
                  <span class="input-group-addon">Sigle</span>
                  <input id="sigle" type="text" class="form-control" name="Sigle" placeholder="Saisir votre sigle">
                  <span class="input-group-addon avenue">Avenue</span>
                  <input id="avenue" type="text" class="form-control" name="Num_Avenue" placeholder="Saisir votre avenue">
                  <span class="input-group-addon">N°</span>
                  <input id="num" type="text" class="form-control" name="num">
                  <span class="input-group-addon">Quartier</span>
                  <input id="quartier" type="text" class="form-control" name="quartier_assuj" placeholder="Saisir votre quartier">
                </div>
          <div class="input-group PanelAssuj">
          <span class="input-group-addon">Commune</span>
              <input id="commune" type="text" class="form-control" name="Commune_Assuj" placeholder="Saisir votre commune">
        
            <span class="input-group-addon">Ville</span>
            <input id="ville" type="text" class="form-control" name="Ville_assuj" placeholder="Saisir votre ville">
     
            <span class="input-group-addon">Territoire</span>
            <input id="Territoire" type="text" class="form-control" name="Territoire_assuj" placeholder="Saisir votre Territoire">

          </div>

          <div class="input-group PanelAssuj">
              <span class="input-group-addon">N° Impoôt (NIF)</span>
              <input id="nif" type="text" class="form-control" name="Nif" placeholder="Saisir votre NIF" maxlength="9 ">
              <span class="input-group-addon">N° RCCM</span>
              <input id="rccm" type="text" class="form-control" name="Rccm" placeholder="Saisir votre RCCM">
              <span class="input-group-addon">N° Repertoire</span>
              <input id="numrep" type="text" class="form-control" name="numrep" placeholder="Saisir votre N° Repertoire">
          </div>
        
          <div class="input-group PanelAssuj">       
            <span class="input-group-addon" id="tel1">N° Téléphone 1</span>
            <input id="telephone1" type="text" class="form-control" name="num_telephone1" placeholder="Saisir votre N° Téléphone 1">
            <span class="input-group-addon" id="tel2">N° Téléphone 2</span>
            <input id="telephone2" type="text" class="form-control" name="num_telephone2" placeholder="Saisir votre N° Téléphone 2">
            <span class="input-group-addon">Adresse E-mail</span>
            <input id="mail" type="email" required class="form-control" name="email" placeholder="Saisir votre E-mail" require>
      
          </div><br>
          <input type="submit"id="button" class="form-control" value="Ajouter" name="submit">
          <!--<input type="submit" name="submit">-->
          <br>
    </form>
  </div>
</div>
</div>

  <div id="menu1" class="tab-pane fade">
  <div class="panel panel-info">
    <div class="panel-heading Entpro" id="panelform">Détails sur les propriétés</div>
   
        <form class="form-detail" id="nat" action="" method="POST">
          <div class="input-group" id="Natpro">
  
            <span class="input-group-addon">Nature propriété</span>
            <select class="form-control NP" id="sel1" name="nature_propriete[]" require>
                <option>Villa</option>
                <option>Appartement</option>
                <option>Terrain</option>
                <option>Etage</option>
                <option>Autre</option>
              </select>
              <ul id="rssList1" class="rssList" style="display:none;"></ul>
          <!-- <input id="natpropriete" type="text" class="form-control" name="natpropriete" placeholder="Saisir votre nature de propriété">
                   --><span class="input-group-addon">Adresse Physique</span>
                <input id="adrphys" type="text" class="form-control" name="adresse_phys[]">
            
                <span class="input-group-addon">Rang de localité</span>
                <select class="form-control" id="sel2" name="rang[]">
                    <option>1er Rang</option>
                    <option>2è Rang</option>
                    <option>3è Rang</option>
                    <option>4è Rang</option>
                  </select>
                <!--<input id="rang" type="text" class="form-control" name="rang" placeholder="Saisir votre rang de localité">-->
                <span class="input-group-addon">Superficie</span>
                <input id="superficie" type="number" class="form-control" name="superficie[]" require >
  
                <span class="input-group-addon">Taux</span>
                <input id="taux" type="number" class="form-control" name="taux[]" requique onblur="Total();">
  
                <span class="input-group-addon">Montant</span>
                <input id="montant" type="number" class="form-control" name="montant[]" require>
                <!--  <input type="button" id="butAjout" name="butAjout" value ="Ajouter"> -->
                
                <input type="button"id="button" class="form-control" value="Enlever" name="button" onclick="Effacer()" require> 
             
                <input type="date" name="date_decla[]" class="form-control" value="<?php echo date('Y-m-d');?>" style="display:none;">
          </div> 
          <div class="form2"id="inputclone"></div>
          <input type="submit" name="Envoyer">
          </form>
            <div>
              <input type="submit"id="button" class="form-control" value="Ajouter" name="button" onclick="AddNew()">
              
            <!--<button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>-->
            
                <div class="input-group Tot" >
                <span class="input-group-addon" id="TotGen" >Montant dû en FC</span>
                <input id="TotGen" type="number" class="form-control" name="TotGen" onchange="findTotal()" >
               
                </div>

             
          <p id="legende"> Nature de la propriété : Villa = V ; Appartement = AP ; Terrain = Ter ; Etage = ET ; Autre = AT</p>
          <script>
              
            function AddNew(){
           //const node = document.getElementById("nat");
         // const clone = node.cloneNode(true);
         // document.body.appendChild(clone);
         
        //let menu = document.querySelector(' #nat');
        //let clonedMenu = menu.cloneNode(true);
        //clonedMenu.id = 'nat';
        //menu.classList.add('.Entpro');
       // document.body.appendChild(clonedMenu);
      
       var elem = document.querySelector('#Natpro');
  
  // Create a copy of it
  var clone = elem.cloneNode(true);
  
  // Update the ID and add a class
  clone.id = 'inputclone';
  clone.classList.add('form2');
  
  // Inject it into the DOM
  elem.after(clone);
  
   }
  
   function Effacer(){
  
    document.getElementById("inputclone").remove();
            }
    
   function Tabsuivant(){
      $('.nav-tabs a[href="#menu1"]').tab('show')
            }
            function Total(elem){

              var index=$(elem).parent().parent().index();
              
              document.getElementById("montant")[index].value = parseFloat(document.getElementById("superficie")[index].value) *parseFloat(document.getElementById("taux")[index].value);
            }  
            function GenTotal(){
    var arr = document.getElementsByName('montant');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);
    }

    document.getElementsByName('TotGen').value = tot;
}
          </script>
    </div> 
</div>
    </div>
  <!--</div>-->
  <script>
  $(document).ready(function(){
    $(".nav-tabs a").click(function(){
      $(this).tab('show');
    });
  });
  </script> 
</body>
<section>
  
</section>
</html>
