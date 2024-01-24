@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div>
                <div>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid mt-3">
                    <div class="text-dark-gray mb-3">
                        Dashboard
                    </div>
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card1 h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center"> 
                                            <div class="col mr-2">
                                                <div class="h1 mb-1 font-weight-bold text-gray-800"> {{ \App\User::count() }}</div>
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">No. Of Users</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card2 h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h1 mb-1 font-weight-bold text-gray-800">{{ \App\Room::count() }}</div>
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">no. Of Rooms</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-bed fa-2x text-warning"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card3 h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h1 mb-1 mr-3 font-weight-bold text-gray-800">{{ \App\Event::count() }}</div>
                                                    </div>
                                                </div>
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    No. Of Events
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card card4 h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h1 mb-1 font-weight-bold text-gray-800">{{ \App\Transaction::count() }}</div>
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    No. Of Transactions    
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-credit-card fa-2x text-danger"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Area Chart -->
                            <div class="col-xl-7 col-lg-8">
                                <div class="card card5 mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card border-white">
                                    <div class="card-header bg-white text-dark-gray">
                                        <h5>Search Room</h5>
                                    </div>

                                    <div class="card-body dashboard-card-body">
                                        <form>
                                            <div class="row mt-4">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control datetime" type="text" name="start_time" id="start_time" value="{{ request()->input('start_time') }}" placeholder="{{ trans('cruds.event.fields.start_time') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control datetime" type="text" name="end_time" id="end_time" value="{{ request()->input('end_time') }}" placeholder="{{ trans('cruds.event.fields.end_time') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" name="capacity" id="capacity" value="{{ request()->input('capacity') }}" placeholder="{{ trans('cruds.room.fields.capacity') }}" step="1" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-success">
                                                        Search
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        @if($rooms !== null)
                                            <hr />
                                            @if($rooms->count())
                                                <div class="table-responsive">
                                                    <table class=" table table-striped table-hover datatable datatable-Event">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    {{ trans('cruds.event.fields.room') }}
                                                                </th>
                                                                <th>
                                                                    {{ trans('cruds.room.fields.capacity') }}
                                                                </th>
                                                                <th>
                                                                    {{ trans('cruds.room.fields.hourly_rate') }}
                                                                </th>
                                                                <th>
                                                                    &nbsp;
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($rooms as $room)
                                                                <tr>
                                                                    <td class="room-name">
                                                                        {{ $room->name ?? '' }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $room->capacity ?? '' }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $room->hourly_rate ? '$' . number_format($room->hourly_rate, 2) : 'FREE' }}
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bookRoom" data-room-id="{{ $room->id }}">
                                                                            Book Room
                                                                        </button>
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <p class="text-center">There are no rooms available at the time you have chosen</p>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="modal" tabindex="-1" role="dialog" id="bookRoom">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Booking of a room</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.bookRoom') }}" method="POST" id="bookingForm">
                                                        @csrf
                                                        <input type="hidden" name="room_id" id="room_id" value="{{ old('room_id') }}">
                                                        <input type="hidden" name="start_time" value="{{ request()->input('start_time') }}">
                                                        <input type="hidden" name="end_time" value="{{ request()->input('end_time') }}">
                                                        <div class="form-group">
                                                            <label class="required" for="title">{{ trans('cruds.event.fields.title') }}</label>
                                                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                                                            @if($errors->has('title'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('title') }}
                                                                </div>
                                                            @endif
                                                            <span class="help-block">{{ trans('cruds.event.fields.title_helper') }}</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">{{ trans('cruds.event.fields.description') }}</label>
                                                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                                                            @if($errors->has('description'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('description') }}
                                                                </div>
                                                            @endif
                                                            <span class="help-block">{{ trans('cruds.event.fields.description_helper') }}</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recurring_until">Recurring until</label>
                                                            <input class="form-control date {{ $errors->has('recurring_until') ? 'is-invalid' : '' }}" type="text" name="recurring_until" id="recurring_until" value="{{ old('recurring_until') }}">
                                                            @if($errors->has('recurring_until'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('recurring_until') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <button type="submit" style="display: none;"></button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" id="submitBooking">Submit</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-5 col-lg-6">
                                <div class="card card6">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header bg-white border-white text-dark-gray">
                                        <h5>List of Users</h5>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body dashboard-card-body pt-0">
                                        @php
                                            $users = App\User::all(); 
                                        @endphp

                                        @if($users !== null)
                                            @if($users->count())
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover datatable datatable-Event">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Name
                                                                </th>
                                                                <th>
                                                                    Email
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($users as $user)
                                                                <tr>
                                                                    <td class="room-name">
                                                                        {{ $user->name ?? '' }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $user->email ?? '' }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <p class="text-center">There records found.</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>

@endsection

@section('scripts')
@parent

<script>
$('#bookRoom').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var roomId = button.data('room-id');
    var modal = $(this);
    modal.find('#room_id').val(roomId);
    modal.find('.modal-title').text('Booking of a room ' + button.parents('tr').children('.room-name').text());

    $('#submitBooking').click(() => {
        modal.find('button[type="submit"]').trigger('click');
    });
});
</script>
@endsection