<?php

class Validate {

    public $message = array();

    public $validate;

    public function rules($data) {
	foreach($data as $key => $value) {
	    //echo $_POST[$key] . $value;
	    foreach($value as $rule => $error) {
		
		 switch($rule) {
					case 'not_empty':
					    if(empty($_POST[$key]) == $key) {
							$this->message[$key] = $error;
						}
					break;
					
					case 'numeric':
					    if(!is_numeric($_POST[$key]) == $key) {
							$this->message[$key] = $error;
						}
					break;
					
					case 'is_email':
					    if(!$this->validEmail($_POST[$key]) == $key) {
							$this->message[$key] = $error;
						}
					break;
					
					case 'alphanumeric':
					    if(!ctype_alnum($_POST[$key]) == $key) {
							$this->message[$key] = $error;
						}
					break;
					
					case 'between':
					    foreach($error as $between => $minmax) {
							//echo $between .  '<br/>';
							switch($between) {
								case 'min':
								    //echo $between . $minmax;
								    if(strlen($_POST[$key]) < $minmax) {
									    $this->message[$key] = $error['error'];	
									}
								break;
								
								case 'max':
								    //echo $between . $minmax;
								    if(strlen($_POST[$key]) > $minmax) {
									    $this->message[$key] = $error['error'];	
									}
								break;
								
							}
						}
					break;
					
					case 'equal_to':

					    if($_POST[$key] != $_POST[$value['equal_to']]) {
							$this->message[$key] = $value['error'];
						}
					break;
					
					/**
                    * return url
                    */					
					case 'is_url':
					    if(!$this->is_url($_POST[$key]) == $key) {
							$this->message[$key] = $error;
						}
					break;
					
					/**
                    * check or radio button
                    */					
					case 'is_check':
					    if(empty($_POST[$key]) == $key) {
							$this->message[$key] = $error;
						}
					break;
					
					/**
                    * select option form, make sure first value = empty or 0
                    */
					case 'is_select':
					    if($_POST[$key] == '' || $_POST[$key] == 0) {
							$this->message[$key] = $error;
						}
					break;
				}
			}
		
		}
	}
	
	
    public function display($value) {
        if(isset($_POST)) {
		    if(isset($this->message[$value])) {
			    echo '<span class="ValidationErrors">'.$this->message[$value].'</span>'; 
		    }			
		}

	}
	
	private function validEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	
	private function is_url($url) {
	    if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
	    	return true;
	    } else {
	    	return false;
	    }
    }     

}


/* 
* Example of usage
*/
$form = new Validation();
if(isset($_POST['submit'])) {

$form->rules(array( 
    'region' => array('is_select' => 'Please select region'), 
    'email' => array('is_email' => 'Please enter valid email'), 
    'phone' => array('numeric' => 'Please enter phone number',
	                 'between' => array('min' => 9, 'max' => 12, 'error' => 'Please enter valid phone number')),
    'category' => array('is_select' => 'Please select category'), 
    'name' => array('between' => array('min' => 5, 'max' => 32, 'error' => 'Name between 5 to 32 characters')), 
    'icNumber' => array('alphanumeric' => 'Please enter valid ic number',
	                    'between' => array('min' => 8, 'max' => 13, 'error' => 'Ic number too short or long')) 
            ));
            


if(empty($form->message)) {
    return $form->doInsert();
} 

} 

?>

<form action="" method="POST">
<table class="formInsert" border="0">


<tr>
	<td>Name:</td>
	<td><input type="text" name="name" id="ValidName" /><?php $form->display('name'); ?></td>
</tr>
<tr>
	<td>Phone Number:</td>
	<td><input type="text" name="phone" id="ValidPhoneNumber" /><?php $form->display('phone'); ?> &nbsp<input type="checkbox" name="hidePhone" value="1"/>&nbsp; Hide phone
	</td>
</tr>
<tr>
	<td>Email:</td>
	<td><input type="text" name="email" id="ValidEmail" /><?php $form->display('email'); ?></td>
</tr>
<tr>
	<td>IC Number:</td>
	<td><input type="text" name="icNumber" id="ValidIcNumber" /><?php $form->display('icNumber'); ?></td>
</tr>
<tr>
	<td><span class="cat">Category:</span></td>
	<td>
	
	
                   <select name="category"  class="category" id="ValidSelectionCategory">

                        
	<option value="0" selected="selected">&laquo;Select&raquo;</option>
	
	<option class="selectParent" value=""disabled>
			
				-- VEHICLES --
	        	
		</option> 
	
	<option  value='1'  id='cat1020' >
			Cars
			
		</option> 
	
	<option value='2'  id='cat1040' >
			Motorcycles
			
		</option> 
	
	<option  value='3'  id='cat1060' >
			Car Accessories & Parts
			
		</option> 
	
	<option  value='4'  id='cat1100' >
			Other Accessories & Parts
			
		</option> 
	
	<option value='5'  id='cat1080' >
			Other Vehicles
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- PROPERTIES --
	        	
		</option> 
	
	<option  value='6'  id='cat2020' >
			Apartments
			
		</option> 
	
	<option  value='7'  id='cat2040' >
			Houses
			
		</option> 
	
	<option  value='8'  id='cat2040' >
			Commercial Properties
			
		</option> 
	
	<option  value='9'  id='cat2080' >
			Land
			
		</option> 
	
	<option  value='10'  id='cat2100' >
			Rooms
			
		</option> 
	
	<option  value='11'  id='cat2120' >
			New Properties
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- ELECTRONICS --
	        	
		</option> 
	
	<option  value='12'  id='cat3020' >
			Mobile Phones & Gadgets
			
		</option> 
	
	<option  value='13'  id='cat3040' >
			TV/Audio/Video/Cameras
			
		</option> 
	
	<option  value='14'  id='cat3060' >
			Computers & Accessories
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- HOME & PERSONAL ITEMS --
	        	
		</option> 
	
	<option  value='15'  id='cat4020' >
			Home & Garden
			
		</option> 
	
	<option  value='16'  id='cat4040' >
			Watches/Accessories
			
		</option> 
	
	<option  value='17'  id='cat4060' >
			For Children
			
		</option> 
	
	<option  value='18'  id='cat4080' >
			Clothes
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- LEISURE/SPORTS/HOBBIES --
	        	
		</option> 
	
	<option  value='19'  id='cat5020' >
			Sports & Outdoors
			
		</option> 
	
	<option  value='20'  id='cat5040' >
			Hobby & Collectibles
			
		</option> 
	
	<option  value='21'  id='cat5060' >
			Music/Movies/Books
			
		</option> 
	
	<option  value='22'  id='cat5080' >
			Pets
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- BUSINESS TO BUSINESS --
	        	
		</option> 
	
	<option  value='23'  id='cat6020' >
			Professional/Office Equipment
			
		</option> 
	
	<option  value='24'  id='cat6040' >
			Business for Sale
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- JOBS & SERVICES --
	        	
		</option> 
	
	<option  value='25'  id='cat7020' >
			Jobs
			
		</option> 
	
	<option  value='26'  id='cat7040' >
			Services
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- TRAVEL --
	        	
		</option> 
	
	<option  value='27'  id='cat9020' >
			Accommodation
			
		</option> 
	
	<option  value='28'  id='cat9040' >
			Tours and Holidays
			
		</option> 
	
	<option class="selectParent" value=""disabled>
			
				-- -- --
	        	
		</option> 
	
	<option  value='29'  id='cat8040' >
			Food
			
		</option> 
	
	<option  value='30'  id='cat8020' >
			Others
			
		</option> 
	
</select>
	<?php $form->display('category'); ?></td>
	</tr>
	<tr>
	   <td></td><td></td>
	</tr>
	
	</td>
</tr>



<tr>
	<td>Region:</td>
	<td>
	
	<select name="region" id="ValidSelectionRegion">
			<option value="0">&laquo;Select&raquo;</option>
<option value="1" >Perlis</option>
<option value="2" >Kedah</option>
<option value="3" >Penang</option>
<option value="4" >Kelantan</option>
<option value="5" >Terengganu</option>
<option value="6" >Perak</option>
<option value="7" >Pahang</option>
<option value="8" >Selangor</option>
<option value="9" >Kuala Lumpur</option>
<option value="10" >Negeri Sembilan</option>
<option value="11" >Malacca</option>
<option value="12" >Johore</option>
<option value="13" >Sarawak</option>
<option value="14" >Sabah</option>

			</select><?php $form->display('region'); ?>
	
	
	</td>
</tr>



<tr>
	<td></td>
	<td><button type="submit" name="submit">Next</button></td>
</tr>
</table>
</form>

to validate match password:
array(
'password' => array('between' => array('min' => 5, 'max' => 18, 'error' => 'Password between 6 to 18 character')), 
    'retypePassword' => array('equal_to' => 'password', 'error' => 'Password not match')
)
