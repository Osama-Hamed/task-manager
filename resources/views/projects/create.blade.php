@extends('layouts.app')

@section('content')
	<h1>Create New Project</h1>

	<form action="/projects" method="POST">
		@csrf

		<label for="title">Title:</label>
		<input type="text" name="title" id="title">

		<br>

		<label for="description">Description:</label>
		<textarea name="description" id="description"></textarea>

		<button type="submit">Send</button>
	</form>
@endsection