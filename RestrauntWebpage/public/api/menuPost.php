<?php
$menu = new Menu($_POST);
$menu->create();
echo json_encode($menu);
