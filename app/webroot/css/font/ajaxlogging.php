<?php
require_once ( "app/Mage.php" );
umask(0);
Mage::app("default");

Mage::getSingleton("core/session", array("name" => "frontend"));
$session = Mage::getSingleton("customer/session");
$cartQty = Mage::getModel('checkout/cart')->getSummaryQty();

$_helper = Mage::helper('customer');

// if the customer is not logged in
if(!$session->isLoggedIn()){
	//echo 'test'; die;
	//$returnValue = "<a class='facebook_connect' href='".Mage::getUrl('facebook/customer_account/connect') ."'><img src='". Mage::getRandomUrl('media/images') ."fconnect-top.gif' width='58' height='18' alt='fconnect' align='absmiddle'/></a>";
	$returnValue = "<a href='". Mage::helper('customer')->getLoginUrl()."'>Log In</a>|";
	$padding = '';
}

// if the customer is logged in then show my account section
else{
	//echo 'test 2'; die;
	$firstname = $session->getCustomer()->getData('firstname');
	$lastname = $session->getCustomer()->getData('lastname');
	
	
	$returnValue = "<div class='imrcmain0 imgl' style='z-index:999999; font-style:normal; float:left;'>
						<div class='imcm imde' id='imouternew'>
                  			<ul id='imenus0'>
                   				<li class='imatm' style='text-align:left; '>
									<a href='".$_helper->getAccountUrl()."'>My Account<img src='". Mage::getBaseUrl()."images/arrow1.png' alt='My Account' width='10' height='4' style='padding-left:5px; padding-right:10px; padding-top:5px;' /></a>
									<div class='imsc'>
                            <div class='imsubc' style='width:180px;left:0px; float:left; text-align:right;'>
                              <ul style='padding: 10px 10px;'>
                                <li style='text-align:left; font-size:12px; color:#fff; padding:0px 0px; border-bottom:1px dotted #ffffff;'>".$firstname.'&nbsp;'.$lastname."</li>
								<li><a href='".$_helper->getAccountUrl()."'  style='text-align:left;'><img src='". Mage::getBaseUrl()."images/account.jpg'  alt='Account Info' style='vertical-align:middle' />&nbsp;Account Info</a></li>
                                <li><a href='".Mage::helper('customer')->getLogoutUrl()."'  style='text-align:left;'><img src='". Mage::getBaseUrl()."images/logout.jpg' alt='Logout' style='vertical-align:middle' />&nbsp;Logout</a></li>
                              </ul>
                            </div>
                        </div>
                   
                
                </div>
            </div>
			";
	$padding = "";
}

$returnValue.= "<div style='color:#fff; float:right; width:77px; font-size:11px; text-align:left;'>";


// show cart icon
if ($cartQty>0){ 
	$returnValue.= "<a href='". Mage::getUrl('checkout/cart')."'>CART(".$cartQty.")</a>";
} 
else{ 
	$returnValue.= "<a href='".Mage::getUrl('checkout/cart')."' ".$padding." >Cart (0)</a>";
} 

<img src='". Mage::getBaseUrl()."images/cartadd.jpg' alt='Logout' style='vertical-align:middle' />

$returnValue.= "</div>";



<style type="text/css">
a {
	color:#fff;
}
a:hover {
	color:#fff;
}
</style>
