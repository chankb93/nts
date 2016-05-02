@if (Session::has('message'))
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Status</strong>

        <br><br>

        <ul>
                <li>{{ Session::get('message') }}</li>
        </ul>
    </div>
@endif
