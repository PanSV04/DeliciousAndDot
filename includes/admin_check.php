<?php
    session_start();

    if ($_SESSION['perms'] !== "admin") {
        http_response_code(401);

        exit;
    }