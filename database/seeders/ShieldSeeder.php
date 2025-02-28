<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_jabatan","view_any_jabatan","create_jabatan","update_jabatan","restore_jabatan","restore_any_jabatan","replicate_jabatan","reorder_jabatan","delete_jabatan","delete_any_jabatan","force_delete_jabatan","force_delete_any_jabatan","view_jadwal","view_any_jadwal","create_jadwal","update_jadwal","restore_jadwal","restore_any_jadwal","replicate_jadwal","reorder_jadwal","delete_jadwal","delete_any_jadwal","force_delete_jadwal","force_delete_any_jadwal","view_kantor","view_any_kantor","create_kantor","update_kantor","restore_kantor","restore_any_kantor","replicate_kantor","reorder_kantor","delete_kantor","delete_any_kantor","force_delete_kantor","force_delete_any_kantor","view_kehadiran","view_any_kehadiran","create_kehadiran","update_kehadiran","restore_kehadiran","restore_any_kehadiran","replicate_kehadiran","reorder_kehadiran","delete_kehadiran","delete_any_kehadiran","force_delete_kehadiran","force_delete_any_kehadiran","view_pegawai","view_any_pegawai","create_pegawai","update_pegawai","restore_pegawai","restore_any_pegawai","replicate_pegawai","reorder_pegawai","delete_pegawai","delete_any_pegawai","force_delete_pegawai","force_delete_any_pegawai","view_shift","view_any_shift","create_shift","update_shift","restore_shift","restore_any_shift","replicate_shift","reorder_shift","delete_shift","delete_any_shift","force_delete_shift","force_delete_any_shift","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"Pegawai","guard_name":"web","permissions":["view_jadwal","view_any_jadwal","view_kantor","view_any_kantor","view_kehadiran","view_any_kehadiran"]},{"name":"karyawan","guard_name":"web","permissions":["view_jabatan","view_any_jabatan","view_kehadiran","view_any_kehadiran"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
