<div>
    <p>attendee name : {{$data['name']}}</p>
    <p>attendee email : {{$data['email']}}</p>
    <p>attendee pay for : 
        @foreach ($data['attendee'] as $Atten)
            @foreach ($Atten['bookings'] as $book)
                @foreach ($book['workShops'] as $shop)
                    {{$shop->name}}
                    <br>
                @endforeach
            @endforeach
        @endforeach
    </p>
    <p>attendee amount of price : {{$data['price']}}</p>
        @isset($data['images'])
            <p>attendee attaches : 
        @endisset
        @foreach ($data['images']??[] as $img)
            <img src="{{$message->embed($img)}}" alt="pay image">
            <br>
        @endforeach
    </p>

</div>
