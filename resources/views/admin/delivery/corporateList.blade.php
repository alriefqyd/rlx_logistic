@foreach($delivery as $d)
    <li><a href="{{$d->invoice}}"> {{$d->invoice}} </a></li>
    <li>{{$d->company->profile->full_name}}</li>
@endforeach
