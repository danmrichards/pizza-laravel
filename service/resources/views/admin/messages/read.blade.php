@extends('admin.layouts.master')

@section('content')
    <div id="message">
        <form method="post" action="/admin/messages">
            <form method="POST" action="/admin/messages">
                {{ csrf_field() }}
                <input type="text" name="mail" value="{{ $message->email }}" hidden>
                <div class="normal">
                    <label>ID:</label>
                    <span>{{ $message->id }}</span>
                </div>
                <div class="normal">
                    <label>From:</label>
                    <span>{{ $message->name .' '. $message->surname}}</span>
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
                <div class="normal">
                    <label>Message:</label>
                    <span>{{ $message->message }}</span>
                </div>
                <div class="normal">
                    <label>Reply:</label>
                </div>
                <textarea name="reply"></textarea>
                <div class="normal">
                    <a href="/admin/messages"><button>Cancel</button></a>
                    <button type="submit">Reply</button>
                </div>
            </form>
        </form>

    </div>
@endsection

@section('scripts')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="{!! asset('/js/tinymce.js') !!}"></script>
@endsection