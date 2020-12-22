
$(document).ready(function(){

$(".ajout_perso").click(function(){

  var html='<div class="col-md-6 mb-3"> <label for="Nom_personnage">Nom du personnage</label>';
       html+=' <input type="text" class="form-control"  name="Nom_personnage[]" placeholder="" required>';
       html+=' <div class="invalid-feedback"> Donner un nom à votre personnage  </div></div>';
       html+=' <div class="col-md-6 mb-3"> <label for="Description_Perso">Description du personnage</label>';
       html+=' <input type="text" class="form-control"  name="Description_Perso[]" placeholder="" required>';
       html+=' <div class="invalid-feedback"> Veuillez décrire le personnage </div>';


      $(".personnages").append(html);
    });
  });
