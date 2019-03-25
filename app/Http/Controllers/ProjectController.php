<?php
/**
 * Created by PhpStorm.
 * User: rasel
 * Date: 3/25/19
 * Time: 3:30 PM
 */

namespace App\Http\Controllers;


class ProjectController
{
    public function getProjectView($project_id) {
        //return \App\Project::with('tasks')->where('id', $project_id)->get() ;
        return view('welcome');
    }

    public function getJsonProject($project_id) {
        return \App\Project::with('tasks')->where('id', $project_id)->get() ;
    }
}