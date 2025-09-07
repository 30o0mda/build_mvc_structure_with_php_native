<?php

include base_path('routes/admin.php');

route_get('tasks','home');
route_get('tasks/lang','controllers.set_language');
route_post('upload','controllers.upload');

