<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller {

	// set index page view
	public function index() {
		return view('index');
	}
	public function course() {
		return view('course');
	}

	// handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Course::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Name</th>
                <th>Instructor</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
                <td><img src="storage/images/' . $emp->avatar . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $emp->duration . ' ' . $emp->price . '</td>
                <td>' . $emp->course_name . '</td>
                <td>' . $emp->instructor_name . '</td>
                <td>' . $emp->capacity . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editCourseModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new Course ajax request
	public function store(Request $request) {
		$file = $request->file('avatar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$empData = ['duration' => $request->fname, 'price' => $request->lname, 'course_name' => $request->email, 'instructor_name' => $request->phone, 'capacity' => $request->post, 'avatar' => $fileName];
		Course::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an Course ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Course::find($id);
		return response()->json($emp);
	}

	// handle update an Course ajax request
	public function update(Request $request) {
		$fileName = '';
		$emp = Course::find($request->emp_id);
		if ($request->hasFile('avatar')) {
			$file = $request->file('avatar');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($emp->avatar) {
				Storage::delete('public/images/' . $emp->avatar);
			}
		} else {
			$fileName = $request->emp_avatar;
		}

		$empData = ['duration' => $request->fname, 'price' => $request->lname, 'course_name' => $request->email, 'instructor_name ' => $request->phone, 'capacity' => $request->post, 'avatar' => $fileName];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an Course ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = Course::find($id);
		if (Storage::delete('public/images/' . $emp->avatar)) {
			Course::destroy($id);
		}
	}
}