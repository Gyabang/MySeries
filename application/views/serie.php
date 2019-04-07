<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper(['url','html','image_cache']);?>

<div class="container">
   <div class="columns col-oneline col-gapless">
      <div class="column col-8 p-2">
        <div class="panel m-2 bg-secondary">
          <div class="columns col-gapless">
          <div class="panel-image column col-5 p-2">
            <img <?php cache_src($serie->urlImage);?> class="img-responsive p-centered">
          </div>
          <div class="panel-body column p-2 col-7">
            <div class="bg-gray p-1 m-1">
            <div class="panel-title h5 text-center text-primary">
              <?php echo $serie->nom.' <span class="h6 text-gray">('.substr($serie->premiere,0,4).')</span>'; ?></div>
            <p class="text-dark text-justify bg-gray">
              <?php echo $serie->resume; ?>
            </p>
          </div>
          </div>

  </div>

    <div class="panel-nav p-centered">

    <ul class="pagination">
  <li class="page-item <?php $previous=$saison-1; if ($previous<1) echo 'disabled';?>">
    <a href="<?php echo site_url('serie/'.$serie->id.'/'.$previous); ?>">Précédente</a>
  </li>
   <?php foreach($season as $element): ?>
  <li class="page-item <?php echo ($element->saison==$saison) ? 'active':'';?>">
    <a href="<?php echo site_url('serie/'.$serie->id.'/'.$element->saison); ?>"><?php echo $element->saison; ?></a>
  </li>
  <?php endforeach; ?>
  <li class="page-item <?php $next=$saison+1; if ($next>count($season)) echo 'disabled'?>">
    <a href="<?php echo site_url('serie/'.$serie->id.'/'.$next); ?>">Suivante</a>
  </li>
</ul>
</div>

<div class="panel-title h5 bg-primary p-2 m-2">Saison <?=$saison?> <span class="h6 text-gray">
  <?=substr($episode[0]->premiere,0,4) ?>  (<?=count($episode)?> episodes)</span></div>

   <div class="timeline panel-body text-dark py-2">
       <?php foreach($episode as $element): ?>
                  <div class="timeline-item">
                    <div class="timeline-left">
                      <a class="timeline-icon icon-lg" href="#"><?=$element->numero?></a></div>
                    <div class="timeline-content">
                      <div class="tile">
                        <div class="tile-content">
                          <p class="tile-title">
                            <span class="h5 text-primary">
                            <?php echo $element->nom;?> </span>
                            <span class="h6 text-gray">
                            <?php echo "Diffusion le " . date("d/m/Y",strtotime($element->premiere)) ;?>
                            </span>
                          </p>
                          <div class="tile-subtitle columns bg-gray">
                          <div class="col-7 p-2">
                            <p class="text-justify"><?php echo $element->resume ?></p>
                          </div>
                          <div class="col-5 flex-centered">
                             <img <?php cache_src($element->urlImage); ?> class="img-responsive p-2">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        <?php endforeach; ?>
</div>
</div>
</div>



  <div class="column col-4">
     <div class="columns col-gapless py-2">
      <?php foreach ($cast as $element): ?>
          <div class="popover popover-left column col-3 col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <img <?php cache_src($element->p_image); ?> class="img-responsive p-centered p-2">
          <div class="popover-container">
          <div class="btn-group float-right">
            <a class="btn btn-primary" href="<?php echo site_url('personne/'.$element->a_id); ?>">
              <?php echo $element->p_nom; ?></a>
            <a class="btn " href="#"><?php echo $element->a_nom; ?></a>
    </div></div></div>
    <?php endforeach; ?>
</div>
</div>
</div>
  </div>
 </div>
