@if($errors->any())
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="toast align-items-center text-white bg-danger border-0 start-50 w-25 translate-middle-x position-fixed p-2 bg-opacity-75" style="z-index: 11; top: 10%;" id="alertToast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"><span aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="toast align-items-center text-white bg-success border-0 start-50 translate-middle-x position-fixed p-2 bg-opacity-75" style="z-index: 11; top: 10%;" id="alertToast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"><span aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    var option =
        {
            animation: true,
            delay: 10000
        };

    @if(session('success') || $errors->any())
        window.onload = (event) => {
            var toastHTMLElement = document.getElementById('alertToast');

            var toastElement = new bootstrap.Toast(toastHTMLElement, option);

            toastElement.show();
        }
    @endif
</script>
