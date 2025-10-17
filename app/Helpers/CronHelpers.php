<?php

use App\Models\PurchasedPlan;

function setPlanExpireRemainingDays(){

    $purchased_plans = PurchasedPlan::where('is_enabled',1)->get();
    
    foreach ($purchased_plans as $key => $plan) {
        
       if($plan->remaining_days > 0){
       $plan->update([
         'remaining_days' => $plan->remaining_days - 1
       ]);
        }
    }
    
    $updated_purchased_plans = PurchasedPlan::where('is_enabled',1)->get();
     foreach ($updated_purchased_plans as $key => $purchased_plan){
         if($purchased_plan->remaining_days == 0){
             $purchased_plan->update([
             'is_enabled' => false,
             'payment_status' => 'expired'
       ]);
        }
         
     }
}

?>