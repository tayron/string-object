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
     * StringObject::toLower
     * 
     * Método que converte todos as letras em minúscula
     * 
     * @return void
     */
    public function toLower()
    {
        $this->string = strtolower($this->string);
    }

    /**
     * StringObject::toUpper
     * 
     * Método que converte todos as letras em maiúscula
     * 
     * @return void
     */
    public function toUpper()
    {
        $this->string = strtoupper($this->string);
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