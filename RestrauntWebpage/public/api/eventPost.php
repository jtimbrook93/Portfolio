<?php
$event = new Event($_POST);
$event->create();
echo json_encode($event);
