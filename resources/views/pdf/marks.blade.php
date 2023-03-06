@extends('layouts.pdf')
@section('content')
<div class="card-body">

<div class="table-responsive p-5">

  <p><strong>Student ID:</strong> {{$user->code}}</p>
    <p><strong>Student Name:</strong> {{$user->first_name}} {{$user->last_name}}</p>

  <table class="table table table-striped table-bordered" style="width:100%">
    <thead class=" text-primary">
      <th>
        Subject-ID
      </th>
      <th>
        Subject
      </th>
      <th>
        Marks
      </th>
      <th >
        Date
      </th>
    </thead>
    <tbody>
    @foreach($user->marks as $mark)
      <tr>
        <td>
          {{$mark->assSubject->subject->code}}
        </td>
        <td>
          {{$mark->assSubject->subject->subject}}
        </td>
        <td class="text-nowrap d-flex">
          {{$mark->marks}}
        </td>
        <td>
          {{$mark->created_at}}
        </td>
      </tr>
    </form>
    @endforeach

      <tr>
        <td>
          <h5>Total (AVG):</h5>
        </td>
        <td>
        </td>
        <td>
          @php
            $total = $user->marks->sum('marks');
            $avg =  $total/$user->subjects->count();
          @endphp
          <h5>{{$avg}}</h5>
        </td>
        <td>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>
</div>
@endsection