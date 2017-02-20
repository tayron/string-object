## StringObject 1.0.0

Classe para gerenciamento de string


## Recursos
  - isEquals(StringObject $string) - Método que verifica se o conteúdo do objeto corrente é igual ao do objeto String informado
  - length() - Método que retorna o tamanho da string
  - parseIntegerObject() - Método que converte um objeto StringObject em IntegerObject
  - parseFloatObject() - Método que converte um objeto StringObject em FloatObject
  - replace(StringObject $search, StringObject $replace) - Método que procura por uma string e substui por outra
  - toLower() - Método que converte todos as letras em minúscula
  - toUpper() - Método que converte todos as letras em maiúscula


## Utilização via composer

```sh
    "require": {
        ...
        "tayron/string-object" : "1.0.0"
        ... 
    },    
```

## Exemplo de utilização
```
<?php
use Tayron\StringObject;

try{    
    $pedro = new StringObject('Pedro');
    $maria = new StringObject('Pedro');
    
    var_dump($pedro);
    var_dump($maria);
    
    var_dump($pedro->isEquals($maria));
    var_dump($pedro->length());
    
    $numero = new StringObject('123');
    var_dump($numero);
    
    $numero = $numero->parseIntegerObject();
    var_dump($numero);
    
    $numero = $numero->parseStringObject();
    var_dump($numero);

    $numero->replace('3', '999');
    var_dump($numero);
}catch(\Exception $e){
    echo $e->getMessage();
}
```
