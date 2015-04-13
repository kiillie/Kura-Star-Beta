<?php namespace KuraStar\Storage\Notification;

use Notification;

class EloquentNotificationRepository implements NotificationRepository{

	public function store($data){
		//
		$notification = new Notification();
		$notification->TO_ID = $data['to'];
		$notification->FROM_ID = $data['from'];
		$notification->MESSAGE = htmlentities($data['message']);

		return $notification->save();
	}

	public function getByUserId($id){
		$notifications = Notification::where('TO_ID', '=', $id)->where('STATUS', '=', 0)->orderBy('REGISTER_DATE', 'DESC')->get();

		return $notifications;
	}

}
?>