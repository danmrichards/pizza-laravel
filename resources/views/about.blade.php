@extends('layouts.master')

@section('content')
    <section id="inset-white">
        <div class="field about">
            <h1>About Us</h1>
            <?php echo $about->about; ?>

        </div>
    </section>
@endsection