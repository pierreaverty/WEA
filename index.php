<!DOCTYPE html>
<html lang="fr">
<?php
require ("assets/function.php");
head('home' ,'front');
?>


<body>

    <?php
        $stmt_param = $db -> prepare("SELECT titre_site, url_logo, titre_home_presentation, home_presentation FROM wea_parametre");
        $stmt_param -> execute();
        $data_param = $stmt_param -> fetch();

        $stmt_img = $db -> prepare("SELECT * FROM wea_image WHERE accueil=1");
        $stmt_img -> execute();
    ?>

    <main>
        <div class="container">
            <nav class="nav-menu">
                <div class="nav-menu-content">
                    <a href="" class="page-actuelle">Home</a>
                    <a href="news.php" class="link">News</a>
                    <a href="contact.php" class="link">Contact</a>
                    <a href="mentions-legales.php" class="link">Mentions légales</a>
                </div>
            </nav>
            <header>
                <div class="header-content">
                <?php
                if( $data_param['url_logo'] !== NULL AND $data_param['titre_site'] !== NULL) {
                     echo('<img src="'.$data_param['url_logo'].'" alt="logo" class="logo">');
                     echo('<h1 class="titre-home-presentation-left title">'.$data_param['titre_site'].'</h1>');
                } else if( $data_param['url_logo'] === NULL ) {
                      echo('<h1 class="titre-home-presentation-center title">'.$data_param['titre_site'].'</h1>');
                } else if ($data_param['titre_site'] === NULL) {
                    echo('<img src="'.$data_param['url_logo'].'" alt="logo" class="logo">');
                };
                     ?>
                </div>
            </header>
            <nav class="nav-lettre-container">
                <div class="nav-lettre nav-lettre-content-1">
                    <a href="lettre.php?lettre=a" class="lettre link">A</a>
                    <a href="lettre.php?lettre=b" class="lettre link">B</a>
                    <a href="lettre.php?lettre=c" class="lettre link">C</a>
                    <a href="lettre.php?lettre=d" class="lettre link">D</a>
                    <a href="lettre.php?lettre=e" class="lettre link">E</a>
                    <a href="lettre.php?lettre=f" class="lettre link">F</a>
                    <a href="lettre.php?lettre=g" class="lettre link">G</a>
                    <a href="lettre.php?lettre=h" class="lettre link">H</a>
                    <a href="lettre.php?lettre=i" class="lettre link">I</a>
                    <a href="lettre.php?lettre=j" class="lettre link">J</a>
                    <a href="lettre.php?lettre=k" class="lettre link">K</a>
                    <a href="lettre.php?lettre=l" class="lettre link">L</a>
                    <a href="lettre.php?lettre=m" class="lettre link">M</a>
                    <a href="lettre.php?lettre=n" class="lettre link">N</a>
                    <a href="lettre.php?lettre=o" class="lettre link">O</a>
                    <a href="lettre.php?lettre=p" class="lettre link">P</a>
                    <a href="lettre.php?lettre=q" class="lettre link">Q</a>
                    <a href="lettre.php?lettre=r" class="lettre link">R</a>
                    <a href="lettre.php?lettre=s" class="lettre link">S</a>
                    <a href="lettre.php?lettre=t" class="lettre link">T</a>
                    <a href="lettre.php?lettre=u" class="lettre link">U</a>
                    <a href="lettre.php?lettre=v" class="lettre link">V</a>
                    <a href="lettre.php?lettre=w" class="lettre link">W</a>
                </div>
                <div class="nav-lettre nav-lettre-content-2">
                    <a href="lettre.php?lettre=x" class="lettre link">X</a>
                    <a href="lettre.php?lettre=y" class="lettre link">Y</a>
                    <a href="lettre.php?lettre=z" class="lettre link">Z</a>
                </div>
            </nav>
            <section class="img-container">
                <div class="img-content">
                    <?php
                        while ($data_img = $stmt_img -> fetch()) {
                            echo ('
                            <div class="home-img-container">
                                <img class="img" alt="'.$data_img['alt'].'" src="'.$data_img['url_image'].'">
                            </div>
                            ');
                        }
                    
                    ?>
                </div>
            </section>
            <div class="home-presentation-container">
                <div class="home-presentation-content">
                    <?php
                    if ($data_param['titre_home_presentation'] !== NULL) {
                        echo('<h3 class="subtitle home-presentation-subtitle">'.$data_param['titre_home_presentation'].'</h3>');
                    } 
                    if ($data_param['home_presentation'] !== NULL) {
                        echo('<span class="text home-presentation-text">
                                '.$data_param['home_presentation'].'
                              </span>');
                    }
                    ?>
                </div>
            </div>
            <?php footer(); ?>

        </div>
    </main>

</body>
</html>