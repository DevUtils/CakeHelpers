CakeHelpers
===========

CakePHP Custom helpers

## UrlHelper
Pagina: http://127.0.0.1/scripts/plugins/

```
<?php
debug($this->Url->here());                            // 'scripts/plugins'
debug($this->Url->here('scripts/seila'));             // false
debug($this->Url->here('scripts/plugins'));           // true
debug($this->Url->here('/scripts/plugins/'));         // true

debug($this->Url->slug());                            // home
debug($this->Url->url('/teste/seila'));               // http://127.0.0.1/scripts/plugins/teste/seila
debug($this->Url->nocache('/js/seila.js'));           // http://127.0.0.1/scripts/plugins/js/seila.js?nc=DM7545
debug($this->Url->version('/js/seila.js', 15.5));     // http://127.0.0.1/scripts/plugins/js/seila.js?v=15.5
?>
```

##CpfHelper
```
<?php
debug($this->Cpf->valid('271.837.313-08')); // true
debug($this->Cpf->valid('271.837.313-14')); // false
?>
```

##CnpjHelper
```
<?php
debug($this->Cpf->valid('54.456.577/0001-31')); // true
debug($this->Cpf->valid('54.456.577/5454-45')); // false
?>
```

##MaskHelper
```
<?php
debug($this->Mask->mask('04045004', '##.###-###')); // 04.045-004
?>
```
