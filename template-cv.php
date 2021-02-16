<?php
/*
Template Name: cv
*/

get_header(); ?>
<div class="container_cv">
    <section class="colonne_gauche" id="colonne_gauche">
        <div class="photo_profil" id="photo_profil">
            <img src="" alt="photo-profil">
        </div>
        <div class="wrap_cgcv">
            <div class="titre_cv">
                <h1><span>Michel</span></h1>
                <h1><span>Michelloti</span></h1>
                <p>25 ans <br> Travaille chez Michel inc.</p>
            </div>
            <div class="paragraphe_cv apercu_cv">
                <h2 class="titre_section titre_aperçu" id="presentation">Profil</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas maxime tenetur corporis nulla quidem voluptate architecto non molestias eius, vel cupiditate vero facilis ratione modi voluptates reprehenderit aut animi id?</p>
            </div>
            <div class="paragraphe_cv competences_cv">
                <h1 class="titre_section">Compétences clés</h1>
                <h2 class="domaine_competences">Point faible</h2>
                <p class="niveau_competences">Trop Fort</p> 
                <!-- a changer -->
            </div>
            <div class="paragraphe_cv coordonnees_cv">
                <h2 class="titre_section titre_profil">Contactez-moi</h2>
                <p class="telephone">12 34 56 78 90</p>
                <p class="adresse"> 1 rue de la chôme</p>
                <p class="ville"> Chomepolis</p>
            </div>
        </div>
    </section>
    
    <section class="colonne_droite" id="colonne_droite">
    <div class="wrap_cvcd">
        <div class="section_experience">
            <div class="background">
                <h3 class="titre_section">Experience</h3>
            </div>
            <div class="details">
                <h4 class="entreprise">Google</h4>
                <div>
                    <h5 class="intitule">Prendre l'argent des Gafa</h5>|
                    <h5 class="date">2020/02</h5>|
                    <h5 class="type">CDI</h5>
                </div>
                <p class="decriptif">Se faire de l'oseille sur le chomdu</p>
            </div>
        </div>
        <div class="section_formation">
            <div class="background">
                <h3 class="titre_section">Formation</h3>
            </div>
            <div class="details">
            <h4 class="localite">Pole emploi</h4>
                <div>
                    <h5 class="intitule">Chomage</h5>|
                    <h5 class="date">2020</h5>|
                    <h5 class="type">CDI</h5>
                </div>
                <p class="descriptif">Apprendre comment fonctionne le chomdu pour mieux l'éradiquer</p>
            </div>
        </div>
        <div class="section_perso">
            <div class="background">
                <h3 class="titre_section">Mes passion</h3>
            </div>
            <div class="details">
                <h4 class="intitule">Le taf</h4>
                <p class="descriptif">Plus de taf, moins de chomdu</p>
            </div>
        </div>
    </div> 
    </section>
</div>
<?php get_footer();
