<?php namespace KuraStar\Storage\Notification;

interface NotificationRepository{
	public function store($data);

	public function getByUserId($id);
}

?>