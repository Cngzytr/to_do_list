@include('sections.head')
@include('sections.header')
<main>
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-8 d-flex justify-content-between">
                <span>Yapılacaklar Listesi</span>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button class="btn btn-primary btn-list" onclick="getForm()">Yeni Madde Oluştur</button>
                <form action="{{ route('todo.save') }}" class="d-none form-list" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control mr-2" name="title" placeholder="Madde Adı" required>
                    <input type="date" class="form-control mr-2" name="deadline" required>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button class="btn btn-primary">Kaydet</button>
                </form>

                <form action="{{ route('todo.edit') }}" class="d-none edit-list" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control mr-2 title-inp" name="title" placeholder="Madde Adı" required>
                    <input type="date" class="form-control mr-2 todo_date" name="deadline" required>
                    <input type="hidden" class="todo_id" name="id" value="">
                    <button class="btn btn-dark mr-2">Düzenle</button>
                    <button type="button" class="btn btn-danger" onclick="back()">Geri</button>
                </form>
            </div>
            <div class="col-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Madde Adı</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">Durum</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr style="{{ Carbon\Carbon::parse($item->deadline)->format('Y-m-d') < Carbon\Carbon::now()->format('Y-m-d') ? 'background:#b00; color:#fff;' : ''}}">
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ Carbon\Carbon::parse($item->deadline)->translatedFormat('d.m.Y l') }}</td>
                                <td>{{ $item->active == '0' ? 'Tamamlanmadı' : 'Tamamlandı' }}</td>
                                <td class="d-flex align-items-center">
                                    <a data-toggle="tooltip" href="#" onclick="editData({{$item->id}}, '{{$item->title}}', '{{Carbon\Carbon::parse($item->deadline)->format('Y-m-d')}}')"><i class="fa fa-edit mr-2"></i></a>
                                    <a data-toggle="tooltip" href="{{ route('todo.delete', ['id' => $item->id]) }}"><i class="fa fa-trash mr-2"></i></a>
                                    <a data-toggle="tooltip" href="{{ route('todo.active', ['id' => $item->id]) }}" style="cursor: pointer"><i class="fa fa-{{ $item->active == 0 ? 'check' : 'times' }} mr-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    function getForm() {
        document.querySelector('.btn-list').classList.add('d-none');
        document.querySelector('.form-list').classList.remove('d-none');
        document.querySelector('.form-list').classList.add('d-flex');
    }

    function editData(id, title, date) {
        document.querySelector('.btn-list').classList.add('d-none');
        document.querySelector('.edit-list').classList.remove('d-none');
        document.querySelector('.edit-list').classList.add('d-flex');

        document.querySelector('.edit-list').querySelector('input.title-inp').value = title;
        document.querySelector('.edit-list').querySelector('input.todo_id').value = id;
        document.querySelector('.edit-list').querySelector('input.todo_date').value = date;
    }

    function back() {
        document.querySelector('.btn-list').classList.remove('d-none');
        document.querySelector('.edit-list').classList.remove('d-flex');
        document.querySelector('.edit-list').classList.add('d-none');
    }
</script>
@include('sections.footer')
