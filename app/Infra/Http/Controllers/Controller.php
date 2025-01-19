<?php

namespace App\Infra\Http\Controllers;

use OpenApi\Attributes as OA;

#[
    OA\Info(version: '1.0.0', description: 'Zip Code Finder', title: 'Zip Code Finder API'),
    OA\Server(url: 'http://localhost:80/api', description: 'local server'),
]
abstract class Controller
{
    //
}
