
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('admin/MainPage/main_header.css')}}">

    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="header_form.css" />
    <title>Hotel Details</title>
</head>


@php
$status=['open','closed'];
@endphp


<body id="body">
    <div class="formm">
        <h1>Hotel System</h1>
        <form action={{route('admin.hotel.update',$hotel->id)}} method="POST" enctype="multipart/form-data">
            @csrf

            <div class="one">
                <h2>Name:</h2>
                <input type="text" name="name"  value="{{$hotel->name}}">
            </div>
            <div class="both">
                <div class="two">
                    <h2>Location:</h2>
                    <input type="text" name="location"   value="{{$hotel->location}}">
                </div>
                <div class="two">
                    <h2>Status:</h2>


                    <select class="sele" name="status">
                        @foreach ($status as $item)
                        <option value="{{$item}}" {{($hotel->status==$item) ? 'selected' : ' '}}>{{$item}}</option>
                        @endforeach
                       </select>
                </div>
            </div>

            <div class="both">
                <div class="two">
                    <h2>Header Photo:</h2>
                    <input type="file" name="headerImage" placeholder="Main Page Image">
                </div>
                <div class="two">
                    <h2>About Us Media:</h2>
                    <input type="file" name="aboutUsMedia" placeholder="Video or Image">
                </div>
            </div>
            <div class="both">
                <div class="two">
                    <h2>Lat:</h2>
                    <input type="text" name="Lat"  value="{{$hotel->Lat}}">
                </div>
                <div class="two">
                    <h2>Lng:</h2>
                    <input type="text" name="Lng" value="{{$hotel->Lng}}">
                </div>
            </div>
            <div class="both">
                <div class="two1">
                    <h2>Description:</h2>
                    <textarea name="description" >{{$hotel->description}}</textarea>
                </div>
                <div class="two1">
                    <h2>Header Description:</h2>
                    <textarea name="headerDescription"  >{{$hotel->headerDescription}}</textarea>
                </div>
            </div>

                <button class="btn" type="submit" >Update</button>

        </form>
    </div>
</body>

</html>

