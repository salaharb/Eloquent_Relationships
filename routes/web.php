<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    // $profile = User::find(1)->profile;
    // $user = Profile::find(1)->user;
    // echo $user; // find user from Profile Model
    // echo $profile; // find Profile from User Model

    $user = User::find(1); // Assuming user with ID 1
    $posts = $user->posts;

    foreach ($posts as $post) {
        echo $post->title;
        echo $post->content;
        // Perform other operations with each post
    }
});

Route::get("/one-to-many", function () {
    $user = User::create([
        'name' => 'mohamed',
        'email' => 'mohamed@example.com',
        'password' => bcrypt('password123'),
    ]);
    $postsData = [
        [
            'title' => 'Post 1',
            'content' => 'Lorem ipsum dolor sit amet.',
        ],
        [
            'title' => 'Post 2',
            'content' => 'Consectetur adipiscing elit.',
        ],
    ];

    foreach ($postsData as $postData) {
        $post = new Post($postData);
        $user->posts()->save($post);
    }
});

Route::get('/one-to-one', function () {
    $user = User::create([
        'name' => 'salah arbani',
        'email' => 'arbani22@example.com',
        'password' => bcrypt('password123'),
    ]);
    $user->profile()->create([
        "user_id" => $user->id,
        "bio" => "infoo"
    ]);
});

Route::get('/user/profile', [ProfileController::class, 'show']);

Route::get('/test', function () {
    return view("posts.posts");
});
Route::get('/create-user', [UserController::class, 'createUserWithProfile']);
Route::get('/many-many', [UserController::class, 'ManyToMany']);
Route::get('/many-many-index', [UserController::class, 'ManyToManyIndex']);
