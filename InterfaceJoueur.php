 <?php 
 if (!isset($_SESSION['user'])) {
     header('location:index.php');
     exit();
 }
 if(!isset($_SESSION['score'])){
     $_SESSION['score']=0;
 }
         $js = file_get_contents('./data/question.json'); 
         $js =json_decode($js,true);
 
 if (!isset($_GET ['Jouer'] )) {
    header('location:index.php?lien=game&Jouer=1') ;
 }
 
 ?>
<div class="interface"
style="border:solid 2px;height:650px;width:900px;margin:auto;background-color:#fff">

<div class="header" 
style="border:solid 1px; height:100px;background-color: rgb(58, 212, 240);">

<p1 style=" font-weight:bold;margin:auto;">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</p1><br><br>
<p4 style="margin:auto;">JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRAL</p4> <br> <?php echo $_SESSION['user']['prenom']." ". $_SESSION['user']['nom'] ;?><br> 
<a href="index.php?status=logout"><button style="height:30px;margin-left:750px;margin-top:px;background-color:turquoise;">Déconnexion</button></a>
</div><br>

<div class="right" style="border:solid 1px rgb(58, 212, 240);height:500px;width:500px;margin-right:350px;">

<div class="quest" style="border:solid 1px rgb(58, 212, 240);height:100px;width:350px;margin:auto;">
<p1>Quesion <?=$_GET['Jouer']?>/5:<br> <?php echo $js[$_GET['Jouer']]['question'];?> <p1>
    

</div> <div class="prs"></div> <br><br><br>


<form method="post">
   <?php if($js[$_GET['Jouer']]['choix']=='texte'){
       echo "<input type='text' name='reponse'>";
        }

    if ($js[$_GET['Jouer']]['choix']=='simple' ) {
        $x=1;
         foreach ($js [$_GET['Jouer']]['reponses'] as $key) {
            echo "<input type='radio' value='$x' name='rep'>";
            echo $key;
            echo "<br>"; 
            $x++;
        }
    }

    if ($js[$_GET['Jouer']]['choix']=='multiple' ) {
        $x=1;
        foreach ($js [$_GET['Jouer']]['reponse'] as $key) {
            echo"<input type='checkbox' value='$x' name='repond[]'>";
            echo $key;
            echo "<br>";
            $x++;
    }}
    ?>
   
   <br><br><br>
<input type="submit" name="precedent" value="Precedent" style="background-color:rgb(119, 114, 114);height:30px;"> 
    <input type="submit" value="suivant" name="suivant" style="background-color:turquoise;margin-left:350px;height:30px;">

</form>

</div>

<div class="left" style="border:solid 1px rgb(58, 212, 240);height:400px; width:300px;margin-left:600px;paddin-top:-40%;"></div><br><br><br>


</div>
<?php 

if (!empty($_POST['suivant'])) {
    if($js[$_GET['Jouer']]['choix']=='texte'){
      
      if ( $_POST['reponse']==$js[$_GET['Jouer']]['choixtext']) {
           $_SESSION['score']+=$js[$_GET['Jouer']]['points'];
      } 
         }

    if($js[$_GET['Jouer']]['choix']=='simple'){

  if ($_POST['rep']==$js[$_GET['Jouer']]['bonnereponse']) {
    $_SESSION['score']+=$js[$_GET['Jouer']]['points'];
  }
    }  
 
    if($js[$_GET['Jouer']]['choix']=='multiple'){ 
        $reponses=array_intersect($js[$_GET['Jouer']]['rep'],$_POST['repond']);
        if(count($reponses)==count($js[$_GET['Jouer']]['rep']) && count($_POST['repond'])<=count($js[$_GET['Jouer']]['rep'])){
            $_SESSION['score']+=$js[$_GET['Jouer']]['points'];
            echo"okkkkkkkkkkkkkkkkkkkkkkkkkkkkk";
        }
      var_dump($reponses);
     }
  

     $suivant=$_GET['Jouer']+1;
     header("location:index.php?lien=game&Jouer=$suivant");


   var_dump($_POST['repond']);
}



if (!empty($_POST['precedent'])) {
$precedent=$_GET['Jouer']-1;
header("location:index.php?lien=game&Jouer=$precedent");

}
echo "<h1>";
echo $_SESSION['score'];
echo "</h1>";
?>