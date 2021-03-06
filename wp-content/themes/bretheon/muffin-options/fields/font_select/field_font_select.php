<?php
class MFN_Options_font_select extends MFN_Options{	
	
	/**
	 * Field Constructor.
	*/
	function __construct( $field = array(), $value ='', $parent = NULL ){
		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
	}
	
	/**
	 * Field Render Function.
	*/
	function render( $meta = false ){
		
		$class = ( isset( $this->field['class']) ) ? 'class="'.$this->field['class'].'" ' : '';
		$name = ( ! $meta ) ? ( $this->args['opt_name'].'['.$this->field['id'].']' ) : $this->field['id'];
		
		$fonts = mfn_fonts(); 
		
		echo '<select name="'. $name .'" '.$class.'rows="6" >';	
		
			echo '<optgroup label="'. __('Default','mfn-opts') .'">';
			foreach ( $fonts['default'] as $font ) {
				echo '<option value="'. $font .'"'.selected($this->value, $font, false).'>'. $font .'</option>';
			}
			echo '</optgroup>';
			
			echo '<optgroup label="'. __('System','mfn-opts') .'">';
			foreach ( $fonts['system'] as $font ) {
				echo '<option value="'. $font .'"'.selected($this->value, $font, false).'>'. $font .'</option>';
			}
			echo '</optgroup>';
			
			echo '<optgroup label="'. __('Popular Google Fonts','mfn-opts') .'">';
			foreach ( $fonts['popular'] as $font ) {
				echo '<option value="'. $font .'"'.selected($this->value, $font, false).'>'. $font .'</option>';
			}
			echo '</optgroup>';
			
			echo '<optgroup label="'. __('Google Fonts','mfn-opts') .'">';
			foreach ( $fonts['all'] as $font ) {
				echo '<option value="'. $font .'"'.selected($this->value, $font, false).'>'. $font .'</option>';
			}
			echo '</optgroup>';
			
		echo '</select>';
		
		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
	}
	
}
?>