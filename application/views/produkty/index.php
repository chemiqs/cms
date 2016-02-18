<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<?php $_SESSION['error'].='FILE: '.__FILE__.', CLASS: '.__CLASS__.', FUNCTION: '.__FUNCTION__.'<br/>'; ?>

<?=add_metatags()?>
<?=add_title("System CMS")?>
<?=add_basehref()?>

<?=stylesheet_load('screen.css')?>
<?=javascript_load('jQuery.js,script.js,jquery.localscroll-1.2.5.js,coda-slider.js?no_compress,jquery.scrollTo-1.3.3.js,
jquery.serialScroll-1.2.1.js,main.js')?> 
<?=icon_load("pp_fav.ico")?>


</head>



<body>
	<div id="header">
        <div id="lang-changer">Język witryny: 
        	<a href="javascript:void(0);" onclick="changeLangTo('pl');">
            	<img src="<?=directory_images()?>pl.png" alt="PL" />
            </a>
            
            <a href="javascript:void(0);" onclick="changeLangTo('en');">
            	<img src="<?=directory_images()?>gb.png" alt="GB" />
            </a>
        </div>
    
        <!-- LOGIN PANEL -->
        <?=module_load("loginpanel")?>
                    
                    
        <!-- MENU -->
        <?=module_load("menu")?>
	</div>

	<div id="slogan">
      <div class="content">
        <div id="motto">
            <a href="#">Busines Design</a>
        </div>
      </div>
   	</div>                      
                                          




<div id="main">
  <div class="content">
    <div class="column">
        <div class="box szary">
            
            <?=add_tr('wprowadzenie')?>
            
        </div>
                    
                    
                    
<div class="box firma">
<h2>O firmie</h2>
                        
    <div id="slider">
    
        <ul class="navigation" style="display: none;">
        
            <li><a href="#sites">Sites</a></li>
            <li><a href="#files">Files</a></li>
            <li><a href="#editor">Editor</a></li>
            
        </ul>
    
        <div class="scroll">
            <div class="scrollContainer">
            
              <div class="panel" id="sites">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus 
                  vehicula tortor, in imperdiet eros tempus vel. Suspendisse id arcu leo
              </div>
              
              <div class="panel" id="files">
                  ac aliquet nibh. Cras eu enim sit amet libero consectetur venenatis. 
                  Morbi volutpat elementum ante, in rutrum ipsum pretium ultrices. Morbi libero
              </div>
              
              <div class="panel" id="editor">
                  egestas volutpat nunc arcu et sapien. Vivamus congue, eros dictum fermentum 
                  laoreet, velit quam mollis lacus, in tristique dui nunc a mauris
              </div>
              
            </div>
        </div>
    </div>
                        
</div>
                    
    <?=module_load("footer")?>
</body>
</html>