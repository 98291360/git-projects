
<?php 
//on détemine sur quelle page on se trouve
if (isset($_GET['pages']) && !empty($_GET['pages'])) {
    $current_page = (int) strip_tags($_GET['pages']);
}else{
    $current_page = 1;
}


//recuperer le nombre d'enregistrement
$count = DB::connect()->prepare("SELECT count(*) as nbr_encadreur from encadreurs");
$count-> setFetchMode(PDO::FETCH_ASSOC);
$count->execute();
$tcount = $count->fetchAll();


    //pagination
@$pages = $_GET['pages'];
$nb_element_par_page = 1;
$nb_de_page = ceil($tcount[0]["nbr_encadreur"]/$nb_element_par_page);

$premier = ($current_page * $nb_element_par_page) - $nb_element_par_page;



//Recuperer les enregistrement eux meme
$sel = DB::connect()->prepare("SELECT * FROM encadreurs order by id_encadreurs DESC LIMIT 0,1");
$sel ->setFetchMode(PDO::FETCH_ASSOC);
$sel ->execute();
$tab = $sel->fetchAll();

$data = new EncadreursController();
$encadreurs = $data -> getAllEncadreurs();
?>

<section>
  <div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto ">
          <div class="card">
          <div class="card-header">
                <h3>Liste des Encadreurs</h3>
             </div>
            <div class="card-body bg-light">
              <a href="<?php echo BASE_URL ;?>Add " class="btn btn-sm btn-primary mr-2 mb-2">
            <i class="fa fa-plus"></i>
            </a>
            <div><?php echo $tcount[0]["nbr_encadreur"]; ?> Enregistrements au Total</div>

                  <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                         <th scope="col">Matricule</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">DateDebut</th>
                         <th scope="col">SalaireMensuel</th>
                        <th scope="col">Centre</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($encadreurs as $encadreur):?>
                        <tr>
                            <th> <?php echo $encadreur['matricule'] ;?> </th>
                            <th scope="row"> <?php echo $encadreur['nom'] ;?> </th>
                             <th scope="row"> <?php echo $encadreur['prenom'] ;?> </th>
                             <td> <?php echo $encadreur['adresse']; ?></td>
                               <td> <?php echo $encadreur['telephone']; ?></td>
                                 <td> <?php echo $encadreur['date_debut']; ?></td>
                                   <td> <?php echo $encadreur['salaire']; ?></td>
                                     <td> <?php echo $encadreur['centre']; ?></td>
                                     
                                     <td> 
                                      <?php if ($encadreur['statut'] == 1)  {
                                              echo 
                                       '<div class="btn btn-success mt-3">Active </div>';
                                      }else{
                                        echo'<div class="btn btn-danger mt-3">Resilier </div>';
                                      }
             
                                       ?>
                                           
                                     </td>

                                     
              <td class="d-flex " style="padding-top: 1.6em;">
                <form action="Update" method="post" class="mr-1" >
                 <input type="hidden" name="id_encadreurs" value="<?php echo $encadreur['id_encadreurs']; ?> ">
                 <button class="btn btn-sm btn-warning me-1"> 
                 <i class="fa fa-edit"
                      style="color:green;"></i> 
                    </button>
                </form>
            
                <form action="Delete" method="post" class="mr-1" >
                 <input type="hidden" name="id_encadreurs" value="<?php echo $encadreur['id_encadreurs']; ?> " onclick="return confirm('Confirmer la suppression!')" class="Supprimer">
                 <button class="btn btn-sm btn-warning"> 
                 <i class="fa fa- fa-trash-o"
                      style="color: red;"></i>
                    </button> 
                </form>
                
              </td>
               
                        </tr>
                    <?php endforeach; ?>

                    <div><?php for ($i=1; $i <= $nb_de_page ; $i++) { 
                        if ($pages != $i) {
                          echo "<a href='?pages=$i'>$i</a>&nbsp;";
                        }else{
                            echo "<a>$i</a>&nbsp;";
                        }
                        
                    } ?></div>
                    <section>
                        <?php for ($i=0; $i < count($tab) ; $i++) {  ?>
                            <div>
                                <?php //echo $tab[$i][""]; ?>
                            </div>
                        <?php } ?>
                    </section>
                </tbody>
            </table>
            </div>
              
          </div>
            
        </div>
        
    </div>
    
</div>
</section>


        <script type="text/javascript">
  $(document).ready(function(){
    $(".supprimer").click(function(){
        if(!confirm("Vous voulez terminé cette suppression")){
          return false;
        }
    });




  });
</script>
<!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>