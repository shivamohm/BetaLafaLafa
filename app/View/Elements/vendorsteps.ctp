<ul class="steps-list">
    <?php  
    //echo $this->data['Deal']['id'];
    $actionName=trim($this->params['action']);
    
    // WL - without link
    $step1WL='General';$step2WL='Images';$step3WL='Bank Details';$step4WL='Outlets';$step5WL='Amenities';
    if(isset($this->data['Vendor']['type'])){
        if($this->data['Vendor']['type']=='0'){ // voucher type
            $step1WL='General';$step2WL='Images';$step3WL='Bank Details';$step4WL='Outlets';$step5WL='Amenities';
        }
        
    }
    
     
     
    if(isset($this->data['Vendor']['id'])){
        $currId=$this->data['Vendor']['id'];
        $step1=$this->Html->link(__($step1WL), array('action' => 'edit', $currId)); 
        $step2=$this->Html->link(__($step2WL), array('action' => 'editstep2', $currId)); 
        $step3=$this->Html->link(__($step3WL), array('action' => 'editstep3', $currId)); 
        $step4=$this->Html->link(__($step4WL), array('action' => 'editstep4', $currId)); 
        $step5=$this->Html->link(__($step5WL), array('action' => 'editstep5', $currId)); 
    }
    //steps without links
   
    
    if($actionName=='edit'){
        echo '<li class="active-step">'.$step1WL.'</li><li>'.$step2.'</li><li>'.$step3.'</li>';
        if(isset($this->data['Vendor']['type'])){
            if($this->data['Vendor']['type']=='0')
                echo '<li>'.$step4.'</li>';
        }
        echo '<li>'.$step5.'</li>';
    }
    if($actionName=='editstep2'){
       echo '<li>'.$step1.'</li><li class="active-step">'.$step2WL.'</li><li>'.$step3.'</li>';
       if(isset($this->data['Vendor']['type'])){
            if($this->data['Vendor']['type']=='0')
                echo '<li>'.$step4.'</li>';
        }
        echo '<li>'.$step5.'</li>';
    }
    if($actionName=='editstep3'){
        echo '<li>'.$step1.'</li><li>'.$step2.'</li><li class="active-step">'.$step3WL.'</li>';
        if(isset($this->data['Vendor']['type'])){
            if($this->data['Vendor']['type']=='0')
                echo '<li>'.$step4.'</li>';
        }
        echo '<li>'.$step5.'</li>';
    }
    
    if($actionName=='editstep4'){
        echo '<li>'.$step1.'</li><li>'.$step2.'</li><li>'.$step3.'</li>';
        if(isset($this->data['Vendor']['type'])){
            if($this->data['Vendor']['type']=='0')
                echo '<li class="active-step">'.$step4WL.'</li>';
        }
        echo '<li>'.$step5.'</li>';
    }
    
//    if(isset($this->data['Vendor']['type'])){
//        if($actionName=='editstep4' && $this->data['Vendor']['type']=='0'){
//            echo '<li>'.$step1.'</li><li>'.$step2.'</li><li>'.$step3.'</li><li class="active-step">'.$step4WL.'</li>';
//        }
//        echo '<li>'.$step5.'</li>';
//    }
    if($actionName=='editstep5'){
        echo '<li>'.$step1.'</li><li>'.$step2.'</li><li>'.$step3.'</li>';
        if(isset($this->data['Vendor']['type'])){
            if($this->data['Vendor']['type']=='0')
                echo '<li>'.$step4.'</li>';
        }
        echo '<li class="active-step">'.$step5WL.'</li>';
    }
    
    
    
    
    if($actionName=='add'){
        echo '<li class="active-step">'.$step1WL.'</li><li>'.$step2WL.'</li><li>'.$step3WL.'</li><li>'.$step4WL.'</li><li>'.$step5WL.'</li>';
    }
//    if($actionName=='addstep2'){
//         echo '<li>'.$step1WL.'</li><li class="active-step">'.$step2WL.'</li><li>'.$step3WL.'</li>';
//    }
//    if($actionName=='addstep3'){
//         echo '<li>'.$step1WL.'</li><li>'.$step2WL.'</li><li class="active-step">'.$step3WL.'</li>';
//    }
    
    
    
    ?>
    
</ul>