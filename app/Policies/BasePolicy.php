<?php

namespace App\Policies;

use App\Model\Action;
use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;


class BasePolicy
{
    protected $role_assignment;
    protected $isAccessableFlag = false;
    protected $action_title;

    protected function __construct($table)
    {
        $this->roles = auth()->user()->roles;
        $this->actions = Action::select('id', 'title')->get();
        $this->panel_id = Panel::select('id')->where('title', $table)->first()->toArray();

    }

    protected function checkRole($action)
    {
        foreach ($this->roles as $role) {
            if (in_array($role->slug, ['super-admin'])) {
                return true;
            }
        }
        $this->action_title = Action::select('title')->where('title', $action)->pluck('title')->first();
        foreach ($this->roles as $role) {
            //get roles according to panel id
            $assigned_roles = RoleAssign::select('role_assignment.id', 'role_assignment.permission_id', 'roles.id as roleId'
                , 'roles.slug as roleSlug', 'panels.id as panelId ', 'panels.title as panelTitle', 'actions.title as actionTitle',
                'actions.id as actionId')
                ->join('permission', 'permission.id', '=', 'role_assignment.permission_id')
                ->join('panels', 'panels.id', '=', 'permission.panel_id')
                ->join('actions', 'actions.id', '=', 'permission.action_id')
                ->join('roles', 'roles.id', '=', 'role_assignment.role_id')
                ->where('panels.id', $this->panel_id)
                ->where('actions.title', $this->action_title)
                ->where('roles.slug', $role->slug)
                ->get();

            if (!empty($assigned_roles)) {
                $valid_action = '';
                $valid_roles_slug = '';
                foreach ($assigned_roles as $assigned_role) {
                    $valid_roles_slug = $assigned_role->roleSlug;
                    $valid_action = $assigned_role->actionTitle;
                }

                $this->isAccessableFlag = $this->isAccessable($valid_roles_slug, $valid_action);
                if ($this->isAccessableFlag == true) {
                    return $this->isAccessableFlag;
                }
            }

        }
        return false;
    }

    protected function isAccessable($valid_roles_slug, $valid_action)
    {
        $flag = false;
        foreach ($this->roles as $role) {
            if ($role->slug == $valid_roles_slug) {
                $flag = true;
            }
        }
        if ($flag = true) {
            if ($valid_action == $this->action_title) {
                $flag = true;
            } else {
                $flag = false;
            }
        }
        return $flag;
    }

}
