<?php $error_id = uniqid('error'); ?>
<style type="text/css">
body{margin:0; padding:0; font-family:Verdana,Arial,Helvetica,sans-serif; background:#AAA;}
*{margin:0; padding:0}
#keke_error { background: #eee; font-size: 1em;  text-align: left; color: #444; margin:40px 5% 0; box-shadow: 2px 5px 12px #555; border-radius: 5px; overflow:hidden; }
#keke_error h1,
#keke_error h2 { margin: 0; padding: 1em; font-size: 1em;  color: #911; background: #eee; }
#keke_error h1 a,
#keke_error h2 a { color: #06c; }
#keke_error h2 {  }
#keke_error h3 { margin: 0; padding: 0.4em 0 0; font-size: 1em; font-weight: normal; }
#keke_error p { margin: 0; padding: 0.2em 0; }
#keke_error a { color: #06c; }
#keke_error pre { overflow: auto; white-space: pre-wrap;  }
#keke_error code{ font: 10pt/1.5em "Courier New", "Courier", monospace; color:#3F7F7F} 
#keke_error table { width: 100%; display: block; margin: 0 0 0.4em; padding: 0; border-collapse: collapse; background: #fff; }
#keke_error table td { border: solid 1px #ddd; text-align: left; vertical-align: top; padding: 0.4em;  }
#keke_error div.content {margin: 0.5em; padding: 1em; overflow: hidden; font-size:0.8em; background:#fff; border:1px solid #ccc }
#keke_error pre.source { margin: 0 0 1em;  background: #fff; border: solid 1px #eee; line-height: 1.2em; }
#keke_error pre.source span.line { display: block; }
#keke_error pre.source span.line:nth-of-type(odd){ background-color:#FAFAFA}
#keke_error pre.source span.highlight { background: #f0eb96; color:#911 }
#keke_error pre.source span.line span.number { color: #666; }
#keke_error ol.trace { display: block; margin: 0 0 0 2em; padding: 0; list-style: decimal; }
#keke_error ol.trace li { margin: 0; padding: 0; }
.js .collapsed { display: none; }
</style>
<script type="text/javascript">
document.documentElement.className = document.documentElement.className + ' js';
function koggle(elem)
{
elem = document.getElementById(elem);
if (elem.style && elem.style['display'])
var disp = elem.style['display'];
else if (elem.currentStyle)
var disp = elem.currentStyle['display'];
else if (window.getComputedStyle)
var disp = document.defaultView.getComputedStyle(elem, null).getPropertyValue('display');
elem.style.display = disp == 'block' ? 'none' : 'block';
return false;
}
</script>
<div id="keke_error">
  <h1><span class="type"><?php echo $type;?>[ <?php echo $code;?> ]:</span> <span class="message"><?php echo $message;?></span></h1>
  <div id="<?php echo $error_id;?>" class="content">
    <p><span class="file"><?php echo Keke_debug::path($file); ?>[ <?php echo $line;?> ]</span></p>
    <?php echo Keke_debug::source($file, $line); ?>
    <ol class="trace">
      <?php if(is_array($data['trace'])) { foreach($data['trace'] as $i => $step) { ?>
      <li>
        <p> 
 <span class="file">
          <?php if(($step['file'])) { ?>
  <?php $source_id = $error_id.'source'.$i; ?>
          <a href="# <?php echo $source_id?>" onClick="return koggle('<?php echo $source_id?>')">
          	<?php echo Keke_debug::path($step['file']); ?> [ <?php echo $step['line'];?> ]</a>
          <?php } else { ?>
  	<span>PHP internal call</span>
          <?php } ?>
          </span> &raquo; 
  <?php echo $step['function']?> (
           <?php if(($step['args'])) { ?>
   <?php $args_id = $error_id.'args'.$i; ?>
          <a href="#<?php echo $args_id?> " onClick="return koggle('<?php echo $args_id?>')">arguments</a>
           <?php } ?>
         ) 
  </p>
        <?php if(isset($args_id)) { ?>
        <div id="<?php echo $args_id?>" class="collapsed">
          <table cellspacing="0">
            <?php if(is_array($step['args'])) { foreach($step['args'] as $name => $arg) { ?>
            <tr>
              <td><code><?php echo $name?></code></td>
              <td><pre><?php var_dump($arg);?></pre></td>
            </tr>
            <?php } } ?>
          </table>
        </div>
        <?php } ?>
        <?php if((isset($step['source']))) { ?>
        <pre id="<?php echo $source_id?>" class="source collapsed"><code><?php echo $step['source']?></code></pre>
        <?php } ?>
      </li>
      <?php } } ?>
    </ol>
  </div>
  <h2><a href="#<?php echo $env_id = $error_id.'environment'; ?>" onClick="return koggle('<?php echo $env_id?>')">Environment</a></h2>
  <div id="<?php echo $env_id?>" class="content collapsed">
    <?php $included = get_included_files(); ?>
    <h3><a href="#<?php echo $env_id = $error_id.'environment_included'; ?>" onClick="return koggle('<?php echo $env_id?>')">Included files</a> (<?php echo count($included); ?>)</h3>
    <div id="<?php echo $env_id?>" class="collapsed">
      <table cellspacing="0">
        <?php if(is_array($included)) { foreach($included as $file) { ?>
        <tr>
          <td><code><?php echo Keke_debug::path($file); ?></code></td>
        </tr>
        <?php } } ?>
      </table>
    </div>
    <?php $included = get_loaded_extensions(); ?>
    <h3><a href="#<?php echo $env_id = $error_id.'environment_loaded'; ?>" onClick="return koggle('<?php echo $env_id?>')">Loaded extensions</a> (<?php echo count($included); ?>)</h3>
    <div id="<?php echo $env_id?>" class="collapsed">
      <table cellspacing="0">
        <?php if(is_array($included)) { foreach($included as $file) { ?>
        <tr>
          <td><code><?php echo Keke_debug::path($file); ?></code></td>
        </tr>
        <?php } } ?>
      </table>
    </div>
<?php if(is_array($vars)) { foreach($vars as $var) { ?>
    <?php if((!empty($GLOBALS[$var]) && is_array($GLOBALS[$var]))) { ?>
<h3><a href="#<?php echo $env_id = $error_id.'environment'.strtolower($var); ?>" onClick="return koggle('<?php echo $env_id?>')">$<?php echo $var; ?></a></h3>
    <div id="<?php echo $env_id?>" class="collapsed">
      <table cellspacing="0">
       <?php if(is_array($GLOBALS[$var])) { foreach($GLOBALS[$var] as $key => $value) { ?>
<tr>
          <td><code><?php echo $key?></code></td>
          <td><pre><?php echo $value;?></pre></td>
        </tr>
        <?php } } ?>
      </table>
    </div>
<?php } ?>
    <?php } } ?>
  </div>
</div>
