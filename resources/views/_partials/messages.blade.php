<div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8">
        @if (count($errors))
            <br>
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($flash = session('error_message'))
            <br>
            <div class="alert alert-danger">
                <ul>
                    <li>{{$flash}}</li>
                </ul>
            </div>
        @endif
        @if($flash = session('success_message'))
            <br>
            <div class="alert alert-success">
                <ul>
                    <li>{{$flash}}</li>
                </ul>
            </div>
        @endif
    </div>
    <div class="col-lg-2 col-md-2"></div>
</div>
