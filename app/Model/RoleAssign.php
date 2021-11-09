<?php

namespace App\Model;

class RoleAssign extends BaseModel
{
    protected $table = 'role_assignment';
    protected $fillable = ['permission_id' ,'role_id'];


    protected function permission()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function getRoles ( $value, $for)
    {
        $roles = json_decode($value);
        $roles_name = '';
        if($roles)
            foreach($roles as $role)
            {
                $role = (int)($role);
                $role_title = Role::select('slug')->where('id','=',$role)->first();
                switch ($role_title->slug){
                    case 'super-admin':
                        $role_title->slug = 'super';
                        break;
                    case 'admin':
                        $role_title->slug = 'adm';
                        break;
                    case 'customer':
                        $role_title->slug = 'cstm';
                        break;
                    default:
                        $role_title->slug = ' ';
                }
                $roles_name  = $roles_name .'|'. $role_title->slug .'|';

            }
        if( $for == 'name'){
            return $roles_name;
        }elseif($for == 'id'){

            return $roles;
        }
    }
    public function getPanel ($value, $for)
    {

        $value = Panel::select('title','id')->where('id',(int)($value))->first();

        if($for == 'id')
        {
            return $value->id;
        }
        else{
            return $value->title;
        }

    }
    public function getAction ($value, $for)
    {
        $actions = json_decode($value);
        $actions_name = '';
        if($actions)
            foreach($actions as $action)
            {
                $role = (int)($action);
                $action_title = Action::select('title')->where('id','=',$action)->first();
                switch ($action_title->title){
                    case 'Create':
                        $action_title->title = 'Crt';
                        break;
                    case 'Edit':
                        $action_title->title = 'Edt';
                        break;
                    case 'Delete':
                        $action_title->title = 'Dlt';
                        break;
                    case 'Show':
                        $action_title->title = 'Shw';
                        break;
                    default:
                        $action_title->title = ' ';
                }
                $actions_name  = $actions_name .'|'. $action_title->title .'|';
            }

        if( $for == 'name'){

            return $actions_name;

        }elseif($for == 'id'){

            return $actions;
        }
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
