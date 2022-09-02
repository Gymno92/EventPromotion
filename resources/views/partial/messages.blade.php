@if(session()->has('message'))
    <div class="card">
        <div class="card-body">
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        </div>
    </div>
@endif
