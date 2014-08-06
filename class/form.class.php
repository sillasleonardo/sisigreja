<?php


class Form{

	public $name;
	public $method;
	public $action;
	public $enctype;
	
	
	public function __construct( $name, $method = 'POST', $action = '', $enctype = '' ){
		$this->name		= $name;
		$this->method	= $method;
		$this->action	= $action;
		$this->enctype	= $enctype;
	}
	
	public function getName(){
		return $this->name;		
	}
	
	public function getMethod(){
		return $this->method;		
	}
	
	public function getAction(){
		return $this->action;
	}

	public function formText( $name, $class, $placeholder ,$value = null ){
		return '<input type="text" name="'. $name .'" id="'. $name .'" class="'. $class .'" placeholder="'. $placeholder .'" value="'. $value .'" />';		
	}
	
	public function formHidden( $name, $value = null ){
		return '<input type="hidden" name="'. $name .'" id="'. $name .'" value="'. $value .'" />';		
	}
	
	public function formFile( $name, $js = null ){
		return '<input type="file" name="'. $name .'" id="'. $name .'" size="40" '. $js .' />';
	}
	
	public function formPassword( $name, $class, $placeholder ,$value = null ){
		return '<input type="password" name="'. $name .'" id="'. $name .'" class="'. $class .'" placeholder="'. $placeholder .'" value="'. $value .'" />';		
	}
	
	public function formSelect( $name, $value, $selecione = true, $options ){
		
		$select = '';
		
		$select .= '<select name="'. $name .'" id="'. $name .'">';
			
			if( $selecione ){
				$select .=  '<option value=""> Selecione... </option>';
			}
			
			foreach( $options as $chave => $opcao ){

				if( isset( $value ) && $value == $chave ){
					$select .=  '<option value="'. $chave .'" selected="selected"> '. $opcao .' </option>';
				}
				else{
					$select .=  '<option value="'. $chave .'"> '. $opcao .' </option>';
				}
			
			}
			
		$select .=  '</select>';
		
		return $select;
		
	}
	
	public function formCheckbox( $name, $options, $value = null ){
		
		$checkbox = '';
		
		foreach( $options as $chave => $opcao ){
			$checkbox .= $opcao .'<input type="checkbox" name="'. $name .'" id="'. $name .'" value="'. $chave .'" /> &nbsp&nbsp';
		}
		
		
		
		return $checkbox;
	}
	
	public function formRadio( $name, $value = null, $options ){
		
		$radio = '';
		
		foreach( $options as $chave => $opcao ){
			
			if( isset( $value ) && $value == $chave ){
				$radio .= '<input type="radio" name="'. $name .'" id="'. $name .'" $value="'. $chave .'" checked="checked" />'.' '. $opcao .'<br />';
			}
			else{
				$radio .= '<input type="radio" name="'. $name .'" id="'. $name .'" $value="'. $chave .'" />'.' '. $opcao .'<br />';
			}
		}
	
		return $radio;
	}
	
	
	
	public function formTextarea( $name, $value = null, $width, $height ){
		return '<textarea name="'. $name .'" id="'. $name .'" style="width:'. $width .'; height:'. $height .';"> '. $value .' </textarea>';
	}
	
	public function formReset( $name, $value, $class ){
		return '<input type="reset" name="'. $name .'" id="'. $name .'" value="'. $value .'", class="'. $class .'" />';
	}
	
	public function formSubmit( $name, $value, $class ){
		return '<input type="submit" name="'. $name .'" id="'. $name .'" value="'. $value .'"class="'. $class .'" />';
	}
	
	
}

?>