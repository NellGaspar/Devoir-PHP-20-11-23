<?php get_header(); ?>



  <h1>Curriculum Vitae</h1>
  <h2>Thomas Martin</h2>

  <img src="assets/img/thomas.jpeg" alt="Thomas Martin">

  <h3>Informations Personnelles</h3>
  <ul>
    <li><strong>Nom :</strong> Martin</li>
    <li><strong>Prénom :</strong> Thomas</li>
    <li><strong>Date de Naissance :</strong> 15 mars 1992 (31 ans)</li>
    <li><address><strong>Adresse :</strong> 456, Avenue Virtuelle, 1000 Bruxelles, Belgique</address></li>
    <li><strong>Téléphone :</strong> <a href="tel:+32 2 34 56 78">+32 2 34 56 78</a></li>
    <li><strong>Email :</strong> <a href="mailto:thomas.martin@email.com">thomas.martin@email.com</a></li>
  </ul>
  
<!-- FORMATIONS -->

<h3>Formations</h3>
<ul>
<?php
$formationsList = new WP_Query([
    'post_type' => 'formations',
    'posts_per_page' => -1
]);
while ( $formationsList->have_posts() ) : $formationsList->the_post();
    $start_date = get_post_meta(get_the_ID(), 'start_date', true);
    $end_date = get_post_meta(get_the_ID(), 'end_date', true);
    ?>
    <li>
        <?php if($start_date && $end_date): ?>
            <?php echo $start_date; ?> - <?php echo $end_date; ?> : 
        <?php endif; ?>
        <?php the_title(); ?>
    </li>
<?php endwhile; ?>
</ul>

 


<!-- EXPÉRIENCES PROFESSIONNELLES -->
<h3>Expériences Professionnelles</h3>
<ul>
<?php
$expproList = new WP_Query([
    'post_type' => 'exppro',
    'posts_per_page' => -1
]);

while ( $expproList->have_posts() ) : $expproList->the_post();
    $start_date = get_post_meta(get_the_ID(), 'start_date', true);
    $end_date = get_post_meta(get_the_ID(), 'end_date', true);
    ?>
    <li>
        <?php if($start_date && $end_date): ?>
            <?php echo $start_date; ?> - <?php echo $end_date; ?> : 
        <?php endif; ?>
                <h4><?php the_title(); ?> </h4>
                    <?php the_content(); ?>
    </li>
<?php endwhile; ?>
</ul>


  
 

  
<!-- COMPÉTENCES-->
  <?php
    $competencesList = new WP_Query([
        'post_type' => 'competences',
        'posts_per_page' => -1
    ]);
?>
<?php if ($competencesList->have_posts()): ?>
    <h3>Compétences</h3>
    <ul>
        <?php while ($competencesList->have_posts()): $competencesList->the_post(); ?>
            <li>
                <?php the_title(); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>


  <!-- LANGUES -->
  <?php
    $languesList = new WP_Query([
        'post_type' => 'langues',
        'posts_per_page' => -1
    ]);
?>
<?php if ($languesList->have_posts()): ?>
    <h3>Langues</h3>
    <ul>
        <?php while ($languesList->have_posts()): $languesList->the_post(); ?>
            <li>
                <?php the_title(); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>

  
   <!-- CENTRES D'INTÉRÊTS -->
   <?php
    $centreinterList = new WP_Query([
        'post_type' => 'centreinter',
        'posts_per_page' => -1
    ]);
?>
<?php if ($centreinterList->have_posts()): ?>
    <h3>Centres d'Intérêt</h3>
    <ul>
        <?php while ($centreinterList->have_posts()): $centreinterList->the_post(); ?>
            <li>
                <?php the_title(); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
  

<?php get_footer(); ?>
