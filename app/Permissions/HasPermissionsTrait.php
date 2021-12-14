<?php
namespace App\Permissions;

use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait {

	// Usuario -> roles -> permisos
	// X - usuario -> permisos

	// Aprobados
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	public function permissions()
	{
		return $this->belongsToMany(Role::class)
				->as('permissions');
	}

	public function hasPermissionsByClass(Permission $permission)
	{
		return $this->hasPermission( $permission->slug );
	}

	public function hasPermissions($permissions)
	{
		foreach ( $permissions as $permission ) {
			if( ! $this->hasPermission( $permission ) ){
				return false;
			}
		}
		return true;
	}
	protected function hasPermission($permission)
	{

		$count_if_permission = Permission::join('permission_role','permission_role.permission_id','permissions.id')
			->join('role_user','role_user.role_id','permission_role.role_id')
			->where('permissions.slug', $permission)
			->where('role_user.user_id', $this->id)
			->count();

		if( $count_if_permission == 0) return false;
		return true;

	}


/*
	// Repositorio
	public function hasPermissionTo($permission) {

		return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
	}
	public function givePermissionsTo(... $permissions) {

		$permissions = $this->getAllPermissions($permissions);
		dd($permissions);
		if($permissions === null) {
		return $this;
		}
		$this->permissions()->saveMany($permissions);
		return $this;
	}

	public function withdrawPermissionsTo( ... $permissions ) {

		$permissions = $this->getAllPermissions($permissions);
		$this->permissions()->detach($permissions);
		return $this;

	}

	public function refreshPermissions( ... $permissions ) {

		$this->permissions()->detach();
		return $this->givePermissionsTo($permissions);
	}



	public function hasPermissionThroughRole($permission) {

		foreach ($permission->roles as $role){
		if($this->roles->contains($role)) {
			return true;
		}
		}
		return false;
	}

	public function hasRole( ... $roles ) {

		foreach ($roles as $role) {
		if ($this->roles->contains('slug', $role)) {
			return true;
		}
		}
		return false;
	}

	public function permissions2() {

		return $this->belongsToMany(Permission::class);

	}

	protected function getAllPermissions(array $permissions) {

		return Permission::whereIn('slug',$permissions)->get();

	}
*/
}
