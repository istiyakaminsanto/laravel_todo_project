@extends('layout.app')
@section('title', 'Welcome Todo list')

@section('body')

    {{-- This is for input field --}}
    <div id="myDIV" class="header">
        <form action="/" method="post">
            <h2 style="margin:5px">My To Do List</h2>
            {{ csrf_field() }}
            <input type="text" name="body" id="myInput" placeholder="Title...">
            <input type="submit" class="addBtn" >
        </form>
      {{-- <form action="/" method="post">
          {{ csrf_field() }}
          
          <input type="text" name="body" id="myInput" placeholder="Title...">
          <input onclick="newElement()" type="submit" class="addBtn">
          {{-- <span onclick="newElement()" class="addBtn"><input type="submit" name="submit" value="add"></span> --}}
      {{--</form> --}}
    </div>

    {{-- This is for list --}}
    <ul id="myUL">
        @foreach($todos as $todo)
            <li>{{$todo->body }} <span style="float: right; margin-right: 100px;">{{$todo->created_at->diffForHumans()}}</span></li>  
        @endforeach
                
            @if(count($errors)>0)
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif
        
    </ul>
@endsection