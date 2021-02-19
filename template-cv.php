<?php
/*
Template Name: formcv
*/

$errors = array();
if(!empty($_POST['submitted'])) {

  // Faille Xss
  
    $presentation = trim(strip_tags($_POST['presentation']));
    $formation_localite = trim(strip_tags($_POST['localite']));
    $formation_type = trim(strip_tags($_POST['type']));
    $formation_intitule = trim(strip_tags($_POST['intitule']));
    $formation_descriptif = trim(strip_tags($_POST['descriptif']));
    $formation_date_debut = trim(strip_tags($_POST['date_debut']));
    $formation_date_fin = trim(strip_tags($_POST['date_fin']));
    $domaine = trim(strip_tags($_POST['domaine']));
    $niveau = trim(strip_tags($_POST['niveau']));
    $telephone = trim(strip_tags($_POST['telephone']));
    $ville = trim(strip_tags($_POST['ville']));
    $adresse = trim(strip_tags($_POST['adresse']));
    $experience_entreprise = trim(strip_tags($_POST['entreprise']));
    $experience_type = trim(strip_tags($_POST['type']));
    $experience_intitule = trim(strip_tags($_POST['intitule']));
    $experience_descriptif = trim(strip_tags($_POST['descriptif']));
    $experience_date_debut = trim(strip_tags($_POST['date_debut']));
    $experience_date_fin = trim(strip_tags($_POST['date_fin']));
    $interet_intitule = trim(strip_tags($_POST['intitule']));
    $interet_description = trim(strip_tags($_POST['description']));


  // Validation

    $errors = validText($errors,$presentation,'presentation',3,1000);
    $errors = validText($errors,$formation_localite,'localite',3,100);
    $errors = validText($errors,$formation_type,'type',3,2550);
    $errors = validText($errors,$formation_intitule,'intitule',3,200);
    $errors = validText($errors,$formation_descriptif,'descriptif',3,350);
    $errors = validText($errors,$domaine,'domaine',3,160);
    $errors = validText($errors,$niveau,'niveau',3,160);
    $errors = validText($errors,$ville,'ville',3,160);
    $errors = validText($errors,$adresse,'adresse',3,220);
    $errors = validText($errors,$experience_entreprise,'entreprise',3,100);
    $errors = validText($errors,$experience_type,'type',3,255);
    $errors = validText($errors,$experience_intitule,'intitule',3,200);
    $errors = validText($errors,$experience_descriptif,'descriptif',3,350);
    $errors = validText($errors,$interet_intitule,'intitule',3,160);
    $errors = validText($errors,$interet_description,'description',3,60);


    
    if (count($errors) == 0) {
        insert($pdo, 'wpcd_competences', ['domaine', 'niveau'], [$domaine, $niveau,]);
        insert($pdo, 'wpcd_coordonnees', ['telephone','adresse','ville',], [$telephone, $adresse,$ville]);
        insert($pdo, 'wpcd_experiences', ['type', 'entreprise',  'intitule',  'descriptif', 'date_debut', 'date_fin'], [$experience_type, $experience_entreprise, $experience_intitule, $experience_descriptif, $experience_date_debut, $experience_date_fin,]);
        insert($pdo, 'wpcd_aperçus', ['presentation', 'photo'], [$presentation, $presentation]);
        insert($pdo, 'wpcd_formations', ['type', 'date_debut', 'date_fin', 'intitule', 'descriptif', 'localite'], [$formation_type, $formation_date_debut, $formation_date_fin, $formation_intitule, $formation_descriptif, $formation_localite]);
        insert($pdo, 'wpcd_interets', ['intitule', 'description'], [$interet_intitule, $interet_description]);
        $sent = true;
        // die ('ok');
    }

}

get_header(); ?>
  
    <div class="formcv wrap">
        <h3 class="h3-anim">Parle-nous de vous</h3>
        <p>Remplissez le plus d'informations possible à propos de vous, de votre parcours, de vos intérêts et passions, les mentions précédées de <span class="obligatoire" >*</span>, sont obligatoires pour la validation et l'enregistrement de votre CV.</p>
    </div>
    <div class="divform wrap3">
        <form class="formulaire" action="" method="post">
            <div class="cvflex">
                <div class="cvflex1">
                    <!-- Aperçu -->

                    <h4 class="h4-anim" >Aperçu</h4>

                    <div class="apercu">
                        <div class="form_photo form_general">
                            <label for="photo">Sélectionnez une photo de vous</label>
                            <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
                            <span class="error"><?php if(!empty($errors['photo'])){echo $errors['photo'];} ?></span>
                        </div>

                        <div class="form_presentation form_general">
                            <label for="presentation">Parlez un peu de vous<span class="obligatoire">*</span></label>
                            <textarea id="presentation" name="presentation"><?php if(!empty($_POST['presentation'])){echo $_POST['presentation'];} ?></textarea>
                            <span class="error"><?php if(!empty($errors['presentation'])){echo $errors['presentation'];} ?></span>
                        </div>
                    </div>
                    


                    <!-- formations -->

                    

                    <div class="formation" id="frm">
                    <h4 class="h4-anim" id="title_frm">Formations</h4>
                        <div class="form_localite form_general">
                            <label for="localite">Le lieu de la formation<span class="obligatoire">*</span></label>
                            <input id="localite" type="text" name="localite" value="<?php if(!empty($_POST['localite'])){echo $_POST['localite'];} ?>">
                            <span class="error"><?php if(!empty($errors['localite'])){echo $errors['localite'];} ?></span>
                        </div>

                        <div class="form_type form_general">
                            <label for="type">Type de formation<span class="obligatoire">*</span></label>
                            <input id="type" type="text" name="type" value="<?php if(!empty($_POST['type'])){echo $_POST['type'];} ?>">
                            <span class="error"><?php if(!empty($errors['type'])){echo $errors['type'];} ?></span>
                        </div>

                        <div class="form_intitule form_general">
                            <label for="intitule">Nom de la formation<span class="obligatoire">*</span></label>
                            <input id="intitule" type="text" name="intitule" value="<?php if(!empty($_POST['intitule'])){echo $_POST['intitule'];} ?>">
                            <span class="error"><?php if(!empty($errors['intitule'])){echo $errors['intitule'];} ?></span>
                        </div>

                        <div class="form_descriptif form_general">
                            <label for="descriptif">Description<span class="obligatoire">*</span></label>
                            <input id="descriptif" type="text" name="descriptif" value="<?php if(!empty($_POST['descriptif'])){echo $_POST['descriptif'];} ?>">
                            <span class="error"><?php if(!empty($errors['descriptif'])){echo $errors['descriptif'];} ?></span>
                        </div>

                        <div class="form_date_debut form_general">
                            <label for="date_debut">Date de début<span class="obligatoire">*</span></label>
                            <input type="date" id="date_debut" name="date_debut" value="<?php if(!empty($_POST['date_debut'])){echo $_POST['date_debut'];} ?>" min="1950-01-01" max="2021-02-20">
                            <span class="error"><?php if(!empty($errors['date_debut'])){echo $errors['date_debut'];} ?></span>
                        </div>

                        <div class="form_date_fin form_general">
                            <label for="date_fin">Date de fin</label>
                            <input type="date" id="date_fin" name="date_fin" value="<?php if(!empty($_POST['date_fin'])){echo $_POST['date_fin'];} ?>" min="1950-01-01" max="2023-12-31">
                            <span class="error"><?php if(!empty($errors['date_fin'])){echo $errors['date_fin'];} ?></span>
                        </div>
                        
                    </div>
                    <div id="destination_frm"></div>
                    <a class="ajout" id="ajout_frm"href="#">Ajouter une Formation</a>


                    <!-- compétences -->

                    

                    <div class="competence" id="cpt">
                    <h4 class="h4-anim" id="title_cpt">Compétences</h4>
                        <div class="form_domaine form_general">
                            <label for="domaine">Description<span class="obligatoire">*</span></label>
                            <input id="domaine" type="text" name="domaine" value="<?php if(!empty($_POST['domaine'])){echo $_POST['domaine'];} ?>">
                            <span class="error"><?php if(!empty($errors['domaine'])){echo $errors['domaine'];} ?></span>
                        </div>

                        <div class="form_niveau form_general">
                            <label for="niveau">Précisez votre niveau</label>
                            <select name="niveau" id="niveau">
                                <option value="">--Selectionnez une option--</option>
                                <option value="débutant">Novice</option>
                                <option value="experimente">Experimenté</option>
                                <option value="confirme">Confirmé</option>
                                <option value="expert">Expert</option>
                            </select>
                            <span class="error"><?php if(!empty($errors['niveau'])){echo $errors['niveau'];} ?></span>
                        </div>
                        
                    </div>
                    <div id="destination_cpt"></div>
                    <a class="ajout" id="ajout_cpt" href="#">Ajouter une Compétence</a>
                </div>
                <div class="cvflex2">
                    <!-- coordonnées -->

                    <h4 class="h4-anim" >Coordonnées</h4>

                    <div class="coordonnee">
                        <div class="form_telephone form_general">
                            <label for="telephone">Renseignez votre numéro de téléphone<span class="obligatoire">*</span></label>
                            <input type="text" id="telephone" name="telephone" value="<?php if(!empty($_POST['telephone'])){echo $_POST['telephone'];} ?>">
                            <span class="error"><?php if(!empty($errors['telephone'])){echo $errors['telephone'];} ?></span>
                        </div>

                        <div class="form_ville form_general">
                            <label for="ville">Votre ville<span class="obligatoire">*</span></label>
                            <input id="ville" type="text" name="ville" value="<?php if(!empty($_POST['ville'])){echo $_POST['ville'];} ?>">
                            <span class="error"><?php if(!empty($errors['ville'])){echo $errors['ville'];} ?></span>
                        </div>

                        <div class="form_adresse form_general">
                            <label for="adresse">Votre adresse<span class="obligatoire">*</span></label>
                            <input id="adresse" type="text" name="adresse" value="<?php if(!empty($_POST['adresse'])){echo $_POST['adresse'];} ?>">
                            <span class="error"><?php if(!empty($errors['adresse'])){echo $errors['adresse'];} ?></span>
                        </div>
                    </div>


                    <!-- experience -->

                    

                    <div class="experience" id="exp">
                    <h4 class="h4-anim" id="title_exp">Experiences</h4>
                        <div class="form_entreprise form_general">
                            <label for="entreprise">Lieu de l'experience<span class="obligatoire">*</span></label>
                            <input id="entreprise" type="text" name="entreprise" value="<?php if(!empty($_POST['entreprise'])){echo $_POST['entreprise'];} ?>">
                            <span class="error"><?php if(!empty($errors['entreprise'])){echo $errors['entreprise'];} ?></span>
                        </div>

                        <div class="form_type form_general">
                            <label for="type">Type de d'expérience<span class="obligatoire">*</span></label>
                            <input id="type" type="text" name="type" value="<?php if(!empty($_POST['type'])){echo $_POST['type'];} ?>">
                            <span class="error"><?php if(!empty($errors['type'])){echo $errors['type'];} ?></span>
                        </div>

                        <div class="form_intitule form_general">
                            <label for="intitule">Nom de l'experience<span class="obligatoire">*</span></label>
                            <input id="intitule" type="text" name="intitule" value="<?php if(!empty($_POST['intitule'])){echo $_POST['intitule'];} ?>">
                            <span class="error"><?php if(!empty($errors['intitule'])){echo $errors['intitule'];} ?></span>
                        </div>

                        <div class="form_descriptif form_general">
                            <label for="descriptif">Description<span class="obligatoire">*</span></label>
                            <input id="descriptif" type="text" name="descriptif" value="<?php if(!empty($_POST['descriptif'])){echo $_POST['descriptif'];} ?>">
                            <span class="error"><?php if(!empty($errors['descriptif'])){echo $errors['descriptif'];} ?></span>
                        </div>

                        <div class="form_date_debut form_general">
                            <label for="date_debut">Date de début<span class="obligatoire">*</span></label>
                            <input type="date" id="date_debut" name="date_debut" value="<?php if(!empty($_POST['date_debut'])){echo $_POST['date_debut'];} ?>" min="1950-01-01" max="2021-02-20">
                            <span class="error"><?php if(!empty($errors['date_debut'])){echo $errors['date_debut'];} ?></span>
                        </div>

                        <div class="form_date_fin form_general">
                            <label for="date_fin">Date de fin</label>
                            <input type="date" id="date_fin" name="date_fin" value="<?php if(!empty($_POST['date_fin'])){echo $_POST['date_fin'];} ?>" min="1950-01-01" max="2023-12-31">
                            <span class="error"><?php if(!empty($errors['date_fin'])){echo $errors['date_fin'];} ?></span>
                        </div>
                    </div>
                    <div id="destination_exp"></div>
                    <a class="ajout" id="ajout_exp"href="#">Ajouter une Expérience</a>

                    <!-- Interet -->

                    

                    <div class="interet" id="int">
                    <h4 class="h4-anim" id="title_int">Intérets</h4>
                        <div class="form_intitule form_general">
                            <label for="intitule">Description<span class="obligatoire">*</span></label>
                            <input id="intitule" type="text" name="intitule" value="<?php if(!empty($_POST['intitule'])){echo $_POST['intitule'];} ?>">
                            <span class="error"><?php if(!empty($errors['intitule'])){echo $errors['intitule'];} ?></span>
                        </div>

                        <div class="form_description form_general">
                            <label for="description">Parlez un peu de vous<span class="obligatoire">*</span></label>
                            <textarea id="description" name="description"><?php if(!empty($_POST['description'])){echo $_POST['description'];} ?></textarea>
                            <span class="error"><?php if(!empty($errors['description'])){echo $errors['description'];} ?></span>
                        </div>
                        
                    </div>
                    <div id="destination_int"></div>
                    <a class="ajout" id="ajout_int" href="#">Ajouter un intéret</a>
                </div>
    </div>           
                
                <!-- Envoyer -->

                <div class="form_submit form_general">
                    <input type="submit" name="submitted" value="Envoyer">
                    <span class="succes"><?php if(!empty($errors['submitted'])){echo $errors['submitted'];} ?></span>
                </div>
            </div>
        </form>
    
    <div class="fin_nuages">
        <img src="" alt="">
    </div>

<?php get_footer();