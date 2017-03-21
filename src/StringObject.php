<?php
namespace Tayron;

/**
 * Classe para gerenciamento de string
 * 
 * @author Tayron Miranda <dev@tayron.com.br>
 */
class StringObject
{
    /**
     * Atributo que armazena a string
     * 
     * @var string
     */
	private $string;

    /**
     * StringObject::__construct
     * 
     * Armazena o parametro informado pelo usuário como string
     * 
     * @param string $string Text informado pelo usuário
     * 
     * @return void
     */
	public function __construct($string)	
	{
		$this->string = (string) $string;
	}
	
    /**
     * StringObject::isEquals
     * 
     * Método que verifica se o conteúdo do objeto corrente é igual ao do objeto String informado
     * 
     * @param StringObject $string Objeto String informado pelo usuário
     * 
     * @return boolean Retorna true se o conteúdo for igual ou false
     */
	public function isEquals(StringObject $string)
	{
		return ($this->getValue() === $string->getValue());
	}
	
    /**
     * StringObject::length
     * 
     * Método que retorna o tamanho da string
     * 
     * @return integer Retorna o tamanho do valor do conteúdo da string armazenada no objeto corrente
     */
	public function length()
	{
		return strlen($this->string);
	}
    
    /**
     * StringObject::wordCount
     * 
     * Método que retorna o número de palavras usadas na string
     * 
     * @param int $format Especifica o valor de retorno desta função. Os valores 
     * atualmente suportados são: 
     * 0 - Retorna o número de palavras encontradas 
     * 1 - Retorna um array contendo todas as palavras encontradas dentro de string
     * 2 - Retorna um array associativo, onde a chave é a posição numérica da palavra 
     * dentro da string e o valor é a própria palavra. 
     * 
     * @param string $charlist Uma lista de caracteres adicionais que serão 
     * considerados como 'palavra'. 
     * 
     * @return integer Retorna o número de palavras
     */
    public function wordCount($format = 0, $charlist = null)
    {
        return str_word_count($this->string, $format, $charlist);
    }
	
    /**
     * StringObject::parseIntegerObject
     * 
     * Método que converte um StringObject em IntegerObject
     * 
     * @return IntegerObject Objeto convertido em IntegerObject
     */
	public function parseIntegerObject()
	{
	    return new IntegerObject($this->string);
	}

    /**
     * StringObject::parseFloatObject
     * 
     * Método que converte um StringObject em IntegerObject
     * 
     * @return FloatObject Objeto convertido em FloatObject
     */
	public function parseFloatObject()
	{
	    return new FloatObject($this->string);
	}
    
    /**
     * StringObject::parseArrayObject
     * 
     * Método que converte um StringObject em ArrayObject
     * 
     * @return ArrayObject Objeto convertido em ArrayObject
     */    
    public function parseArrayObject()
    {
        return new \ArrayObject(explode(' ', $this->string));
    }
    
    /**
     * StringObject::replace
     * 
     * Método que procura por uma string e substui por outra 
     * 
     * @param StringObject $search String a ser procurada
     * @param StringObject $replace String a ser substituída
     * 
     * @return void
     */
    public function replace(StringObject $search, StringObject $replace)
    {
        $this->string = str_replace($search, $replace, $this->string);
    }
    
    /**
     * StringObject::format
     * 
     * Método que seta valores para preenchimento de chaves no meio da string,
     * tendo seu comportamento semelhante ao vsprintf ao setar os valores.
     * 
     * As chaves usadas na string segue o mesmo padrão da função sprintf
     * @see http://php.net/manual/en/function.vsprintf.php
     * 
     * @example 
     * $texto = new StringObject('Nome: %s , Idade %d anos'); 
     * echo $texto->format(new ArrayObject(array('Pedro', '15'))); // Nome: Pedro, Idade 15 anos
     * echo $texto->format(new ArrayObject(array('Maria', '32'))); // Nome: Maria, Idade 32 anos
     * 
     * @param \ArrayObject $values As ordens dos valores devem seguir a ordem das
     * chaves no meio da string
     * 
     * @return StringObject Com a string formatada
     */
    public function format(\ArrayObject $values)
    {
        return new StringObject(vsprintf($this->string, $values));
    }

    /**
     * StringObject::toLowercase
     * 
     * Método que converte todos as letras em minúscula
     * 
     * @return void
     */
    public function toLowercase()
    {
        $this->string = strtolower($this->string);
    }

    /**
     * StringObject::toUppercase
     * 
     * Método que converte todos as letras em maiúscula
     * 
     * @return void
     */
    public function toUppercase()
    {
        $this->string = strtoupper($this->string);
    }
    
    /**
     * StringObject::toUppercaseWord
     * 
     * Método que converte todos os primeiros caracteres de cada palavra para maiúsculas
     * 
     * @param string $delimiters Delimitadores usadona separação das strings
     * 
     * @return void
     */
    public function toUppercaseWord($delimiters = " \t\r\n\f\v")
    {
        $this->toLowercase();
        $this->string = ucwords($this->string, $delimiters);
    }
    
    /**
     * StringObject::trim
     * 
     * Método que retira espaço no ínicio e final de uma string
     * 
     * @param string $characterMask Opcionalmente, os caracteres removidos pode 
     * também ser especificados usando o parâmetro charlist. Simplesmente liste 
     * todos os caracteres que você quer retirar. Com .. você pode especificar 
     * um intervalo de caracteres. 
     * 
     * @return void
     */
    public function trim($characterMask = " \t\n\r\0\x0B")
    {
        $this->string = trim($this->string, $characterMask);
    }
    
    /**
     * StringObject::utf8Encode
     * 
     * Método que codifica um string ISO-8859-1 para UTF-8
     * 
     * @return void
     */
    public function utf8Encode()
    {
        $this->string = utf8_encode($this->string);
    }
    
    /**
     * StringObject::utf8Decode
     * 
     * Método que converte uma string com caracteres ISO-8859-1 codificadas com 
     * UTF-8 para single-byte ISO-8859-1
     * 
     * @return void
     */
    public function utf8Decode()
    {
        $this->string = utf8_decode($this->string);
    }    
    
    /**
     * StringObject::getValue
     * 
     * Método que retorna o valor puro da string do objeto
     * 
     * @return string Valor do conteúdo do objeto em texto
     */
    public function getValue()
    {
        return (string)$this->string;
    }
    
    /**
     * StringObject::__toString
     * 
     * Método que retorna o valor do conteúdo do objeto em forma de texto
     * 
     * @return string Valor do conteúdo do objeto em texto
     */
	public function __toString()
	{
		return (string)$this->string;
	}	
}