@if(count($activity->changes['after']) == 1)
	{{ $activity->user->name }} updated the {{ $key = key($activity->changes['before']) }} to
	{{ $activity->changes['after'][$key] }}
@else
	{{ $activity->user->name }} updated the project
@endif
