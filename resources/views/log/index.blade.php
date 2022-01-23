@include('sections.head')
@include('sections.header')
<main>
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-12 d-flex justify-content-between">
                <span>Sistem Logları</span>
            </div>
            <div class="col-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Log</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@include('sections.footer')
