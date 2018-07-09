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
     * Posição a que se refere ao preenchimento de string no método fillString
     */    
    const LEFT = 'LEFT';
    
    /**
     * Posição a que se refere ao preenchimento de string no método fillString
     */        
    const RIGHT = 'RIGHT';
    
    /**
     * Posição a que se refere ao preenchimento de string no método fillString
     */      
    const BOTH = 'BOTH';
        
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
	public function __construct($string = '')	
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
     * StringObject::repeat
     * 
     * Método que repete a string um certo número de vezes
     * 
     * @param int $number Numero de vezes
     * 
     * @return void
     */    
    public function repeat($number)
    {
        $this->string = str_repeat($this->string, $number);
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
    
    /**
     * StringObject::mount
     * 
     * Método que auxilia na montagem de string contendo informações variadas
     * como linha digitável
     * 
     * $linhaDigitavel = '';
     * $this->mount(1, 3, 748, $linhaDigitavel);
     * $this->mount(4, 4, 9, $linhaDigitavel);
     * $this->mount(5, 5, 1, $linhaDigitavel);
     * $this->mount(6, 6, '.', $linhaDigitavel);
     * $this->mount(7, 11, 12345, $linhaDigitavel);
     * $this->mount(12, 15, ' ', $linhaDigitavel);
     * $this->mount(60, 62, 'x', $linhaDigitavel);
     * 
     * var_dump($linhaDigitavel);
     * 
     * Saida: string '74891.12345                                                xxx' (length=62)
     * 
     * @param string $lastPosition Posição inicial da string
     * @param string $firstPosition Posição final da string
     * @param string $value Valor que ocuparar a posição informada
     * 
     * @return void
     */
    public function mount($lastPosition, $firstPosition, $value)
    {
        $begin = $lastPosition - 1;
        $end = $firstPosition;
        $widthValue = strlen($value);
        $widthFieldFilled = $firstPosition - $lastPosition + 1;

        $testValue = trim($value);
        if(empty($testValue)){           
            $value = str_pad(null, $widthFieldFilled, $value);
            $widthValue = strlen($value);
        }

        if($widthValue !== $widthFieldFilled){
            $value = str_pad(null, ($end - $begin), $value);
        }

        if($widthValue < $end){
            $this->string = str_pad($this->string, $firstPosition, ' ', STR_PAD_RIGHT);
        }

        $this->string = substr_replace($this->string, $value, $begin, $end);

        if(strlen($this->string) < $firstPosition){
            $this->string = str_pad($this->string, $firstPosition, ' ', STR_PAD_RIGHT);
        }    
    }    
    
    /**
     * StringObject::removeSpecialCharacter
     * 
     * Método que remove caracteres especiais
     * 
     * @return void
     */    
    public function removeSpecialCharacter()
    {
        $specialCharacter = ',.;:/°]~^]{[[+=-)(*&¨%$#@!';
        $this->string = str_replace(str_split($specialCharacter), '', $this->string);
    }   
    
    /**
     * StringObject::removeAccentuation
     * 
     * Método que remove acentuações
     * 
     * @return void
     */      
    public function removeAccentuation()
    {
        $withAccentuation = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
        $withoutAccentuation = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
        $this->string = str_replace($withAccentuation, $withoutAccentuation, $this->string);
    }     
    
    /**
     * StringObject::fillString
     * 
     * Método que limita e preenche string com valores no inicio ou final até um
     * certo número de caracteres
     * 
     * @param string $value Valor da string
     * @param string $amount Quantidade de caracteres a ser concatenado
     * @param string $fill String a ser concatenada, podendo ser qualquer string
     * @param string $position (LEFT, RIGHT OU BOTH). Valor default DIREITO. Constante com direção em que a string deve ser complementada
     * @param array  $remove Lista com caracteres a serem removido da estring
     * 
     * @throws Exception Caso a posição informada seja inválida uma exceção será lançada
     * 
     * @return string String concatenada
     */
    public function fillString($value, $amount = null, $fill = null, $position = 'RIGHT', $remove = array())
    {  
        $amount = (is_null($amount)) ? strlen($value) : $amount;
        $positionList = array('BOTH' => 2, 'RIGHT' => 1, 'LEFT' => 0);

        if(!isset($positionList[$position])){
            throw new Exception("A posicao informada ($position) é invalida, informe: LEFT, RIGHT OU BOTH.");
        }

        $this->string .= str_pad(substr(str_replace($remove, null, $value), 0, $amount), $amount, $fill, $positionList[$position]);
    }    
}