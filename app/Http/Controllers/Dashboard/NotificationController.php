<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
Use App\Video;
Use App\Audio;
Use App\Page;
use App\Notifications\ApprovedEntity;
use App\Notifications\RejectedEntity;

class NotificationController extends Controller
{
    




    public function showNotificationInfo($type,$id,$objId,$notyId){

        //(Auth::user()->notifications->find($notyId))->markAsRead();
        $objectName = explode('Create', basename($type))[1];
        $objCreator = User::find($id);
        $class_name= 'App\\'.$objectName;
        $theObject  = $class_name::find($objId);

        return view('layouts/dashboard/notificationInfo',compact('objectName','objCreator','theObject','notyId'));        

    }

    public function handleNotification(Request $request,$objectName,$objId,$notyId){
        $theNotification = Auth::user()->notifications->find($notyId);
        $notificationCreator =User::find($theNotification->data['id']);
        $class_name= 'App\\'.$objectName;
        $theObject  = $class_name::find($objId);
        if($request->submitButton =="موافقة"){            
            $theObject->status="قبول";
            $notificationCreator->notify(new ApprovedEntity($objectName,$objId));
            (Auth::user()->notifications->find($notyId))->markAsRead();
        }else{
            $theObject->status="رفض"; 
            $notificationCreator->notify(new RejectedEntity($objectName,$objId));
            (Auth::user()->notifications->find($notyId))->markAsRead();
        }
        $theObject->adminComment = $request->input('adminComment');
        $theObject->update();
        return view('/layouts/dashboard/app');
    }

    public function showApprovedOrRejectedPage($id){
        $theNotification = Auth::user()->notifications->find($id);
        $theEntityName = $theNotification->data['Entity'];
        $EntityClass = 'App\\'.$theEntityName;
        $Entity = $EntityClass::find($theNotification->data['entityId']);
        (Auth::user()->notifications->find($id))->markAsRead();
        return view('/layouts/dashboard/RejectedOrApprovedPage',compact('Entity','theEntityName'));

    }

}
