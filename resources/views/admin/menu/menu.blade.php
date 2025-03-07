<div class="card">
    <div class="card-header">

        <a href="{{ route("admin.menus.create") }}" class="btn btn-success">Create Menu</a>
    </div>
    <table id="categories" class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>MEDIA</th>
            <th>ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($menus as $menu)

            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->localizations[0]->title }}</td>
                <td> <img width="50" style="max-height: 100px;" src="{{ $menu->getFirstMediaUrl('menu', 'mobile') }}" alt=""></td>
                <td style="height: 100%" class="table-buttons ">
                    <div class="d-flex">
                        <a  href="{{ route("admin.menus.edit", $menu->id) }}"
                            class="btn btn-primary edit_b"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route("admin.menus.destroy" , $menu->id) }}">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="ml-2 btn btn-danger delete_b">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    </div>
</div>
<!-- /.card-body -->
</div>
