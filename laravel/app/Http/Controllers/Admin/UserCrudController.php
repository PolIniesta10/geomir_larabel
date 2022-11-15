<?php

namespace App\Http\Controllers\Admin;

use Backpack\PermissionManager\app\Http\Controllers\UserCrudController as PM_UserCrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends PM_UserCrudController
{
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        parent::setup();
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    public function setupListOperation()
    {
        parent::setupListOperation();
        $this->crud->removeColumn('permissions');
    }
}
