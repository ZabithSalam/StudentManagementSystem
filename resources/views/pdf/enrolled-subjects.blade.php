@extends('layouts.pdf')
@section('content')
<table class="table table-striped table-bordered" style="width:100%">
    <thead class=" text-primary">
      <th>
        Subject-ID
      </th>
      <th>
        Subject Name
      </th>
      <th>
        Enrolled Date
      </th>
    </thead>
    <tbody>
      @foreach(Auth::user()->subjects as $assignSubject)
            <tr>
              <td>
                {{$assignSubject->subject->code}}
              </td>
              <td>
                {{$assignSubject->subject->subject}}
              </td>
              <td>
                {{$assignSubject->created_at}}
              </td>
            </tr>
      @endforeach
    </tbody>
</table>
@endsection
