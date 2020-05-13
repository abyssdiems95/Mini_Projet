<?php
if (!empty ($_POST)) {
    if ( ($_POST['choix']=='texte')) {
        $question=array();
    
        $question['question']=$_POST['question'];
        $question['points']=$_POST['points'];
        $question['choix']=$_POST['choix'];
        $question['choixtext']=$_POST['choixtext'];
        $js = file_get_contents('./data/question.json'); 
        $js =json_decode($js,true);
        $js[]=$question;                            //rajouter le tableau dans le tableau json converti
          $js = json_encode($js);                    //le mettre comme type objet javascript
        file_put_contents('./data/question.json',$js);//rajouter le type objet javascript dans le fichier json    
    }
    elseif (($_POST['choix']=='simple')) {
        unset($_POST['btn_submit']);
        $question=$_POST;
        
        
        $js = file_get_contents('./data/question.json'); 
        $js =json_decode($js,true);
        $js[]=$question;                            //rajouter le tableau dans le tableau json converti
          $js = json_encode($js);                    //le mettre comme type objet javascript
        file_put_contents('./data/question.json',$js);//rajouter le type objet javascript dans le fichier json    
    
    }else {
        unset($_POST['btn_submit']);
        var_dump($_POST);
        $question=$_POST;
        
        
        $js = file_get_contents('./data/question.json'); 
        $js =json_decode($js,true);
        $js[]=$question;                             
          $js = json_encode($js);                    
        file_put_contents('./data/question.json',$js);
           
    }
    
    
    
    
    
    
    
    
    }

?>

<div  style="border:solid 2px rgb(58, 212, 240);border-radius:10%; width:450px; height:575px;margin-left:750px;margin-bottom:-600px;"><br><br><br>

<p1 style="margin:auto; margin-right:100px;font-weight:bold">PARAMETRER VOTRE QUESTION</p1><br><br>

<form action="" method="post">
   <p style="font-weight:bold">Question <input type="text" name="question" id=question style="height:100px; width:360px;border:solid 1px rgb(58, 212, 240); background-color:#fff"><br><br>

   <p style="font-weight:bold">Nmbr de Points <input type='number' name='points' style="height:40px;width:75px;border:solid 1px rgb(58, 212, 240)"><br><br>

   Type de reponse <select name='choix'id='choix' onfocusout="choice();" placeholder="Donnez le type de réponse" 
   style="height:30px;width:200px;border:solid 1px rgb(58, 212, 240)">
<option value="texte">Texte</option>
<option value="simple">simple</option>
<option value="multiple">multiple</option>
</select><img id='img' src=../public/icones/ic-ajout-réponse.png  onclick="onAddInput()" style="">

   <div>
       <button type="submit" class="suivant" name="btn_submit" id="" value=""
       style="background-color:turquoise;margin-top:150px;margin-left:367px;height:30px;">
        Enregistrer</button>
    </div>  
        <div id="inputs">
<div class="row" id="row_0">
</div>
</div>
</div>
</form>




<script>
    function choice(){
        var x =document.getElementById('choix');
        var img =document.getElementById('img');
    if(choix.value=='texte'){
        nbrRow++;
var divInputs = document.getElementById('inputs');
var newInput = document.createElement('div');
newInput.setAttribute('class','row');
newInput.setAttribute('id','row_'+nbrRow);
newInput.innerHTML =`  <input type="text" class="Champ" name="choixtext">
    <button type="button" class="btn btn-red" onclick="onDeleteInput(${nbrRow})">X</button>`;
divInputs.appendChild(newInput);
     //   img.setAttribute('onclick','addTexte();');
       
    }
    if(choix.value=='simple'){
        img.setAttribute('onclick','addSimple();');
       
    }
    if(choix.value=='multiple'){
        img.setAttribute('onclick','addMultiple();');
       
    }
    }var nbrRow = 0;
    function addSimple(){
        nbrRow++;
var divInputs = document.getElementById('inputs');
var newInput = document.createElement('div');
newInput.setAttribute('class','row');
newInput.setAttribute('id','row_'+nbrRow);
newInput.innerHTML =`  <input type="text" name="reponses[`+nbrRow+`]" class="Champ"><input type="radio" name='bonnereponse'  value="`+nbrRow+`"  >
    <button type="button" class="btn btn-red" onclick="onDeleteInput(${nbrRow})">X</button>`;
divInputs.appendChild(newInput);
    }
//function Input() {
    
//}
   // var x=docum
   var nbrRow = 0;
function addMultiple(){
    nbrRow++;
var divInputs = document.getElementById('inputs');
var newInput = document.createElement('div');
newInput.setAttribute('class','row');
newInput.setAttribute('id','row_'+nbrRow);
newInput.innerHTML =`  <input type="text" name="reponse[`+nbrRow+`]" class="Champ"><input name="rep[`+nbrRow+`]" value="`+nbrRow+`" type="checkbox">
    <button type="button" class="btn btn-red" onclick="onDeleteInput(${nbrRow})">X</button>`;
divInputs.appendChild(newInput);
}

function onDeleteInput(n) {
    var target = document.getElementById('row_'+n);
    
     setTimeout(function () {
        target.remove();
     },700)

     fadeOut('row_'+n);

}

function fadeOut(idTarget){
    var target= document.getElementById('idTarget')
    var effect= setInterval(function(){
        if(!target.style.opacity){
            target.style.opacity= 1;
        }
        if(target.style.opacity>0){
            target.style.opacity-=0.1;
        }else{
            clearInterval(effect);
        }
    },200)
}

</script>