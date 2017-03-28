<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;

class PermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $createRole = new Permission();
        $createRole->name = 'create-role';
        $createRole->display_name = 'Create Role';
// optional
// Allow a user to...
        $createRole->save();

        $editRole = new Permission();
        $editRole->name = 'edit-role';
        $editRole->display_name = 'Edit Role'; // optiona

        $editRole->save();

        $editPost = new Permission();
        $editPost->name = 'edit-Post';
        $editPost->display_name = 'Edit Post'; // optiona

        $editPost->save();

        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = 'Create Post'; // optiona

        $createPost->save();

        $createComment = new Permission();
        $createComment->name = 'create-comment';
        $createComment->display_name = 'Create Comment'; // optiona

        $createComment->save();
        $editComment = new Permission();
        $editComment->name = 'edit-comment';
        $editComment->display_name = 'Edit Comment'; // optiona

        $editComment->save();
        $createUser = new Permission();
        $createUser->name = 'create-user';
        $createUser->display_name = 'Create User'; // optiona

        $createUser->save();
        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit User'; // optiona

        $editUser->save();
        $createTag = new Permission();
        $createTag->name = 'create-tag';
        $createTag->display_name = 'Create Tag'; // optiona

        $createTag->save();
        $editTag = new Permission();
        $editTag->name = 'edit-tag';
        $editTag->display_name = 'Edit Tag'; // optiona

        $editTag->save();
        $showPost = new Permission();
        $showPost->name = 'show-post';
        $showPost->display_name = 'Show Post'; // optiona

        $showPost->save();
        $showComment = new Permission();
        $showComment->name = 'show-comment';
        $showComment->display_name = 'Show Comment'; // optiona

        $showComment->save();
        $showUser = new Permission();
        $showUser->name = 'show-user';
        $showUser->display_name = 'Show User'; // optiona

        $showUser->save();
        $showRole = new Permission();
        $showRole->name = 'show-role';
        $showRole->display_name = 'Show Role'; // optiona

        $showRole->save();
        $deletePost = new Permission();
        $deletePost->name = 'delete-post';
        $deletePost->display_name = 'Delete Post'; // optiona

        $deletePost->save();
        $deleteComment = new Permission();
        $deleteComment->name = 'delete-comment';
        $deleteComment->display_name = 'Delete Comment'; // optiona

        $deleteComment->save();
        $deleteUser = new Permission();
        $deleteUser->name = 'delete-user';
        $deleteUser->display_name = 'Delete User'; // optiona

        $deleteUser->save();
        $deleteRole = new Permission();
        $deleteRole->name = 'delete-role';
        $deleteRole->display_name = 'Delete Role'; // optiona

        $deleteRole->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description = 'User is allowed to manage and edit other users'; // optional
        $admin->save();
        $user = User::where('name', '=', 'RABAB HUSSIEN')->first();

// role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id

        $admin->attachPermission($createRole);
        $admin->attachPermission($editRole);
        $admin->attachPermission($createPost);
        $admin->attachPermission($editPost);
        $admin->attachPermission($editTag);
        $admin->attachPermission($createTag);
        $admin->attachPermission($editComment);
        $admin->attachPermission($createComment);
        $admin->attachPermission($createUser);
        $admin->attachPermission($editUser);
        $admin->attachPermission($showPost);
        $admin->attachPermission($showRole);
        $admin->attachPermission($showComment);
        $admin->attachPermission($showUser);
        $admin->attachPermission($deletePost);
        $admin->attachPermission($deleteRole);
        $admin->attachPermission($deleteComment);
        $admin->attachPermission($deleteUser);
        
    }

}
