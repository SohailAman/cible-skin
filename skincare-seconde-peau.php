<?php

namespace CibleSkin;

require_once __DIR__ . "/../vendor/autoload.php";



Cart::create();


?>


<!DOCTYPE html>
<html lang='fr' data-wish-list='<?= is_null($wishList) ? "" : htmlspecialchars($wishList) ?>'>

<head>
    <?php require_once "../include/html/head.php"; ?>
    <title>LE SOIN SECONDE-PEAU - Cible Skin</title>
    <link rel='stylesheet' href='style/products.css?<?= filemtime("style/products.css") ?>'>
    <link rel='stylesheet'
        href='scripts/flickity/flickity.min.css?<?= filemtime("scripts/flickity/flickity.min.css") ?>'>
    <link rel="stylesheet" href="./style/static/skincare.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" />
</head>


<body>
    <?php echo Analytics::renderHTMLForGTM(true); ?>


    <?php require_once "../include/html/header.php"; ?>



    <!--  <body>-->
    <div class="wrapper">


        <main class="main">

            <section class="main__hero hero">
                <div class="hero-container">
                    <div class="hero__images">
                        <div class="hero__main__image-container">
                            <img src="assets/images/common-imgs/steps/3.jpg" alt="" class="hero__main__image"
                                id="current" />
                        </div>

                        <div class="hero__gallery-container">
                            <img src="assets/images/common-imgs/steps/3.jpg" alt="" />
                            <img src="assets/images/common-imgs/signature/1.png" alt="" />
                            <img src="assets/images/common-imgs/img-skincares/h/6.jpg" alt="" />
                            <img src="assets/images/common-imgs/steps/7.jpg" alt="" />
                        </div>
                    </div>
                    <div class="hero-content-container">
                        <div class="inner">
                            <div class="hero-content-title">
                                <h2 class="hero-title">LE SOIN SECONDE-PEAU</h2>
                                <p class="hero-subtitle">
                                    Le soin <span>ultra-hydratant</span> et
                                    <span>purifiant </span>
                                </p>
                            </div>
                            <div class="hero-content-tags">
                                <span class="hero-tag">
                                    <img src="assets/images/img-secondepeau/img/hero/clock.svg" alt="clock image"
                                        class="hero-clock-img" />
                                    60 min
                                </span>
                                <span class="hero-tag"> 240 € </span>
                                <span class="hero-tag"> TTC </span>


                                
                                <a href="#" class="hero-subtag">reflexologiefaciale</a>
                                <a href="#" class="hero-subtag">carboxytherapie</a>
                                <a href="#" class="hero-subtag">biopeeling</a>
                                <a href="#" class="hero-subtag">bioled</a>
                                <a href="#" class="hero-subtag">cryotherapie</a>


                            </div>
                        </div>
                        <div class="widget">
                        <button class="maison__reserve-btn" type="submit">
                            <!-- <a href="https://cibleskincom.simplybook.it/v2/#book" target="_blank">JE RÉSERVE</a> -->
                            JE RÉSERVE
                        </button>
                    </div>
                </div>
                </div>
            </section>

            <section class="sion-main">
                <p class="hero-subtitle sion-subtitle">
                    Ce soin <span>anti-points noirs</span> et <span>anti-pores dilatés </span>est parfaitement adapté
                    aux
                    <span>peaux grasses </span>et
                    <span> aux teints ternes.</span> il
                    <span>hydrate, nettoie</span> et
                    <span>purifie </span>en profondeur.
                </p>
            </section>
            <!-- Added Swiper and Adjusted Alignments -->
            <section class="main__culte maison">
                <div class="maison__container">
                    <h2 class="maison__title">
                        Le Soin Seconde-Peau : le soin star de la Fashion-Week
                    </h2>
                    <div class="maison-culte__splide" role="group" aria-label="Rewiews gallery">

                        <button class="maison-swiper-button-prev splide__arrow maison__arrow_prev">
                            <img class="icon-arrow-prev" width="96" height="112"
                                src="assets/images/common-imgs/slider-arrow-big-left.svg" alt="" />
                        </button>
                        <button class="maison-swiper-button-next splide__arrow maison__arrow_next">
                            <img class="icon-arrow-next" width="96" height="112"
                                src="assets/images/common-imgs/slider-arrow-big-right.svg" alt="" />
                        </button>
                        <!-- Swiper -->
                        <div class="swiper swiperMaison">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="maison__splide-image culte-image" width="340" height="442"
                                        src="./assets/images/common-imgs/selebretes/sel-1.png" alt="Actices photo" />
                                    <p class="maison__fullname">Lily Collins</p>
                                    <p class="maison__descpip">Actrice britannico-américaine</p>
                                </div>
                                <div class="swiper-slide">
                                    <img class="maison__splide-image culte-image" width="340" height="442"
                                        src="./assets/images/common-imgs/selebretes/ca.png" alt="Actices photo" />
                                    <p class="maison__fullname">Camille Razat</p>
                                    <p class="maison__descpip">Actrice française</p>
                                </div>
                                <div class="swiper-slide">
                                    <img class="maison__splide-image culte-image" width="340" height="442"
                                        src="./assets/images/common-imgs/selebretes/parks.png" alt="Actices photo" />
                                    <p class="maison__fullname">Ashley Park</p>
                                    <p class="maison__descpip">Actrice américano-coréenne</p>
                                </div>
                                <div class="swiper-slide">
                                    <img class="maison__splide-image culte-image" width="340" height="442"
                                        src="./assets/images/common-imgs/selebretes/sel-1.png" alt="Actices photo" />
                                    <p class="maison__fullname">Lily Collins</p>
                                    <p class="maison__descpip">Actrice britannico-américaine</p>
                                </div>
                                <div class="swiper-slide">
                                    <img class="maison__splide-image culte-image" width="340" height="442"
                                        src="./assets/images/common-imgs/selebretes/ca.png" alt="Actices photo" />
                                    <p class="maison__fullname">Camille Razat</p>
                                    <p class="maison__descpip">Actrice française</p>
                                </div>
                                <div class="swiper-slide">
                                    <img class="maison__splide-image culte-image" width="340" height="442"
                                        src="./assets/images/common-imgs/selebretes/parks.png" alt="Actices photo" />
                                    <p class="maison__fullname">Ashley Park</p>
                                    <p class="maison__descpip">Actrice américano-coréenne</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- Added Swiper and Adjusted Alignments -->
            <section class="main__maison main__culte  maison press">
                <div class="maison__container">
                    <h2 class="maison__title">
                        La Maison de la Peau élue meilleur centre esthétique et anti-âge
                        par la presse internationale
                    </h2>
                    <div class="maison__splide maison-culte__splide">
                        <button class=" splide__arrow maison__arrow_prev maison-main-swiper-button-prev">
                            <img class="icon-arrow-prev" width="96" height="112"
                                src="assets/images/common-imgs/slider-arrow-big-left.svg" alt="" />
                        </button>
                        <button class=" splide__arrow maison__arrow_next maison-main-swiper-button-next">
                            <img class="icon-arrow-next" width="96" height="112"
                                src="assets/images/common-imgs/slider-arrow-big-right.svg" alt="" />
                        </button>
                        <!-- Swiper -->
                        <div class="swiper swiperMaisonMain">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463" src="assets/images/common-imgs/maison/maison1.jpg"
                    alt="Artboart with review and rate" />
                  <p class="maison__quote">
                    “Le soin anti-âge le plus high-tech d’Europe”
                  </p>
                                    <p class="maison__varanty">VANITY FAIR</p>
                                </div>
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463" src="assets/images/common-imgs/maison/maison2.jpg"
                    alt="Artboart with review and rate" />
                  <p class="maison__quote">
                    “Best place for a facial in Paris”
                  </p>
                  <p class="maison__varanty">Forbes</p>
                                </div>
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463" src="assets/images/common-imgs/maison/maison3.jpg"
                    alt="Artboart with review and rate" />
                  <p class="maison__quote">
                  “L’adresse beauté préférée de Lily J. Collins”
                  </p>
                  <p class="maison__varanty">VOGUE</p>
                                </div>
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463"
                                src="assets/images/common-imgs/maison/maison4.jpg"
                                alt="Artboart with review and rate" />
                            <p class="maison__quote">
                                “Le coup de coeur de la rédaction Beauté”
                            </p>
                            <p class="maison__varanty">Marie-Claire</p>
                                </div>
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463"
                                src="assets/images/common-imgs/maison/maison5.jpg"
                                alt="Artboart with review and rate" />
                            <p class="maison__quote">
                                “Le lieu pour effacer les traces du jet-lag sur votre visage”
                            </p>
                            <p class="maison__varanty">En Vols</p>
                                </div>
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463"
                                src="assets/images/common-imgs/maison/maison6.jpg"
                                alt="Artboart with review and rate" />
                            <p class="maison__quote">
                                “The French capital is dazzling with new retail concepts”
                            </p>
                            <p class="maison__varanty">WWD
                            </p>
                                </div>
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463"
                                src="assets/images/common-imgs/maison/maison7.jpg"
                                alt="Artboart with review and rate" />
                            <p class="maison__quote">
                                “Le Soin Renew-Cellular : pour transformer la texture de sa peau”
                            </p>
                            <p class="maison__varanty">Elle
                            </p>
                                </div>
                                <div class="swiper-slide">
                                <img class="maison__splide-image" width="312" height="463"
                                src="assets/images/common-imgs/maison/maison8.jpg"
                                alt="Artboart with review and rate" />
                                <p class="maison__quote">
                                “Le Soin Seconde-Peau : le soin le plus calibré à la Maison de la Peau, le cocon
                                parisien où se refaire une santé de la peau”
                            </p>
                            <p class="maison__varanty">VOGUE
                            </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="technique-splide">
                <div class="splide__arrows">
                    <div class="swiper-button-next splide__arrow splide__arrow--next technique-arrow-next">
                        <img class="icon-arrow-next" width="96" height="112"
                            src="assets/images/common-imgs/slider-arrow-big-right.svg" alt="" />
                    </div>
                    <div class="swiper-button-prev splide__arrow splide__arrow--prev technique-arrow-prev">
                        <img class="icon-arrow-prev" width="96" height="112"
                            src="assets/images/common-imgs/slider-arrow-big-left.svg" alt="" />
                    </div>
                </div>

                <h2 class="technique-subtitle">
                    Les techniques issues de la médecine esthétique utilisées dans notre
                    soin
                </h2>
                <!-- Swiper -->
                <div class="swiper mySwiper splide__track">
                    <div class="swiper-wrapper splide__list soins-justify-content">
                        <div class="swiper-slide splide__slide soins-six-cards-section">
                            <img class="technique-img technique-img-1" src="assets/images/common-imgs/img-skincares/v/2.jpg"
                                alt="technique 1" />
                            <span class="technique-span">Les techniques de réflexologie faciale Cible Skin</span>
                        </div>
                        <div class="swiper-slide splide__slide soins-six-cards-section">
                            <img class="technique-img" src="assets/images/common-imgs/img-skincares/v/6.jpg"
                                alt="technique 3" />
                            <span class="technique-span">Le technique de la cryothérapie</span>
                        </div>
                        <div class="swiper-slide splide__slide soins-six-cards-section">
                            <img class="technique-img" src="assets/images/common-imgs/steps/3.jpg"
                                alt="technique 4" />
                            <span class="technique-span">L’hydradermabrasion </span>
                        </div>
                        <div class="swiper-slide splide__slide soins-six-cards-section">
                            <img class="technique-img technique-img-5" src="assets/images/common-imgs/steps/7.jpg"
                                alt="technique 5" />
                            <span class="technique-span">La technique de régénération cellulaire par Bio-Led</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="steps-splide steps__container">
                <div class="splide__arrows">
                    <div class="step-swiper-button-prev splide__arrow splide__arrow--prev">
                        <img src="assets/images/img-secondepeau/img/technique/next.svg" alt="" />
                    </div>
                    <div class="step-swiper-button-next splide__arrow splide__arrow--next">
                        <img src="assets/images/img-secondepeau/img/technique/next.svg" alt="" />
                    </div>
                </div>
                <h2 class="technique-subtitle">Les 7 étapes du Soin Seconde Peau</h2>
                <!-- Swiper -->
                <div class="swiper mySwiperSteps splide__track">
                    <div class="swiper-wrapper splide__list">
                        <div class="swiper-slide splide__slide steps-card">
                            <img class="steps-img" src="assets/images/img-soincellular/img/steps/1.jpg" alt="" />
                            <p class="steps-title">Étape 1</p>
                            <p class="steps-subtitle">Le diagnostic de peau</p>
                            <p class="steps-content">
                                Votre expert Cible Skin établit un diagnostic de peau en
                                s’appuyant sur les dernières technologies
                                <span class="elipsis">...</span>
                                <span class="morePara">
                                    d’analyse brevetées afin de définir avec vous le soin le plus adapté aux
                                    besoins de votre peau.
                                    Au fur et à mesure de vos séances, l’expert réalisera ce même diagnostic permettant
                                    de
                                    constater l’amélioration de la qualité de la peau et d’adapter les prochains soins
                                    selon les
                                    effets recherchés.
                                    <br />
                                </span>

                                <br />
                                <u class="readMoreBtn">En savoir plus</u>
                            </p>
                        </div>

                        <div class="swiper-slide splide__slide steps-card">
                            <img class="steps-img" src="assets/images/common-imgs/steps/2.png" alt="" />
                            <p class="steps-title">Étape 2</p>
                            <p class="steps-subtitle">
                                Le double nettoyage & la préparation de la peau avec l’Essence
                                Activatrice
                            </p>
                            <p class="steps-content">
                                C’est l’étape de nettoyage profond du visage, les toxines
                                logées dans les pores sont retirées, le pH
                                <span class="elipsis">...</span>
                                <span class="morePara">
                                    de la peau est équilibré. La peau est prête à recevoir tous les bénéfices des
                                    prochains soins.
                                    <br />
                                </span>

                                <br />
                                <u class="readMoreBtn">En savoir plus</u>
                            </p>
                        </div>
                        <div class="swiper-slide splide__slide steps-card">
                            <img class="steps-img" src="assets/images/common-imgs/steps/3.jpg" alt="" />
                            <p class="steps-title">Étape 3</p>
                            <p class="steps-subtitle">L’exfoliation mécanique par l’hydradermabrasion</p>
                            <p class="steps-content">
                                L’hydradermabrasion couplée à l’infusion d’Acide Lactique
                                et d’Extrait d’Algues,permet
                                <span class="elipsis">...</span>
                                <span class="morePara">
                                    un nettoyage en profondeur de la couche superficielle de la peau. Les cellules
                                    mortes et les
                                    impuretés obstruant l’épiderme sont exfoliées.
                                    <br />
                                </span>

                                <br />
                                <u class="readMoreBtn">En savoir plus</u>
                            </p>
                        </div>
                        <div class="swiper-slide splide__slide steps-card">
                            <img class="steps-img" src="assets/images/img-secondepeau/img/steps/4.png" alt="" />
                            <p class="steps-title">Étape 4</p>
                            <p class="steps-subtitle">
                                Le micro-peeling doux & l’extraction mécanique
                            </p>
                            <p class="steps-content">
                                Grâce au micro-peeling associant de l’Acide Salicylique et Glycolique, les pores se
                                <span class="elipsis">...</span>
                                <span class="morePara">
                                    dilatent pour venir libérer les impuretés les plus profondes, concentrées sur la
                                    zone T (nez,
                                    menton et front), responsables des points noirs et de l’excès de sébum. Elles sont
                                    ensuite
                                    extraites et aspirées : les pores de la peau sont ainsi parfaitement assainis, la
                                    texture de la
                                    peau devient visiblement plus lisse.
                                    <br />
                                </span>

                                <br />
                                <u class="readMoreBtn">En savoir plus</u>
                            </p>
                        </div>
                        <div class="swiper-slide splide__slide steps-card">
                            <img class="steps-img" src="assets/images/common-imgs/signature/1.png" alt="" />
                            <p class="steps-title">Étape 5</p>
                            <p class="steps-subtitle">
                                Infusion d’actifs avec le Sérum Seconde-Peau
                            </p>
                            <p class="steps-content">
                                Le Sérum Seconde-Peau vient purifier et matifier la peau grâce à l’Extrait de Laminaire
                                <span class="elipsis">...</span>
                                <span class="morePara">
                                    Sucrée et au Sulfate de Zinc, tout en apportant une hydratation optimale procurée
                                    par
                                    l’Extrait de Figuier de Barbarie et par la Niacinamide à l’action réparatrice.
                                    Une solution d’actifs antioxydants est infusée simultanément pour une action
                                    anti-âge
                                    préventive et protégeant la peau face aux agressions extérieures.
                                    <br />
                                </span>

                                <br />
                                <u class="readMoreBtn">En savoir plus</u>
                            </p>
                        </div>
                        <div class="swiper-slide splide__slide steps-card">
                            <img class="steps-img" src="assets/images/common-imgs/img-skincares/h/6.jpg" alt="" />
                            <p class="steps-title">Étape 6</p>
                            <p class="steps-subtitle">
                                Le Masque Polyactifs & la Cryothérapie
                            </p>
                            <p class="steps-content">
                                Cet ultime masque, à base de Collagène d’Acacia, de Niacinamide et d’une Combinaison
                                <span class="elipsis">...</span>
                                <span class="morePara">
                                    de 4 types d’Acide Hyaluronique, vient lisser, repulper et hydrater profondément la
                                    peau.
                                    La cryothérapie vient décupler l’effet raffermissant et resserrer les pores pour
                                    conserver
                                    tous les actifs infusés durant le soin.
                                    <br />
                                </span>

                                <br />
                                <u class="readMoreBtn">En savoir plus</u>
                            </p>
                        </div>
                        <div class="swiper-slide splide__slide steps-card">
                            <img class="steps-img" src="assets/images/common-imgs/steps/7.jpg" alt="" />
                            <p class="steps-title">Étape 7</p>
                            <p class="steps-subtitle">
                                La Bio-Led
                            </p>
                            <p class="steps-content">
                                L’émission et la pénétration d’une synergie de lumières concentrées viennent parfaire
                                les
                                <span class="elipsis">...</span>
                                <span class="morePara">
                                    effets du soins et stimuler le renouvellement des cellules de la peau.
                                    <br />
                                </span>

                                <br />
                                <u class="readMoreBtn">En savoir plus</u>
                            </p>
                        </div>
                    </div>
                </div>

            </section>

            <section class="main__selebrites selebrites">
                <div class="selebrites__container">
                    <h2 class="selebrites__title">
                        Les célébrités en ont fait leur seconde Maison
                    </h2>
                    <div class="splide selebrites__slider" role="group" aria-label="Gallery image">
                        <div class="splide__arrows">
                            <button role="move to prev slide"
                                class="splide__arrow splide__arrow--prev selebrites__arrow-prev">
                                Prev
                            </button>
                            <button role="move to next slide"
                                class="splide__arrow splide__arrow--next selebrites__arrow-next">
                                <img class="icon-arrow-next icon-arrow-next_big" width="96" height="112"
                                    src="assets/images/common-imgs/selebretes/component.svg" alt="" />
                            </button>
                        </div>
                        <img src="assets/images/common-imgs/signature/cellphone.png" class="selebrites__phone"
                            width="255" height="527" alt="" />
                        <div class="captions">
                            <p class="selebrites-caption1 selebrites-caption">
                                <b>cibleskin.paris.</b> <a href="#"><u>@lilyjcollins</u></a> choisit Cible Skin comme
                                son lieu
                                skincare
                                préféré <span style="color:red;">❤</span> <a href="#">@voguefrance</a>...
                            </p>
                            <p class="selebrites-caption2 selebrites-caption">
                                Le secret ultime de <a href="#"><u>@camillerazat </u></a> pour prendre soin de sa peau ?
                                Elle vous emmène ...
                            </p>
                            <p class="selebrites-caption3 selebrites-caption">
                                <b>cibleskin.paris.</b> Very pleased to welcome <a href="#"><u>@ashleyparklady</u></a>
                                from <a href="#"><u>@emilyinparis</u></a> with our founders ...

                            </p>
                            <p class="selebrites-caption4 selebrites-caption">
                                <a href="#"><u>@alexandralamyofficiel</u></a> at La Maison de la Peau ! ✨
                                #cibleskin #cibleskinparis #skin #paris
                            </p>
                            <p class="selebrites-caption5 selebrites-caption">
                                <a href="#"><u>@cocorocha</u></a> <span style="color:rgb(235, 225, 225);">❤</span> Cible
                                Skin
                                #cibleskin #cibleskinparis #paris #pfw #skin #supermodel
                            </p>
                        </div>
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide selebrites__slide selebrites__slide1">
                                    <img class="selebrites__image" width="232" height="237"
                                        src="assets/images/common-imgs/selebretes/sel-1.jpg"
                                        alt="Lily J. Collins photo" />
                                </li>
                                <li class="splide__slide selebrites__slide selebrites__slide2">
                                    <img class="selebrites__image" width="237" height="237"
                                        src="assets/images/common-imgs/selebretes/sel-2.jpg"
                                        alt="Lily J. Collins photo" />
                                </li>
                                <li class="splide__slide selebrites__slide selebrites__slide3">
                                    <img class="selebrites__image" width="232" height="237"
                                        src="assets/images/common-imgs/selebretes/sel-3.jpg"
                                        alt="Lily J. Collins photo" />
                                </li>
                                <li class="splide__slide selebrites__slide selebrites__slide4">
                                    <img class="selebrites__image" width="232" height="237"
                                        src="assets/images/common-imgs/selebretes/sel-4.jpg"
                                        alt="Lily J. Collins photo" />
                                </li>
                                <li class="splide__slide selebrites__slide selebrites__slide5">
                                    <img class="selebrites__image" width="232" height="237"
                                        src="assets/images/common-imgs/selebretes/sel-5.jpg"
                                        alt="Lily J. Collins photo" />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="selebrites__name selebrites__name1">Lily J. Collins </p>
                    <p class="selebrites__name selebrites__name2">Camille Razat</p>
                    <p class="selebrites__name selebrites__name3">Ashley Park</p>
                    <p class="selebrites__name selebrites__name4">Alexandra Lamy</p>
                    <p class="selebrites__name selebrites__name5">Coco Rocha</p>
                </div>
            </section>

            <section class="main__google main__culte maison google">
                <div class="google__container">
                    <div class="google__rate-block">
                        <h2 class="google__title">460 Avis Google</h2>
                        <div class="google__rating">
                            <p class="google__number-rating">4.9/5</p>
                            <div class="stars__row">
                                <img width="32" height="32" src="assets/images/common-imgs/google/star.svg"
                                    alt="rating star yellow icon" />
                                <img width="32" height="32" src="assets/images/common-imgs/google/star.svg"
                                    alt="rating star yellow icon" />
                                <img width="32" height="32" src="assets/images/common-imgs/google/star.svg"
                                    alt="rating star yellow icon" />
                                <img width="32" height="32" src="assets/images/common-imgs/google/star.svg"
                                    alt="rating star yellow icon" />
                                <img width="32" height="32" src="assets/images/common-imgs/google/star.svg"
                                    alt="rating star yellow icon" />
                            </div>
                        </div>
                        <a target="_blank" href="https://www.google.com/maps/place/Cible+Skin/@48.8681935,2.3018849,17z/data=!3m1!5s0x47e66fc33cd093ef:0x2b4cd796cc2f82cb!4m8!3m7!1s0x47e66fc305255555:0xf7472fb96ded06ce!8m2!3d48.8681935!4d2.3040736!9m1!1b1!16s%2Fg%2F11cscc3fcl" class="google__text">Je souhaite lire d’autres avis</a>
                    </div>
                    <div class="maison__splide maison-culte__splide">
                        <button class=" splide__arrow maison__arrow_prev google-main-swiper-button-prev">
                            <img class="icon-arrow-prev" width="96" height="112"
                                src="assets/images/common-imgs/slider-arrow-big-left.svg" alt="" />
                        </button>
                        <button class=" splide__arrow maison__arrow_next google-main-swiper-button-next">
                            <img class="icon-arrow-next" width="96" height="112"
                                src="assets/images/common-imgs/slider-arrow-big-right.svg" alt="" />
                        </button>
                        <!-- Swiper -->
                        <div class="swiper swiperGoogle">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart1.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart2.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart3.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart4.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart5.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart6.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart7.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="google__splide-image" width="429" height="429"
                                        src="assets/images/common-imgs/google/artboart8.jpg"
                                        alt="Artboart with review and rate" />
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
            <section class="main__signature signature">
                <div class="signature__container">
                    <h2 class="signature__title">Découvrez nos soins signature</h2>
                    <div class="signature__cards">
                        <div class="signature__card card-item card-item_2">
                        <a href="<?= Page::SkincareCulte->url() ?>">
                            <p class="card-item__title">Le Soin Culte</p>
                            <p class="card-item__text">
                                Le soin <span class="span-red"> illuminateur</span> et
                                <span class="span-red"> anti-taches miraculeux</span>
                            </p>
                            <img class="card-item__image" width="350" height="380"
                                src="assets/images/common-imgs/signature/card-1-image.jpg"
                                alt="a women relax on our procedures" />
                            <p class="card-item__description">
                                L’ultime <span class="span-red">soin</span> détox pour un véritable coup
                                <span class="span-red">d’éclat</span> Ce soin resserre les
                                pores dilatés et
                                <span class="span-red">unifie le teint </span>par son action anti-taches.
                            </p>
                            <a href="<?= Page::SkincareCulte->url() ?>" class="card-item__btn-link">JE DÉCOUVRE</a></a>
                        </div>
                        <div class="signature__card card-item card-item_3">
                            <a href="<?= Page::SkincareRenewCellular->url() ?>">
                                <p class=" card-item__title">Le Soin <br class="lg-break"> Renew Cellular</p>
                            <p class="card-item__text">
                                Le soin <span class="span-red">anti-âge</span> et
                                <span class="span-red">anti-rides</span> révolutionnaire
                            </p>
                            <img class="card-item__image" width="350" height="380"
                                    src="assets/images/common-imgs/img-skincares/h/3.jpg"
                                alt="a women relax on our procedures" />
                            <p class="card-item__description">
                                Ce soin
                                <span class="span-red">anti-âge, anti-rides</span> haute
                                performance est spécialement adapté aux
                                <span class="span-red">peaux matures</span>. Il vient lifter,
                                <span class="span-red">raffermir</span> et
                                <span class="span-red">repulper</span> la peau.
                            </p>
                            <a href="<?= Page::SkincareRenewCellular->url() ?>" class="card-item__btn-link">JE
                                DÉCOUVRE</a></a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="reservation">
                <div class="container">
                    <div class="reser-inner">
                        <div class="resertext">
                            <h3>LE SOIN CULTE</h3>
                            <h5>Peau lumineuse, tonifiée, réoxygénée, teint unifié</h5>
                        </div>
                        <div class="col">
                            <div class="clockmin">
                            <img width="16" height="16" src="assets/images/img-secondepeau/img/hero/clock.svg" alt="60 min" />
                            <span>60 min</span>
                            </div>
                            <a href='' class="maison__reserve-btn-bottom">JE RÉSERVE MON SOIN</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        

        <?php require "../include/html/footer.php"; ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="./scripts/complementary/skincare.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script type='module' src='scripts/public.js?<?= filemtime("scripts/public.js") ?>'></script>
    <script src="//widget.simplybook.it/v2/widget/widget.js"></script>
    <script type='module'>
    // button widget methods
    SimplybookWidget.prototype.addButton = function() {
        this.addButtonWidgetStyles();

        var btn;
        var button_custom_classs = document.querySelectorAll(
            this.options.button_custom_class
        );
        for (const button_custom_class in button_custom_classs) {
            if (this.options.button_custom_class) {
                btn = button_custom_classs
            } else {
                btn = this.getButtonNode();
            }

            var instance = this;
            btn.forEach(el => el.addEventListener("click", function() {
                instance.showPopupFrame("book");
            }));

            if (!this.options.button_custom_class) {
                if (!document.body) {
                    document
                        .getElementsByTagName("html")[0]
                        .appendChild(document.createElement("body"));
                }
                document.body.appendChild(btn);
            }
        }
    };

    var widget = new SimplybookWidget({
        widget_type: "button",
        url: "https:\/\/cibleskincom.simplybook.it",
        theme: "air",
        theme_settings: {
            timeline_hide_unavailable: "1",
            hide_past_days: "0",
            timeline_show_end_time: "0",
            timeline_modern_display: "as_slots",
            sb_base_color: "#6c1401",
            display_item_mode: "block",
            booking_nav_bg_color: "#d1e9c6",
            body_bg_color: "#f2f2f2",
            sb_review_image: "",
            dark_font_color: "#6c1401",
            light_font_color: "#ffffff",
            sb_company_label_color: "#ffffff",
            hide_img_mode: "0",
            show_sidebar: "1",
            sb_busy: "#6c1401",
            sb_available: "#E2E2E2",
        },
        timeline: "modern",
        datepicker: "inline_datepicker",
        is_rtl: false,
        app_config: {
            clear_session: 1,
            allow_switch_to_ada: 0,
            predefined: {
                service: "5",
                // client: {
                //   name: "Mary",
                //   email: "mary@gmail.com",
                // phone: "+1234567890",
                // },
            },
        },
        button_custom_class: ".maison__reserve-btn",
        button_custom_class: ".maison__reserve-btn-bottom",
    });

    //readmore

    const readmoreBtns = document.querySelectorAll('.step-readmore-btn')

    for (const readmoreBtn of readmoreBtns) {
        readmoreBtn.addEventListener('click', function(e) {
            const stepDetail = this.closest('.step').querySelector('.step-detail');
            stepDetail.classList.toggle('show-more');
            if (readmoreBtn.innerHTML === "En savoir plus") {
                readmoreBtn.innerHTML = "Voir moins"
            } else {
                readmoreBtn.innerHTML = "En savoir plus"
            }
        })
    }

    const engagementSlidesContainer = document.querySelector("#engagement .slides-container");
    const engagementSlide = document.querySelector("#engagement .slide");
    const engagementNextButton = document.querySelector("#engagement .arrow-right");
    const engagementPrevButton = document.querySelector("#engagement .arrow-left");

    const laMaisonSlidesContainer = document.querySelector("#la-maison .slides-container");
    const laMaisonSlide = document.querySelector("#la-maison .slide");
    const laMaisonNextButton = document.querySelector("#la-maison .arrow-right");
    const laMaisonPrevButton = document.querySelector("#la-maison .arrow-left");

    const cosmeticSlidesContainer = document.querySelector("#cosmetic .slides-container");
    const cosmeticSlide = document.querySelector("#cosmetic .slide");
    const cosmeticNextButton = document.querySelector("#cosmetic .arrow-right");
    const cosmeticPrevButton = document.querySelector("#cosmetic .arrow-left");

            /*const slider = (slidesContainer, slide, nextButton, prevButton) => {
            var slideWidth = slide.getBoundingClientRect().width
            nextButton.addEventListener("click", () => {
                slidesContainer.scrollLeft += slideWidth;
            })
            prevButton.addEventListener("click", () => {
                slidesContainer.scrollLeft -= slideWidth;
            })


       slider(engagementSlidesContainer, engagementSlide, engagementNextButton, engagementPrevButton);
        slider(laMaisonSlidesContainer, laMaisonSlide, laMaisonNextButton, laMaisonPrevButton);
        }*/

        const breathingBtns = document.querySelectorAll('.breathing-btn')
        const breathingBtnArray = Array.from(breathingBtns)
       // let slideWidth = cosmeticSlide.getBoundingClientRect().width;
       /* cosmeticNextButton.addEventListener("click", () => {
            cosmeticSlidesContainer.scrollLeft += slideWidth;
        })
        cosmeticPrevButton.addEventListener("click", () => {
            cosmeticSlidesContainer.scrollLeft -= slideWidth;
        })

        for (const breathingBtn of breathingBtns) {
            const cosmeticList = document.querySelector('#cosmetic .list-wrapper')
            const closeListBtn = document.querySelector('#cosmetic .close-btn')

            breathingBtn.addEventListener('click', function (e) {
                const currentBtn = document.querySelector('#cosmetic .current-btn')
                const currentIndex = breathingBtnArray.indexOf(currentBtn)
                const targetBtn = e.target
                const targetIndex = breathingBtnArray.indexOf(e.target)

                cosmeticList.style.display = 'block';
                currentBtn.classList.remove('current-btn')
                targetBtn.classList.add('current-btn')
                slideWidth = cosmeticSlide.getBoundingClientRect().width;
                const moveToSlide = (slidesContainer, slideWidth) => {
                    slidesContainer.scrollLeft += slideWidth;
                }

                if (targetIndex == currentIndex) {
                    moveToSlide(cosmeticSlidesContainer, slideWidth * 0)
                } else if (targetIndex > currentIndex) {
                    moveToSlide(cosmeticSlidesContainer, slideWidth * targetIndex)
                } else if (targetIndex < currentIndex && targetIndex != 0) {
                    moveToSlide(cosmeticSlidesContainer, slideWidth * -targetIndex)
                } else {
                    moveToSlide(cosmeticSlidesContainer, slideWidth * -currentIndex)
                }
                return;
            })
            closeListBtn.addEventListener('click', function () {
                cosmeticList.style.display = 'none';
            })
        }*/
    </script>
</body>

</html>