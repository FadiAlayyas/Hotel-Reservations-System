@foreach ($replies as $item)
 <div @if ($item->owner_type=='admin')
    style="margin-left:600px;"
 @endif>
    <strong>{{$item->owner_type}}</strong>
    <p>{{$item->content}}</p>
</div>
@endforeach


