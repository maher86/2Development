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

    public function handleNotification($AprovmentType,$objectName,$objId,$notyId){
        $theNotification = Auth::user()->notifications->find($notyId);
        $notificationCreator =User::find($theNotification->data['id']);
        $class_name= 'App\\'.$objectName;
        $theObject  = $class_name::find($objId);
        if($AprovmentType=="approve"){            
            $theObject->status="نشطة";
            $notificationCreator->notify(new ApprovedEntity($objectName));
            (Auth::user()->notifications->find($notyId))->markAsRead();
        }else{
            $theObject->status="مرفوضة"; 
            $notificationCreator->notify(new RejectedEntity($objectName));
            (Auth::user()->notifications->find($notyId))->markAsRead();
        }
        $theObject->adminComment = $request->input('adminComment');
        $theObject->update();
        return view('/layouts/dashboard/app');
    }
}
