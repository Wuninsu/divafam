<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 🔹 Entities based on your schemas
        $entities = [
            'user',
            'category',
            'usermeta',
            'page',
            'tag',
            'post',
            'project',
            'training',
            'community',
            'beneficiary',
            'media',
            'event',
            'setting',
            'donor',
            'donation',
            'sponsorship',
        ];

        $actions = ['view', 'create', 'update', 'delete'];

        // Create CRUD permissions
        foreach ($entities as $entity) {
            foreach ($actions as $action) {
                Permission::firstOrCreate(['name' => "$action $entity"]);
            }
        }

        // 🔹 Special permissions
        $specialPermissions = [
            'assign role',
            'assign permission',
            'manage system settings',
            'manage site options',
            'manage users',
            'manage permissions',
            'manage roles',
            'manage recycle bin',
            'restore from recycle bin',
            'force delete from recycle bin',
        ];

        foreach ($specialPermissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 🔹 Roles
        $dev = Role::firstOrCreate(['name' => 'dev']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $director = Role::firstOrCreate(['name' => 'director']);
        $secretary = Role::firstOrCreate(['name' => 'secretary']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $donor = Role::firstOrCreate(['name' => 'donor']);
        $beneficiary = Role::firstOrCreate(['name' => 'beneficiary']);
        $guest = Role::firstOrCreate(['name' => 'guest']);

        // 🔹 Assign permissions to roles
        $dev->syncPermissions(Permission::all());

        $admin->syncPermissions(
            Permission::whereNotIn('name', [
                'assign role',
                'assign permission',
                'manage system settings'
            ])->get()
        );

        $director->syncPermissions([
            'view project',
            'create project',
            'update project',
            'delete project',
            'view training',
            'create training',
            'update training',
            'delete training',
            'view community',
            'create community',
            'update community',
            'delete community',
            'view event',
            'create event',
            'update event',
            'delete event',
            'view donor',
            'view donation',
            'view sponsorship',
            'create sponsorship',
            'update sponsorship',
            'view tag',
            'create tag',
            'update tag',
            'view page',
            'update page',
            'create page',
            'view post',
            'create post',
            'update post',
            'view media',
            'create media',
            'update media',
            'manage users'
        ]);

        $secretary->syncPermissions([
            'view beneficiary',
            'create beneficiary',
            'update beneficiary',
            'delete beneficiary',
            'view training',
            'create training',
            'update training',
            'view event',
            'create event',
            'update event',
            'view page',
            'create page',
            'update page',
        ]);

        $editor->syncPermissions([
            'view post',
            'create post',
            'update post',
            'delete post',
            'view project',
            'create project',
            'update project',
            'view page',
            'create page',
            'update page',
            'view tag',
            'create tag',
            'update tag',
            'create category',
            'update category',
            'view category'
        ]);

        $donor->syncPermissions([
            'view project',
            'view community',
            'view training',
            'view event',
        ]);

        $beneficiary->syncPermissions([
            'view project',
            'view training',
            'view event',
            'view beneficiary',
            'update beneficiary', // only their own
        ]);

        $guest->syncPermissions([
            'view page',
            'view post',
            'view event',
            'view project',
            'view training',
        ]);
        // 🔹 Example users
        $devUser = User::firstOrCreate(
            ['email' => 'dev@divafam.org', 'username' => 'dev'],
            [
                'name' => 'System Developer',
                'password' => Hash::make('test1234'),
                'phone' => '0500000000',
            ]
        );
        $devUser->assignRole($dev);

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@divafam.org', 'username' => 'admin'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('test1234'),
                'phone' => '0500000001',
            ]
        );
        $adminUser->assignRole($admin);

        $directorUser = User::firstOrCreate(
            ['email' => 'director@divafam.org', 'username' => 'director'],
            [
                'name' => 'Director User',
                'password' => Hash::make('test1234'),
                'phone' => '0500000002',
            ]
        );
        $directorUser->assignRole($director);

        $secretaryUser = User::firstOrCreate(
            ['email' => 'secretary@divafam.org', 'username' => 'secretary'],
            [
                'name' => 'Secretary User',
                'password' => Hash::make('test1234'),
                'phone' => '0500000003',
            ]
        );
        $secretaryUser->assignRole($secretary);

        $editorUser = User::firstOrCreate(
            ['email' => 'editor@divafam.org', 'username' => 'editor'],
            [
                'name' => 'Editor User',
                'password' => Hash::make('test1234'),
                'phone' => '0500000004',
            ]
        );
        $editorUser->assignRole($editor);

        $donorUser = User::firstOrCreate(
            ['email' => 'donor@divafam.org', 'username' => 'donor'],
            [
                'name' => 'Donor User',
                'password' => Hash::make('test1234'),
                'phone' => '0500000005',
            ]
        );
        $donorUser->assignRole($donor);

        $beneficiaryUser = User::firstOrCreate(
            ['email' => 'beneficiary@divafam.org', 'username' => 'beneficiary'],
            [
                'name' => 'beneficiary User',
                'password' => Hash::make('test1234'),
                'phone' => '0500000006',
            ]
        );
        $beneficiaryUser->assignRole($beneficiary);

        $guestUser = User::firstOrCreate(
            ['email' => 'guest@divafam.org', 'username' => 'guest'],
            [
                'name' => 'guest User',
                'password' => Hash::make('test1234'),
                'phone' => '0500000007',
            ]
        );
        $guestUser->assignRole($guest);
    }
}
