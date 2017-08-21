<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\admin\admin  $user
     * @return mixed
     */
    public function view(admin $user)
    {
        //return $this->getPermission($user,4);
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\admin\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user,4);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\admin\admin $user
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user,5);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\admin\admin  $user
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user,6);
    }

    /**
     * Determine whether the user can access the tag CRUD.
     *
     * @param  \App\Model\admin\admin  $user
     * @return mixed
     */
    public function tag(admin $user)
    {
        return $this->getPermission($user,11);
    }

    /**
     * Determine whether the user can access the tag CRUD.
     *
     * @param  \App\Model\admin\admin  $user
     * @return mixed
     */
    public function admin(admin $user)
    {
        foreach ($user->roles as $role){
             if($role->id == 14){
                 return true;
             }
        }
        return false;
    }

    /**
     * Determine whether the user can access the category CRUD.
     *
     * @param  \App\Model\admin\admin  $user
     * @return mixed
     */
    public function category(admin $user)
    {
        return $this->getPermission($user,12);
    }

    protected function getPermission($user,$p_id){
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}
