<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Modules\Ynotz\EasyAdmin\Traits\HasMVConnector;
use App\Services\UserService;
use Modules\Ynotz\SmartPages\Http\Controllers\SmartController;
use Modules\Ynotz\AccessControl\Http\Requests\UsersStoreRequest;

class UsersController extends SmartController
{
    use HasMVConnector;

    public function __construct(UserService $connectorService, Request $request){
        parent::__construct($request);
        $this->itemName = 'User';
        // $this->indexView = 'easyadmin::admin.indexpanel';
        // $this->createView = 'easyadmin::admin.create';
        // $this->editView = 'accesscontrol::users.edit';
        $this->connectorService = $connectorService;
    }

    // public function store(UsersStoreRequest $request)
    // {
    //     return $this->doStore($request);
    // }
}
