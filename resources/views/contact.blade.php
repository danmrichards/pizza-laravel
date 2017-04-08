@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="field">
            <p>
                We are located in the heart of Southampton, right in the city centre opposite Southampton Solent University.
            </p>
            <p>
                1 East park terrace east park pavilion
            </p>
            <p>
                Southampton
            </p>
            <p>
                SO14 0DA
            </p>
            <p>
                023 8023 0062
            </p>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5031.768049668311!2d-1.402764!3d50.907362000000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcb48d44c50dd16cf!2sPARKafe!5e0!3m2!1sen!2suk!4v1455883963144" width="900" height="675" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="field">
            <h1>
                Leave us a message if you have any questions and/or suggestions
            </h1>
            <form action="/message/send" method="post" novalidate>
                @include('layouts.error')
                {{ csrf_field()  }}
                <div>
                    <input type="text" name="first_name" placeholder="First Name" required>
                </div>
                <div>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div>
                    <input type="text" name="phone" placeholder="Phone Number">
                </div>
                <div>
                    <textarea placeholder="Your message" rows="60" name="message" required="true"></textarea>
                </div>
                <input type="submit" name="send" value="Send">
            </form>
        </div>
    </section>
@endsection

@section('scripts')
<script>$('form').validate();</script>
@endsection