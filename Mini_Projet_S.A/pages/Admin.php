<?php
is_connect();
$prenom= $_SESSION['user']['prenom'];
$nom= $_SESSION['user']['nom'];


?>



<div class="couvre">
    <div class="couvre-header">
        <div class="title1">créer et paramètrer vos quizz</div>
        <div>
        <div><button type="submit" class="btn1 deconnexion" name="btn_submit" id="" value=""><a href="index.php?statut=logout" class="dec">Deconnexion</a></button></div>
        </div>
    </div>
    <div class="couvre-body">
      <div class="menu">
          <div class="menu-header">
              <div class="photo-form">

              <?php
              echo $prenom.' '.$nom;
              ?>
             
              </div>
          </div>
          <div class="list">
              <nav class="list-form">
                <ul>
                <div class="liste-icon-form list1"></div>
                <li><a href="index.php?lien=accueil&page=listequestions">Liste Questions</a></li>
                <div class="liste-icon-form list2"></div>
                <li><a href="index.php?lien=accueil&page=inscription">Créer Admin</a></li>
                <div class="liste-icon-form list3"></div>
                <li><a href="index.php?lien=accueil&page=joueur">Liste Joueurs</a></li>
                <div class="liste-icon-form list4"></div>
                <li><a href="index.php?lien=accueil&page=creerquestions">Créer Questions</a></li>  
                </ul>
              </nav> 
         </div>
      </div>
      
 </div>   
</div>

<?php

if ($_GET['page'] == 'joueur') 
    {
        include("Joueur.php");
    }
elseif ($_GET['page'] == 'inscription') 
    {
        include("Inscription.php");
    }  
    
if    ($_GET['page'] == 'listequestions') 
{
    include("Listequestion.php");
}   
 
?>