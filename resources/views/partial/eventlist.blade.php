<table class="table table-sm">
    <thead>
    <tr>
        <th>{{ __('home.eventName') }}</th>
        <th>{{ __('home.eventDate') }}</th>
        <th>{{ __('home.eventDescription') }}</th>
        <th>{{ __('home.eventPrice') }}</th>
        <th>{{ __('home.eventPerformers') }}</th>
        <th>{{ __('home.eventLocation') }}</th>
        @if(!Route::is('myTickets'))
        <th>{{ __('home.eventBooking') }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @forelse ($events as $event)
        <tr>
            <td>{{$event->getAttribute('name')}}</td>
            <td>{{$event->getAttribute('date')}}</td>
            <td>{{$event->getAttribute('description')}}</td>
            <td>{{$event->getAttribute('price')}}</td>
            <td>{{$event->performer->getAttribute('title')}} {{$event->performer->getAttribute('firstName')}} {{$event->performer->getAttribute('lastName')}}</td>
            <td>{{$event->location->getAttribute('name')}}</td>
            @if(!Route::is('myTickets'))
                <td>
                        <form class="col" method="POST" action="{{ route('buyEvent') }}">
                            @csrf
                            <input type="hidden" value="{{$event->getAttribute('id')}}" name="event_id">
                            <button type="submit" class="btn btn-sm btn-primary" title="{{ __('home.eventBuy') }}"><i class="fa fa-plus"></i> {{ __('home.eventBuy') }}</button>
                        </form>
                </td>
            @endif
        </tr>
    @empty
        {{ __('home.eventNotFound') }}
    @endforelse
    </tbody>
</table>
