<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';
?>

<html>
  <header>
    <h1>Bienvenue chez TechSolutions</h1>
  </header>

  <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        header {
            background: #1e293b;
            color: #fff;
            padding: 1px;
            text-align: center;
        }
        .body {
            width: 80%;
            margin: 30px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
        h1{
            color: #ffffffff;
        }
        h2 {
            color: #1e293b;
        }
        p {
            line-height: 1.6;
        }
    </style>
<div class="body">
    <h2>Présentation de l'entreprise</h2>
    <p>
        <strong>TechSolutions</strong> est une entreprise spécialisée dans les <strong>services informatiques</strong>.  
        Située au <strong>12 rue des Innovateurs, 19100 Brive-la-Gaillarde</strong>, elle accompagne ses clients dans la mise en place de solutions technologiques 
        modernes, performantes et sécurisées.
    </p>
    <p>
        Notre équipe d'experts propose une large gamme de services et saura <strong>vous conseiller au mieux</strong> selon vos besoins. De l'<strong>assemblage de votre pc</strong>, 
        l'<strong>installation de systèmes et logiciels</strong> jusqu'à la <strong>maintenance de votre matériel informatique</strong>, nous sommes là pour vous aider.
    </p>

    <p>
        Nous sommes également fiers de notre <strong>culture inclusive</strong>.  
        TechSolutions met un point d’honneur à accueillir et soutenir les <strong>personnes en situation de handicap</strong>,  
        en adaptant les postes de travail et l’environnement professionnel afin de répondre au mieux à leurs besoins.
    </p>
</div>
</body>
</html>
<?php require_once __DIR__ . '/includes/footer.php'; ?>