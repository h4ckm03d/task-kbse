@section('main')

<h1>All Events</h1>

<p>{{ link_to_route('events.create', 'Add new event') }}</p>

@if ($events->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ link_to_route('events.edit', 'Edit', array($event->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
          {{ Form::open(array('method' 
=> 'DELETE', 'route' => array('events.destroy', $event->id))) }}                       
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    There are no events
@endif

@stop