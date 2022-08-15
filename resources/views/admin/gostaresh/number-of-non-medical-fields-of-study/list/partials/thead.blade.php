<th>شهرستان </th>
@foreach($filterColumnsCheckBoxes as $key => $value)
@if( filterCol($key))
    <th>{{$value}}</th>
@endif
@endforeach