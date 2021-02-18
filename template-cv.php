<?php
/*
Template Name: formcv
*/

$errors = array();
if(!empty($_POST['submitted'])) {

  // Faille Xss
  
  $message = trim(strip_tags($_POST['message']));
  $presentation = trim(strip_tags($_POST['presentation']));
  $localite = trim(strip_tags($_POST['localite']));
  $formation_intitule = trim(strip_tags($_POST['formation_intitule']));
  $formation_description = trim(strip_tags($_POST['formation_description']));
  $formation_debut = trim(strip_tags($_POST['formation_debut']));
  $formation_fin = trim(strip_tags($_POST['formation_fin']));
  $domaine = trim(strip_tags($_POST['domaine']));
  $tel = trim(strip_tags($_POST['tel']));
  $ville = trim(strip_tags($_POST['ville']));
  $adresse = trim(strip_tags($_POST['adresse']));
  $experience_entreprise = trim(strip_tags($_POST['experience_entreprise']));
  $experience_type = trim(strip_tags($_POST['experience_type']));
  $experience_intitule = trim(strip_tags($_POST['experience_intitule']));
  $experience_description = trim(strip_tags($_POST['experience_description']));
  $experience_debut = trim(strip_tags($_POST['experience_debut']));
  $experience_fin = trim(strip_tags($_POST['experience_fin']));
  $interet_intitule = trim(strip_tags($_POST['interet_intitule']));
  $interet_description = trim(strip_tags($_POST['interet_description']));


  // Validation

    // Validation message
    $errors = validText($errors,$presentation,'presentation',3,1000);
    $errors = validText($errors,$formation_localite,'formation_localite',3,100);
    $errors = validText($errors,$formation_type,'formation_type',3,2550);
    $errors = validText($errors,$formation_intitule,'formation_intitule',3,200);
    $errors = validText($errors,$formation_description,'formation_description',3,350);
    $errors = validText($errors,$domaine,'domaine',3,160);
    $errors = validText($errors,$ville,'ville',3,160);
    $errors = validText($errors,$adresse,'adresse',3,220);
    $errors = validText($errors,$experience_entreprise,'experience_entreprise',3,100);
    $errors = validText($errors,$experience_type,'experience_type',3,255);
    $errors = validText($errors,$experience_intitule,'experience_intitule',3,200);
    $errors = validText($errors,$formation_description,'formation_description',3,350);
    $errors = validText($errors,$interet_intitule,'interet_intitule',3,160);
    $errors = validText($errors,$interet_description,'interet_description',3,60);

    die('ok');
    

  if(count($errors) == 0) {
    $sql = "INSERT INTO contact (email, message, created_at)
            VALUES (:email,:message, NOW())";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email',$email,PDO::PARAM_STR);
    $query->bindValue(':message',$message,PDO::PARAM_STR);
    $query->execute();
    $errors ['submitted'] = ' Merci, nous répondrons bientôt à votre message.';
  }
}

get_header(); ?>
  
    <div class="formcv wrap">
        <h3 class="h3-anim">Parles nous de vous</h3>
        <p>Remplissez le plus d'informations possible à propos de vous, de votre parcours, de vos interets et passion, les mentions précédés de <span class="obligatoire" >*</span>, sont obligatoires pour la validation et l'enregistrement de votre CV.</p>
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
                        <div class="form_formation_localite form_general">
                            <label for="formation_localite">Le lieu de la formation<span class="obligatoire">*</span></label>
                            <input id="formation_localite" type="text" name="localite" value="<?php if(!empty($_POST['formation_localite'])){echo $_POST['formation_localite'];} ?>">
                            <span class="error"><?php if(!empty($errors['formation_localite'])){echo $errors['formation_localite'];} ?></span>
                        </div>

                        <div class="form_formation_type form_general">
                            <label for="formation_type">Type de formation<span class="obligatoire">*</span></label>
                            <input id="formation_type" type="text" name="formation_type" value="<?php if(!empty($_POST['formation_type'])){echo $_POST['formation_type'];} ?>">
                            <span class="error"><?php if(!empty($errors['formation_type'])){echo $errors['formation_type'];} ?></span>
                        </div>

                        <div class="form_formation_intitule form_general">
                            <label for="formation_intitule">Nom de la formation<span class="obligatoire">*</span></label>
                            <input id="formation_intitule" type="text" name="formation_intitule" value="<?php if(!empty($_POST['formation_intitule'])){echo $_POST['formation_intitule'];} ?>">
                            <span class="error"><?php if(!empty($errors['formation_intitule'])){echo $errors['formation_intitule'];} ?></span>
                        </div>

                        <div class="form_formation_description form_general">
                            <label for="formation_description">Description<span class="obligatoire">*</span></label>
                            <input id="formation_description" type="text" name="formation_description" value="<?php if(!empty($_POST['formation_description'])){echo $_POST['formation_description'];} ?>">
                            <span class="error"><?php if(!empty($errors['formation_description'])){echo $errors['formation_description'];} ?></span>
                        </div>

                        <div class="form_formation_debut form_general">
                            <label for="formation_debut">Date de début<span class="obligatoire">*</span></label>
                            <input type="date" id="formation_debut" name="formation_debut" value="<?php if(!empty($_POST['formation_debut'])){echo $_POST['formation_debut'];} ?>" min="1950-01-01" max="2021-02-20">
                            <span class="error"><?php if(!empty($errors['formation_debut'])){echo $errors['formation_debut'];} ?></span>
                        </div>

                        <div class="form_formation_fin form_general">
                            <label for="formation_fin">Date de fin</label>
                            <input type="date" id="formation_fin" name="formation_fin" value="<?php if(!empty($_POST['formation_fin'])){echo $_POST['formation_fin'];} ?>" min="1950-01-01" max="2023-12-31">
                            <span class="error"><?php if(!empty($errors['formation_fin'])){echo $errors['formation_fin'];} ?></span>
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
                        <div class="form_tel form_general">
                            <label for="tel">Renseignez votre numéro de téléphone<span class="obligatoire">*</span></label>
                            <input type="text" id="tel" name="tel" value="<?php if(!empty($_POST['tel'])){echo $_POST['tel'];} ?>">
                            <span class="error"><?php if(!empty($errors['tel'])){echo $errors['tel'];} ?></span>
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
                        <div class="form_experience_entreprise form_general">
                            <label for="experience_entreprise">Le lieu de la formation<span class="obligatoire">*</span></label>
                            <input id="experience_entreprise" type="text" name="experience_entreprise" value="<?php if(!empty($_POST['experience_entreprise'])){echo $_POST['experience_entreprise'];} ?>">
                            <span class="error"><?php if(!empty($errors['experience_entreprise'])){echo $errors['experience_entreprise'];} ?></span>
                        </div>

                        <div class="form_experience_type form_general">
                            <label for="experience_type">Type de formation<span class="obligatoire">*</span></label>
                            <input id="experience_type" type="text" name="experience_type" value="<?php if(!empty($_POST['experience_type'])){echo $_POST['experience_type'];} ?>">
                            <span class="error"><?php if(!empty($errors['experience_type'])){echo $errors['experience_type'];} ?></span>
                        </div>

                        <div class="form_experience_intitule form_general">
                            <label for="experience_intitule">Nom de la formation<span class="obligatoire">*</span></label>
                            <input id="experience_intitule" type="text" name="experience_intitule" value="<?php if(!empty($_POST['experience_intitule'])){echo $_POST['experience_intitule'];} ?>">
                            <span class="error"><?php if(!empty($errors['experience_intitule'])){echo $errors['experience_intitule'];} ?></span>
                        </div>

                        <div class="form_experience_description form_general">
                            <label for="experience_description">Description<span class="obligatoire">*</span></label>
                            <input id="experience_description" type="text" name="experience_description" value="<?php if(!empty($_POST['experience_description'])){echo $_POST['experience_description'];} ?>">
                            <span class="error"><?php if(!empty($errors['experience_description'])){echo $errors['experience_description'];} ?></span>
                        </div>

                        <div class="form_experience_debut form_general">
                            <label for="experience_debut">Date de début<span class="obligatoire">*</span></label>
                            <input type="date" id="experience_debut" name="experience_debut" value="<?php if(!empty($_POST['experience_debut'])){echo $_POST['experience_debut'];} ?>" min="1950-01-01" max="2021-02-20">
                            <span class="error"><?php if(!empty($errors['experience_debut'])){echo $errors['experience_debut'];} ?></span>
                        </div>

                        <div class="form_experience_fin form_general">
                            <label for="experience_fin">Date de fin</label>
                            <input type="date" id="experience_fin" name="experience_fin" value="<?php if(!empty($_POST['experience_fin'])){echo $_POST['experience_fin'];} ?>" min="1950-01-01" max="2023-12-31">
                            <span class="error"><?php if(!empty($errors['experience_fin'])){echo $errors['experience_fin'];} ?></span>
                        </div>
                    </div>
                    <div id="destination_exp"></div>
                    <a class="ajout" id="ajout_exp"href="#">Ajouter une Expérience</a>

                    <!-- Interet -->

                    

                    <div class="interet" id="int">
                    <h4 class="h4-anim" id="title_int">Intérets</h4>
                        <div class="form_interet_intitule form_general">
                            <label for="interet_intitule">Description<span class="obligatoire">*</span></label>
                            <input id="interet_intitule" type="text" name="interet_intitule" value="<?php if(!empty($_POST['interet_intitule'])){echo $_POST['interet_intitule'];} ?>">
                            <span class="error"><?php if(!empty($errors['interet_intitule'])){echo $errors['interet_intitule'];} ?></span>
                        </div>

                        <div class="form_interet_description form_general">
                            <label for="interet_description">Parlez un peu de vous<span class="obligatoire">*</span></label>
                            <textarea id="interet_description" name="interet_description"><?php if(!empty($_POST['interet_description'])){echo $_POST['interet_description'];} ?></textarea>
                            <span class="error"><?php if(!empty($errors['interet_description'])){echo $errors['interet_description'];} ?></span>
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