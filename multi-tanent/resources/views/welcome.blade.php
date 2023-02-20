<x-default-layout>
  <form method="POST" action="{{ route('tenant.store') }}">
    <div class="input-group input-group-lg">
      <span class="input-group-text" id="inputGroup-sizing-lg">Tanent Name</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
        name="tenant">
      <button type="submit" class="btn btn-success">Success</button>
    </div>

  </form>

  <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">domain</th>
        <th scope="col">actions</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($tenants as $tenant)
        <tr>
          <th scope="row">{{ $tenant->id }}</th>
          <td><a href="http://{{ $tenant->domains[0]->domain }}:8000">{{ $tenant->domains[0]->domain }}</a></td>
          <td>
            <form action="{{ route('tenant.destroy', $tenant->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-default-layout>
