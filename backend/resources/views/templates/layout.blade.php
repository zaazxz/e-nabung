<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Favicon : Start --}}
    <link rel="shortcut icon" href="{{ asset('images/json.png') }}" type="image/x-icon">
    {{-- Favicon : End --}}

    {{-- Font : Start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
    {{-- Font : End

    {{-- Icon : Start --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    {{-- Icon : End --}}

    {{-- Bootstrap : Start --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    {{-- Bootstrap : End --}}

    {{-- CSS : Start --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- CSS : End --}}

    <title>E - Nabung API Docs</title>
</head>

<body>

    {{-- Content : Start --}}
    @yield('content')
    {{-- Content : End --}}

    {{-- Modal : Start --}}
    <div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Question Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('question') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="apiQuestion" class="form-label">Who is Zaazxz first Girlfriend?</label>
                            <input type="text" class="form-control" id="apiQuestion" name="apiQuestion"
                                placeholder="Fill the field to get X-API-Key">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal : End --}}

    {{-- JavaScript : Start --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- JavaScript : End --}}

    {{-- JQuery : Start --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    {{-- JQuery : End --}}

    {{-- JavaScript : Start --}}
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- Javascript : End --}}

</body>

</html>
