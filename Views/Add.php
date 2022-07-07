
<?php 


if (isset($_POST['submit'])) {
  $newEncadreur = new EncadreursController();
$newEncadreur -> addEncadreur();
}

?>

<section>
  <div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto ">
          <div class="card">
             <div class="card-header">
            
                <h3 class="text-center  mt-4">Ajoutter un Encadreur</h3>
                   <a href="<?php echo BASE_URL ;?> " class="btn btn-sm btn-secondary mr-2 mb-2">
            <i class="fa fa-home"></i>
            </a>
             </div>
          
            <div class="card-body bg-light">
             
         <form name="Myform"  method="post"  autocomplete="off" onsubmit="return Mydocs()" class="Mydocs">
                         <!--Matricule field-->
                        <div class="form-groupe">

                            <label for="nom">Matricule:</label>
                            

                            <input type="text" name="matricule" class="form-control" id="matricule"  value="" placeholder="" >                        
                        </div>


                        <!--Name field-->
                        <div class="form-groupe">

                            <label for="nom">Nom:</label>
                            

                            <input type="text" name="nom" class="form-control" id="nom"  value="" placeholder="" >                        
                        </div>


                            <!--prenom field-->
                        <div class="form-groupe">
                            <label for="prenom" >Prenom:</label>
                            
                            <input type="text" name="prenom" class="form-control" id="prenom"  value="" placeholder=" " size="60">
                        </div>


                              <!--Adresse field-->
                        <div class="form-groupe">
                            <label for="adresse" >Adresse:</label>
                           
                              
                            <input type="text" name="adresse" class="form-control" id="adresse" value="" placeholder="   " size="60"> </div>

                           <!--Tel field-->
                        <div class="form-groupe">
                            <label for="telephone" >Telephone:</label>
                          
                            <input type="text" name="telephone"  class="form-control" id="telephone" value=""placeholder=" " size="60">
                        </div>

                        

                              
                            <!--Date field-->
                        <div class="form-groupe">
                            <label for="date_debut" >Date Embauche:</label>
                            
                            <input type="date" name="date_debut" class="form-control" id="date_debut" required="required" placeholder=" " value="">
                        </div>

                           <!--salaire field-->
                        <div class="form-groupe">
                            <label for="salaire" >Salaire Mensuel:</label>
                             
                            <input type="text" name="salaire" class="form-control" id="salaire"  value="" placeholder="   " size="60"> </div>

                                <!--centre field-->
                        <div class="form-groupe">
                            <label for="centre" >Centre:</label>
                          
                            <input type="text" name="centre" class="form-control" id="centre"  value="" placeholder="   "> </div>


                           <!--statut field-->
                        <div class="form-groupe" >
                             <label for="centre" >Statut:</label>
                           <select class="form-control" name="statut">
                            <option>-------selectionnez-----------</option>
                            <option value="1">Active</option>
                            <option value="0">Résilier</option>
                             
                           </select>
                           </div>

                           <div class="form-groupe pt-3">
                             <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                           </div>

                
                     
                    </form>                
            </div>
              
          </div>
            
        </div>
        
    </div>
    
</div>
</section>

