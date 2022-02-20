@extends('layouts.admin')

@section('title', 'Message')

@section('content')
  {{-- <ul>
    <li v-for="i in 1,10">elemento @{{ i }}</li>
  </ul> --}}
  
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-3">
          <h5 class=" my-2 my-md-0">
            Lista Messaggi
          </h5> 
        </div>
        <div class="col col-md-3 mb-1 mb-md-0">
          <span>Tot Messaggi: {{ $totMessages }}</span>
        </div>
        <div class="col col-md-3">
          <span>Da leggere: {{ $totMessagesToRead }}</span>
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <ul class="list-group">

        @if (count($messageList) == 0)
        <div class="text-center">
          <h3 class="fw-8">
            Non hai messaggi
          </h3>
        </div>
        @endif
        @if (count($messageToReadList) > 0)
        <ul class="list-group">
          @foreach ($messageToReadList as $message)
          
            @include('admin.partials.messageListNormal')
          @endforeach
        </ul>
        <hr>
        @endif
        
        @foreach ($messageReadList as $message)
          @include('admin.partials.messageListNormal')
        @endforeach
      </ul>
      
      
      
      {{-- <ul class="list-group">
        @if (count($messageList) == 0)
        <div class="text-center">
          <h3 class="fw-8">
            Non hai messaggi
          </h3>
        </div>
        @endif
        @if (count($messageToReadList) > 0)
          @foreach ($messageToReadList as $message)
            @include('admin.partials.messageList')
          @endforeach
          <hr>
        @endif

        @foreach ($messageReadList as $message)
          @include('admin.partials.messageList')        
        @endforeach
      </ul> --}}
      </div>
  </div>

@endsection