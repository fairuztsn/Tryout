<style>
    .body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card-li {
        margin-top: 100px;
        background-color: white;
        width: 500px;
        max-width: 500px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        transition: 0.2s;
    }
    .card-li:hover {
        transform: scale(0.98);
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }
    .card-li:active {
        transform: scale(0.95);
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
    .card-li h1 {
        font-weight: bolder;
        font-size: 20px;
    }
    .btn-default {
        background-color: blue;
        color: white;
        padding: 5px;
    }
    .content-title {
        position: relative;
        top: 50px;
        font-size: 30px;
    }
    .detail {
        margin-left: 20px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
                {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="body">
        
        <div class="container">
            <h1 class="content-title">For you</h1>
        </div>

        <div class="song-list">
            <ul>
                @foreach($song as $song)
                
                    <div class="container">
                        <li class="card-li">
                            <a href="song/{{$song->id}}/detail">
                                <div style="display: flex">
                                <img src="uploads/covers/{{$song->cover}}" style="height:100px; width: 100px;" alt="">
                                <div class="container">
                                    <div class="detail">
                                        <h1>{{ $song->title }}</h1>
                                        <p>{{ $song->artist }} </p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </li>
                    </div>

                @endforeach
            </ul>
        </div>
    </div>
    <br><br><br><br><br>
</x-app-layout>
