<?php

const APP_ROOT = __DIR__;

require_once APP_ROOT . '/helpers/app.php';
require_once APP_ROOT . '/helpers/config.php';
require_once APP_ROOT . '/helpers/debug.php';
require_once APP_ROOT . '/helpers/router.php';
require_once APP_ROOT . '/helpers/view.php';

require_once APP_ROOT . '/traits/Singleton.php';

//require_once APP_ROOT . '/core/api.php';
require_once APP_ROOT . '/core/app.php';
require_once APP_ROOT . '/core/controller.php';
require_once APP_ROOT . '/core/database.php';
require_once APP_ROOT . '/core/Auth.php';
//require_once APP_ROOT . '/core/middleware.php';
require_once APP_ROOT . '/core/model.php';
require_once APP_ROOT . '/core/Request.php';
require_once APP_ROOT . '/core/router.php';
require_once APP_ROOT . '/core/session.php';
require_once APP_ROOT . '/core/view.php';

require_once APP_ROOT . '/models/User.php';
require_once APP_ROOT . '/models/Record.php';
