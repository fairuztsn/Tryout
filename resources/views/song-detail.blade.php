<style>
    * {
        scroll-behavior: smooth;
    }
    .card {
        background: white;
        margin-top: 30px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        transition: 0.2s;
    }
    .card:hover {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        transform: scale(0.98);
    }
    .card:active {
        transform: scale(0.95);
        box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .detail {
        margin-top: 10px;
    }
    .detail h1 {
        font-weight: bolder;
        font-size: 20px;
    }
    .detail * {
        text-align: center;
    }
    .card .container img {
        border-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;
    }
    .button {
        color: rgb(82, 82, 255);
        padding: 2px;
    }
    .lyrics-card {
        width: 500px;
    }
    #lyrics {
        max-width: 500px;
    }
    #lyrics h1 {
        font-weight: bolder;
        text-align: center;
    }
    .action {
        text-align: center;
    }
    .btn-edit {
        background: rgb(0, 180, 0);
        color: white;
        padding: 5px;
    }
    .btn-delete {
        background: red;
        color: white;
        padding: 5px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
                {{ __('Detail') }}
        </h2>
    </x-slot>
    <div class="body">
        
        <div class="container">
            <div class="action card">
                <a href="../{{$song->id}}/edit" class="btn-edit">Edit this song</a>

                <br>
                <br>

                <form action="{{ url("song/".$song->id) }}" method="POST">
                    @csrf

                    @method("Delete")
                    <button class="btn-delete">DELETE THIS SONG</button>
                </form>
            </div>
        </div>
            {{-- @foreach($song as $song) --}}
            <div class="container">
                <div class="card">
                    
                    <div class="container">
                        <img src="{{asset("uploads/covers/$song->cover")}}" style="height:200px; width: 200px;" alt="">
                    </div>

                    <div class="detail">
                        <h1>{{$song->title}}</h1>
                        <p>{{$song->artist}}</p>

                        <audio controls>
                            <source src="{{asset("uploads/songs/$song->file")}}" type="audio/ogg">
                        Your browser does not support the audio element.
                        </audio>
                    </div>

                    <div class="container">
                        <a href="#lyrics" class="button">SEE FULL LYRICS</a>
                    </div>
                </div>
            </div>
            <div class="container">
            
            <div class="card lyrics-card">
                <div id="lyrics">
                    <h1>Lyrics</h1> <br>
                    {{$song->lyrics}}
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</x-app-layout>

<script src="https://kit.fontawesome.com/ff535c21a2.js" crossorigin="anonymous"></script>