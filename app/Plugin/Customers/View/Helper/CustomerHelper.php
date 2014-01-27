<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
class CustomerHelper extends AppHelper {

	/**
	 * This helper uses following helpers
	 *
	 * @var array
	 */
	var $helpers = array('Session');
	
	public function state(){
		
		
		$stateArray	=	array(''=>'--Select State--',
							  'Andhra Pradesh'=>'Andhra Pradesh',
							  'Arunachal Pradesh'=>'Arunachal Pradesh', 
							  'Andaman and Nicobar Islands'=>'Andaman and Nicobar Islands',
							  'Assam'=>'Assam', 
							  'Bihar'=>'Bihar',
							  'Chandigarh'=>'Chandigarh',
							  'Chhattisgarh'=>'Chhattisgarh',
							  'Dadra and Nagar Haveli'=>'Dadra and Nagar Haveli',
							  'Delhi'=>'Delhi',
							  'Daman and Diu'=>'Daman and Diu','Goa'=>'Goa', 
							  'Gujarat'=>'Gujarat', 
							  'Haryana'=>'Haryana',
							  'Himachal Pradesh'=>'Himachal Pradesh',
							  'Jammu and Kashmir'=>'Jammu and Kashmir',
							  'Jharkhand'=>'Jharkhand',
							 'Karnataka'=>'Karnataka',
							 'Kerala'=>'Kerala',
							 'Madhya Pradesh'=>'Madhya Pradesh',
							 'Maharashtra'=>'Maharashtra',
							 'Manipur'=>'Manipur',
							 'Meghalaya'=>'Meghalaya',
							 'Mizoram'=>'Mizoram',
							 'Nagaland'=>'Nagaland',
							 'Orissa'=>'Orissa',
							 'Pondicherry'=>'Pondicherry',
							 'Punjab'=>'Punjab',
							 'Rajasthan'=>'Rajasthan',
							 'Sikkim'=>'Sikkim',
							 'Tripura'=>'Tripura',
							 'Tamil Nadu'=>'Tamil Nadu',
							 'Uttar Pradesh'=>'Uttar Pradesh',
							 'Uttaranchal'=>'Uttaranchal',
							 'West Bengal'=>'West Bengal'
						);
						
						return $stateArray;
		}
		
		public function customerPaymentExits($customerId= ""){
			
			App::uses('Payment', 'Model');
			$this->Payment = new Payment();
			$customersPay	=	$this->Payment->find('count', array('conditions' => array('Payment.customer_id' => $customerId)));
			
			if($customersPay){
				return true;
			}else{
				return false;
			}
		}
	
}
