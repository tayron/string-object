## StringObject

Classe para gerenciamento de string


## Recursos
  - isEquals(StringObject $string) - Método que verifica se o conteúdo do objeto corrente é igual ao do objeto String informado
  - length() - Método que retorna o tamanho da string
  - wordCount($format, $charlist) - Método que retorna o número de palavras usadas na string
  - parseIntegerObject() - Método que converte um objeto StringObject em IntegerObject
  - parseFloatObject() - Método que converte um objeto StringObject em FloatObject
  - parseArrayObject() - Método que converte um StringObject em ArrayObject
  - replace(StringObject $search, StringObject $replace) - Método que procura por uma string e substui por outra
  - format(ArrayObject $values) - Método que seta valores para preenchimento de chaves no meio da string, tendo seu comportamento semelhante ao sprintf ao setar os valores.
  - toLowercase() - Método que converte todos as letras em minúscula
  - toUppercase() - Método que converte todos as letras em maiúscula
  - toUppercaseWord($delimiters) - Método que converte todos os primeiros caracteres de cada palavra para maiúsculas
  - trim($characterMask) - Método que retira espaço no ínicio e final de uma string 
  - utf8Encode() - Método que codifica um string ISO-8859-1 para UTF-8
  - utf8Decode() - Método que converte uma string com caracteres ISO-8859-1 codificadas com UTF-8 para single-byte ISO-8859-1
  

## Utilização via composer

```sh
    "require": {
        ...
        "tayron/string-object" : "dev-master"
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

    $texto = new StringObject('Nome: %s , Idade %d anos'); 
    echo $texto->format(new ArrayObject(array('Pedro', '15'))); // Nome: Pedro, Idade 15 anos
    echo $texto->format(new ArrayObject(array('Maria', '32'))); // Nome: Maria, Idade 32 anos   

    $texto = new StringObject('O rato roeu a roupa do rei de Roma');
    echo $texto->wordCount(); // 9
}catch(\Exception $e){
    echo $e->getMessage();
}
```
