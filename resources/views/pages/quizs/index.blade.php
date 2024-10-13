<div class="row">
  <div class="col-md-12">
    <x-btn-add href="{{ route('quizCreate') }}" />
    <div class="card">
      <!-- Notifications -->
      <h5 class="card-header">{{ __('Daftar Kuis') }}</h5>
      <div class="table-responsive">
        <table class="table table-striped table-borderless border-bottom">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tingkat</th>
              <th>Jumlah Soal</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($tiers as $index=> $row)
            <tr>
              <td>{{ $tiers->firstItem()+$index }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->quizzes->count() }} Butir</td>
              <td>
                <x-btn-action href="{{ route('quizDetail', $row->id) }}" color="success">
                  <i class="bx bx-book-content"></i>
                </x-btn-action>  
                <x-delete :model="$row->id" />       
              </td>
            </tr>
            @empty
            @endforelse
          </tbody>
        </table>
      </div>
      {{-- <div class="card-body">
        <form action="javascript:void(0);">
          <div class="row">
            <div class="col-sm-6">
              <select id="sendNotification" class="form-select" name="sendNotification">
                <option selected="">Only when I'm online</option>
                <option>Anytime</option>
              </select>
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Discard</button>
            </div>
          </div>
        </form>
      </div> --}}
      <!-- /Notifications -->
    </div>
  </div>
</div>