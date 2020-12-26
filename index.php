<?php

// Nothing to see here
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/jquery.terminal/js/jquery.terminal.min.js"></script>
<link href="https://unpkg.com/jquery.terminal/css/jquery.terminal.min.css" rel="stylesheet"/>
<style>
body{background-color:black};
</style>
<script>
function validURL(str) {
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  return !!pattern.test(str);
}
jQuery(function($, undefined) {
    $('#term').terminal(function(command) {
        if (command !== '') {
            if(validURL(command))
            {
              this.echo("Please wait...")
              this.echo("If a new tab isn't opening, click here: "+window.location+"/web.php?url="+command)
              window.open("web.php?url="+command, "_blank"); 
            }
            else
            {
              this.echo('Sorry, but that doesnt seem to be a URL. Are you missing the http(s)://?')
            }
        }
    }, {
        greetings: '2020 Riverside Rocks (https://riverside.rocks)',
        name: 'proxy',
        height: 480,
        width: 720,
        prompt: 'root@localhost> '
    });
});
</script>
<div id="term"></div>
