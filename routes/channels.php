<?php
// use \Illuminate\Support\Facades\Broadcast;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('tasks.{project_id}', function ($user, $project_id) {
    // return true;
    // return (int) $user->id === (int) $id;
    $canAccess = [];

    if($user->email === 'a@email.com') {
        $canAccess = [1, 3];
    }
    if ($user->email === 'b@email.com') {
        $canAccess = [2, 4];
    }

    return in_array($project_id, $canAccess);
});
