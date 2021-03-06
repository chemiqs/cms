<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Mateusz Manaj - EduWeb" />

<?=add_basehref()?>

<?=stylesheet_load('format.css,style.css,_cfe.css,CodeMirror/codemirror.css,CodeMirror/theme/elegant.css')?>

<?=javascript_load('administrator/_cfe.js,
                    administrator/jquery-1.7.1.min.js,
                    administrator/main.js,
                    CodeMirror/codemirror.js,
                    CodeMirror/mode/javascript/javascript.js,
                    CodeMirror/mode/css/css.js,
                    CodeMirror/mode/xml/xml.js,
                    CodeMirror/mode/htmlmixed/htmlmixed.js,
                    administrator/main.codemirror.js')?> 
    
<?=icon_load("pp_fav.ico")?>



<style>.CodeMirror { font-size: 12px !important; font-family: monospace; border: 1px solid #bab8b8;}</style>
</head>

<body>

<div class="wrapper">

    <div class="header">
        <div class="_fLeft"><img src="<?=directory_images()?>main_header_logo.gif" alt="logotype" /></div>
        <div class="_fRight loginInfo"><div class="_auth">ZALOGOWANY JAKO:<br /><span><?=model_load("dashboardmodel", "getCredentials", "")?></span> (<a href="administrator/wylogowanie">Wyloguj</a>)</div></div>
    </div>
    
    <div class="wrapright">
	    <div id="colRight">
	    	
	    	<div class="customTable _fLeft _minw640">
	            <div class="tableTitle"><?=model_load("management_translationEditormodel", "getTranslationSubject", "")?></div>
	                <div class="tableContent">
	                    <div class="text"><?=model_load("management_translationEditormodel", "getTranslationButtonIDs", "")?></div>
	                </div>
	            <div class="tableActionButtons"></div>
	        </div>
	        
	        <br class="_cb" /><br />
        
        	
            <div id="customLinkBtn" class="_m5 _fLeft">
        		<a href="javascript:saveAllTranslations('textarea.codeMirrorArea', '<?=model_load("management_translationEditormodel", "getTranslationInfoLoc", "")?>');">ZAPISZ ZMIANY</a>
        	</div>
	        
	        <br class="_cb" /><br />
            
            
            
            
            
            
            
            
            <?=model_load("management_translationEditormodel", "getTranslationEditors", "")?>
            
            
            
            
            
	    	
		</div>
	</div>
	
	<div id="colLeft">
        <?=module_load("ADMINMENU")?>
    </div>

</div>