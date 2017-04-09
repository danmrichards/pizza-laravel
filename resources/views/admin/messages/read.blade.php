@extends('admin.layouts.master')

@section('content')
    <div id="message">
        <form method="post">
            <div class="normal">
                <label>ID:</label>
                <span>{{ $message->id }}</span>
            </div>
            <div class="normal">
                <label>Name:</label>
                <span>{{ $message->name }}</span>
            </div>
            <div class="normal">
                <label>Surname:</label>
                <span>{{ $message->surname }}</span>
            </div>
            <div class="normal">
                <label>Email:</label>
                <span>{{ $message->email }}</span>
            </div>
            <div class="normal">
                <label>Phone:</label>
                <span>{{ $message->phone }}</span>
            </div>
            <div class="normal">
                <label>Date sent:</label>
                <span>{{ $message->created_at }}</span>
            </div>
            <textarea>{{ $message->message }}</textarea>
            <div class="normal">
                <button type="submit" formaction="admin/message">Cancel</button>
                <button type="submit" formaction="">Send</button>
            </div>
        </form>
        <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script src="{!! asset('/js/tinymce.js') !!}"></script>
    </div>
@endsection

@section('scripts')

@endsection