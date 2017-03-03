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