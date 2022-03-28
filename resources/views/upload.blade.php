<style>
    .container {
        display: flex;
        justify-content: center;
        align-items:center;
    }
    .card {
        background-color: white;
        width: 500px;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }
    .create-artist {
        color: blue;
    }
    .btn-default {
        background-color: blue;
        color: white;
        padding: 5px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload') }}
        </h2>
    </x-slot>
    <div class="body">
        <div class="container">
            <div class="card">
                <form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" id="" placeholder="Title">
                    <br>
                    <input type="text" name="artist" id="" placeholder="Artist">
                    {{-- <a href="#" class="create-artist"> or create new artist</a> --}}
                    
                    <br>
                    audio file <br>
                    <input type="file" name="file" id="">
                    <br><br>

                    cover <br>
                    <input type="file" name="cover" id=""> 
                    <textarea name="lyrics" id="" cols="30" rows="10" placeholder="lyrics"></textarea>

                    <br>
                    <button type="submit" style="margin-top: 10px;color:blue;">Upload</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>