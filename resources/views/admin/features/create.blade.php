@extends('admin.layout')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('admin/features/styles_features.css') }}" />
    </head>
    <div class="control_icon">

        <form method="POST" action="{{ route('feature.store') }}">
            @csrf
          <div class="all_icon">
            <UL>
              <div class="Icontitle">
                <h2>Features </h2>
              </div>

              @foreach ($features as $item)
              <li>
                <label>
                    <input type="radio" name="feature[]"  value="{{ $item->id }}">
                    <div class="icon_box"> <i class="fas {{ $item->class }} faa" ></i>
                    </div>
                </label>
              </li>

              @endforeach

            </UL>
            <Div class="Buton">
                <button type="submit">Save</button>
            </Div>
          </div>
        </form>



      </div>
@endsection

