<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';

$pcs = pdo()->query('SELECT id, name, image_url, price FROM pcs ORDER BY id')->fetchAll();
?>
<u>
<h2>NOUVEAUTÉS</h2>
</u>
<h3>Nos PC</h3>
<section class="grid">
<?php foreach ($pcs as $pc): ?>
  <article class="card">
    <img src="<?= e($pc['image_url']) ?>" alt="Photo de <?= e($pc['name']) ?>">
    <div class="p">
      <h3><?= e($pc['name']) ?></h3>
      <p class="price"><?= number_format((float)$pc['price'], 2, ',', ' ') . ' ' . CURRENCY ?></p>
      <details>
        <summary>Voir les composants</summary>
        <ul>
          <?php
            $stmt = pdo()->prepare('
              SELECT c.name
              FROM pc_components pc
              JOIN components c ON c.id = pc.component_id
              WHERE pc.pc_id = ?
            ');
            $stmt->execute([(int)$pc['id']]);
            foreach ($stmt->fetchAll() as $row): ?>
              <li><?= e($row['name']) ?></li>
          <?php endforeach; ?>
        </ul>
      </details>
    </div>
  </article>
<?php endforeach; ?>
</section>
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
</style>
<u>
<h2>Actualités</h2>
</u>
<div class="body">
<h3>-Lancement de notre nouveau site web</h3>
<p>
  Nous sommes ravis de vous annoncer le lancement de notre nouveau site web !  
  Découvrez nos services, nos produits et restez informé des dernières actualités de TechSolutions.
</p>
<h3>-Don de matériel informatique</h3>
<p>
TechSolutions ayant récemment actualisé son parc informatique. Afin de ne pas gaspiller de matériel encore fonctionnel, l'entreprise a décidé de faire don de ses anciens équipement à une école locale ainsi qu'à des associations caritatives dans le besoin.
<h3>-Augmentation des effectifs de l'entreprise</h3>
<p>
  Grâce à l'expension de l'entreprise et afin de mieux répondre à vos besoins, TechSolutions a le plaisir d'annoncer l'augmentation de ses effectifs avec le recrutement de 10 nouveaux collaborateurs dans les domaines du développement, du support client et du marketing.
</p>
  <h3>-Ouverture d'une nouvelle agence</h3>
<p>
  TechSolutions ouvre une nouvelle agence à Limoges ! Nous sommes donc désormais présents à Brive-la-Gaillarde et Limoges pour mieux vous servir.
  Venez nous rendre visite au 5 avenue de la République pour découvrir nos offres exclusives et bénéficier de conseils personnalisés.
</p>
<?php require_once __DIR__ . '/includes/footer.php'; ?>