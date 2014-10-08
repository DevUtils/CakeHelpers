CakeHelpers
===========

CakePHP Custom helpers

Pagina: http://127.0.0.1/scripts/plugins/

```
<?php
debug($this->Url->here());
debug($this->Url->here('scripts/seila'));
debug($this->Url->here('scripts/plugins'));
debug($this->Url->here('/scripts/plugins/'));

debug($this->Url->slug());
debug($this->Url->url('/teste/seila'));
debug($this->Url->nocache('/js/seila.js'));
debug($this->Url->version('/js/seila.js', 15.5));
?>
```

Output:
```
'scripts/plugins'
false
true
true

home
http://127.0.0.1/scripts/plugins/teste/seila
http://127.0.0.1/scripts/plugins/js/seila.js?nc=DM7545
http://127.0.0.1/scripts/plugins/js/seila.js?v=15.5
```
